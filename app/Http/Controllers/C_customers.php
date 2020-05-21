<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;

use App\Repositories\Product\Product as ProductInterface;

class C_customers extends Controller
{
	private $_product;
	public function __construct(ProductInterface $product)
	{
		$this->_product = $product;
	}
    public function index()
    {
    	$product = $this->_product->getAllData();
    	return view("users.index",["data" => $product]);
    }
    public function view_buys($id){
    	$data = $this->_product->findById($id);
    	return view("users.insert",["data" => $data]);
    }
}
