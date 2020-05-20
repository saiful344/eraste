<?php
 
namespace App\Repositories\Product;
use App\Repositories\Product\Product as ProductInterface;
use App\M_Product;
use DataTables;
use Illuminate\Support\Str;

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
    			->addColumn('action',function($data){
    				$update = '<a href="/product/edit/'.$data->id.'" > Edit </a> | <a href="/product/delete/'.$data->id.'"> Delete </a>';
    				return $update;
    			})
    			->rawColumns(['action'])
    			->make(true);
	}
	public function insert_data($data)
	{
        $code = array(
            "code" => Str::random(3)
        );
        $finish = array_merge($data,$code);
		$this->_product->create($finish);
	}
	public function update_data($data,$id)
	{
		$fill = $this->_product->find($id);
		$fill->update($data);
	}
	public function delete_data($id)
	{
		$fill = $this->_product->find($id);
		$fill->delete($id);
	}
}
