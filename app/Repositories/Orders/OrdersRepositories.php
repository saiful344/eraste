<?php
 
namespace App\Repositories\Orders;
use App\Repositories\Orders\Orders as OrdersInterface;
use App\M_Orders;
use DataTables;
use Illuminate\Support\Str;

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
        $code = array(
            "order_code" => rand()
        );
        $finish = array_merge($data,$code);
		$query = $this->_orders->create($finish);
		$id = $query->id;
		return $this->findById($id);
	}
	public function update_data($data,$id)
	{
		$fill = $this->_orders->find($id);
		$fill->update($data);
	}
	public function delete_data($id)
	{
		$fill = $this->_orders->find($id);
		$fill->delete($id);
	}
}
