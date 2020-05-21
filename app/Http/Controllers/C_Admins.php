<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Repositories\Product\Product as ProductInterface;

class C_Admins extends Controller
{
	private $_product;
	public function __construct(ProductInterface $product)
	{
		$this->_product = $product;
	}
    public function index(){
    	return view("admin.product.index");
    }
    public function get_data(){
    	$data = $this->_product->getAllData();
        return $this->_product->table_data($data);
    }
    public function insert_view(){
        return view("admin.product.insert");
    }
    public function insert_proccess(ProductRequest $request){
        $data = $request->all();
        $value = $this->_product->insert_data($data);
        $status = $value->original['status'];
         $message = $value->original['message'];
         if ($status > 0) {
            return redirect("/product");
         }else{
            abort(403, "$message");
         };
    }
    public function edit_view($id){
        $data = $this->_product->findById($id);
        return view("admin.product.update",["data" => $data]);
    }
    public function edit_proccess(ProductRequest $request){
        $id = $request->id;
        $data = $request->all();
        $value = $this->_product->update_data($data,$id);
        $status = $value->original['status'];
        $message = $value->original['message'];
         if ($status > 0) {
            return redirect("/product");
         }else{
            abort(403, "$message");
         };
    }
    public function delete_proccess($id){
         $value = $this->_product->delete_data($id);
         $status = $value->original['status'];
         $message = $value->original['message'];
         if ($status > 0) {
            return redirect("/product");
         }else{
            abort(403, "$message");
         };
    }
}
