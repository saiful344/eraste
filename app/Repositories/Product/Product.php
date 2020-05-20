<?php
 
namespace App\Repositories\Product;
 
interface Product {
    public function findById($id);
    public function getAllData();
    public function table_data($data);
    public function insert_data($data);
    public function update_data($data,$id);
}