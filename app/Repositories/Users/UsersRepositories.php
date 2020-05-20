<?php
 
namespace App\Repositories\Users;
use App\Repositories\Users\Users as UsersInterface;
use App\User;
use DataTables;
use Illuminate\Support\Str;

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
		$this->_users->create($data);
	}
	public function update_data($data,$id)
	{
		$fill = $this->_users->find($id);
		$fill->update($data);
	}
	public function delete_data($id)
	{
		$fill = $this->_users->find($id);
		$fill->delete($id);
	}
}
