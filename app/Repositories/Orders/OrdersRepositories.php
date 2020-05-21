<?php
 
namespace App\Repositories\Orders;
use App\Repositories\Orders\Orders as OrdersInterface;
use App\M_Orders;
use App\M_Product;
use DataTables;
use Illuminate\Support\Str;
use DB;

class OrdersRepositories implements OrdersInterface
{
	protected $_orders;

	public function __construct(M_Orders $product)
	{
		$this->_orders = $product;
	}
	public function findById($id)
	{
		return $this->_orders->find($id);
	}
	public function getAllData(){
		return $this->_orders->all();
	}
	public function table_data()
	{
		$data = $this->_orders->all();
		return DataTables::of($data)
				->addColumn('product',function($data){
					$data = $data->Product->name;
					return $data;
				})
				->addColumn('price',function($data){
					$data = "Rp.".number_format($data->qty * $data->product->price,2);
					return $data;
				})
    			->addColumn('action',function($data){
    				$update = '<a href="/orders/edit/'.$data->id.'" > Edit </a> | <a href="/orders/delete/'.$data->id.'"> Delete </a>';
    				return $update;
    			})
    			->rawColumns(['action','product'])
    			->make(true);
	}
	public function insert_data($data)
	{
		DB::beginTransaction();
		try{
		        $code = array(
		            "order_code" => rand()
		        );
		        $id_product = $data['product_id'];
		        $findproduct = M_Product::find($id_product);
		        if ($findproduct->qty > 0) {
		        	$findproduct->decrement("qty",$data['qty']);
			        $findproduct->update();
			        $finish = array_merge($data,$code);
					$query = $this->_orders->create($finish);
					$id = $query->id;
					$response = $this->findById($id);
				DB::commit();
				return response(['message' => "Nice","data" => $response,"status" => 1],200);
		        }else{
				   return response(['message' => "failed","status" => 0],500);
		        }

		}catch(Exception $e){
			DB::rollback();
			return response(['message' => "failed","status" => 0],500);
		}

	}
	public function update_data($data,$id)
	{
		DB::beginTransaction();
		try{
		       $fill = $this->_orders->find($id);
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
		    $fill = $this->_orders->find($id);
			$fill = $this->_orders->find($id);
			$fill->delete($id);
			DB::commit();
			return response(['message' => "ok" ,"status" => 1],200);
		}catch(Exception $e){
			DB::rollback();
			return response(['message' => "failed","status" => 0],500);
		}
	}
}
