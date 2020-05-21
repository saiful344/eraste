<?php
 
namespace App\Repositories\Product;
use App\Repositories\Product\Product as ProductInterface;
use App\M_Product;
use DataTables;
use Illuminate\Support\Str;
use DB;

class ProductRepositories implements ProductInterface
{
	protected $_product;

	public function __construct(M_Product $product)
	{
		$this->_product = $product;
	}
	public function findById($id)
	{
		return $this->_product->find($id);
	}
	public function getAllData(){
		return $this->_product->all();
	}
	public function table_data($data)
	{
		return DataTables::of($data)
		    	->addColumn('price_row',function($data){
					$data = "Rp.".number_format($data->price,2);
					return $data;
    			})
    			->addColumn('action',function($data){
    				$update = '<a href="/product/edit/'.$data->id.'" > Edit </a> | <a href="/product/delete/'.$data->id.'"> Delete </a>';
    				return $update;
    			})
    			->rawColumns(['action','price_row'])
    			->make(true);
	}
	public function insert_data($data)
	{
		DB::beginTransaction();
		try{
	        $code = array(
	            "code" => Str::random(3)
	        );
	        $finish = array_merge($data,$code);
			$this->_product->create($finish);
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
			$fill = $this->_product->find($id);
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
			$fill = $this->_product->find($id);
			$fill->delete($id);
			DB::commit();
			return response(['message' => "ok" ,"status" => 1],200);
		}catch(Exception $e){
			DB::rollback();
			return response(['message' => "failed","status" => 0],500);
		}
	}
}
