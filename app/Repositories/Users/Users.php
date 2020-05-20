<?php
 
namespace App\Repositories\Users;
 
interface Users {
    public function findById($id);
    public function getAllData();
    public function table_data();
    public function insert_data($data);
    public function update_data($data,$id);
}