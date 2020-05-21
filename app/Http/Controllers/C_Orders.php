<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Orders\Orders as OrdersInterface;
use App\Http\Requests\CoreRequest;

class C_Orders extends Controller
{
	private $_orders;
	public function __construct(OrdersInterface $orders)
	{
		$this->_orders = $orders;
	}
    public function index(){
    	return view("admin.orders.index");
    }
    public function get_data(){
        return $this->_orders->table_data();
    }
    public function insert_proccess(CoreRequest $request){
         $data = $request->all();
         $value = $this->_orders->insert_data($data);
         $status = $value->original['status'];
         $message = $value->original['message'];
         if ($status > 0) {
            $response = $value->original['data'];
            return view("users.success",["data_order" => $response]);
         }else{
            abort(403, "$message");
         };
    }
    public function edit_view($id){
        $data = $this->_orders->findById($id);
        return view("admin.orders.update",["data" => $data]);
    }
    public function edit_proccess(CoreRequest $request){
        $id = $request->id;
        $data = $request->all();
        $value = $this->_orders->update_data($data,$id);
         $status = $value->original['status'];
         $message = $value->original['message'];
         if ($status > 0) {
            return redirect("/orders");
         }else{
            abort(403, "$message");
         };
    }
    public function delete_proccess($id){
         $data= $this->_orders->delete_data($id);
         $status = $data->original['status'];
         $message = $data->original['message'];
         if ($status > 0) {
            return redirect("/orders");
         }else{
            abort(403, "$message");
         };
    }
}
