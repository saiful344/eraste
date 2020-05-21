<?php
 
namespace App\Repositories\Users;
use App\Repositories\Users\Users as UsersInterface;
use App\User;
use DataTables;
use Illuminate\Support\Str;
use DB;

class UsersRepositories implements UsersInterface
{
	protected $_users;

	public function __construct(User $product)
	{
		$this->_users = $product;
	}
	public function findById($id)
	{
		return $this->_users->find($id);
	}
	public function getAllData(){
		return $this->_users->all();
	}
	public function table_data()
	{
		$data = $this->_users->all();
		return DataTables::of($data)
    			->addColumn('action',function($data){
    				$update = '<a href="/users/edit/'.$data->id.'" > Edit </a> | <a href="/users/delete/'.$data->id.'"> Delete </a>';
    				return $update;
    			})
    			->rawColumns(['action'])
    			->make(true);
	}
	public function insert_data($data)
	{
		DB::beginTransaction();
		try{
			$this->_users->create($data);
			DB::commit();
			return response(['message' => "ok" ,"status" => 1],200);
		}catch(Exception $e){
			DB::rollback();
			return response(['message' => "failed","status" => 0],500);
		}
	}
	public function update_data($data,$id)
	{
		DB::beginTransaction();
		try{
			$fill = $this->_users->find($id);
			$fill->update($data);
			DB::commit();
			return response(['message' => "ok" ,"status" => 1],200);
		}catch(Exception $e){
			DB::rollback();
			return response(['message' => "failed","status" => 0],500);
		}
	}
	public function delete_data($id)
	{
		DB::beginTransaction();
		try{
			$fill = $this->_users->find($id);
			$fill->delete($id);
			DB::commit();
			return response(['message' => "ok" ,"status" => 1],200);
		}catch(Exception $e){
			DB::rollback();
			return response(['message' => "failed","status" => 0],500);
		}
	}
}
