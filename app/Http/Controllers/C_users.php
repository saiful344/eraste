<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Users\Users as UsersInterface;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateRequest;

class C_users extends Controller
{
	private $_product;
	public function __construct(UsersInterface $product)
	{
		$this->_product = $product;
	}
    public function index(){
    	return view("admin.users.index");
    }
    public function get_data(){
    	$data = $this->_product->getAllData();
        return $this->_product->table_data($data);
    }
    public function insert_view(){
        return view("admin.users.insert");
    }
    public function insert_proccess(UserRequest $request){
        $password = bcrypt($request->password);
        $data =[
        	"name" => $request->name,
        	"email"=> $request->email,
        	"password" => $password,
        ];
         $this->_product->insert_data($data);
         return redirect('/users');
    }
    public function edit_view($id){
        $data = $this->_product->findById($id);
        $data_role = [
        	"admin",'user'
        ];
        return view("admin.users.update",["data" => $data,"data_role" => $data_role]);
    }
    public function edit_proccess(UpdateRequest $request){
        $id = $request->id;
        $data = $request->all();
        $this->_product->update_data($data,$id);
        return redirect('/users');
    }
    public function delete_proccess($id){
        $this->_product->delete_data($id);
        return redirect('/users');
    }
}
