<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Users\Users as UsersInterface;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateRequest;

class C_users extends Controller
{
	private $_users;
	public function __construct(UsersInterface $product)
	{
		$this->_users = $product;
	}
    public function index(){
    	return view("admin.users.index");
    }
    public function get_data(){
    	$data = $this->_users->getAllData();
        return $this->_users->table_data($data);
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
        	"role"	=> $request->role,
         ];
         $value = $this->_users->insert_data($data);
         $status = $value->original['status'];
         $message = $value->original['message'];
         if ($status > 0) {
            return redirect("/users");
         }else{
            abort(403, "$message");
         };
    }
    public function edit_view($id){
        $data = $this->_users->findById($id);
        $data_role = [
        	"admin",'user'
        ];
        return view("admin.users.update",["data" => $data,"data_role" => $data_role]);
    }
    public function edit_proccess(UpdateRequest $request){
        $id = $request->id;
        $data = $request->all();
         $value = $this->_users->update_data($data,$id);
         $status = $value->original['status'];
         $message = $value->original['message'];
         if ($status > 0) {
            return redirect("/users");
         }else{
            abort(403, "$message");
         };
    }
    public function delete_proccess($id){
         $value = $this->_users->delete_data($id);
         $status = $value->original['status'];
         $message = $value->original['message'];
         if ($status > 0) {
            return redirect("/users");
         }else{
            abort(403, "$message");
         };
    }
}
