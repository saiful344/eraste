<?php
 
namespace App\Repositories\Product;
 
use App\Repositories\Product\Product;
use App\Repositories\Product\ProductRepositories;
use Illuminate\Support\ServiceProvider;

 class ProductRepositoriesProvider extends ServiceProvider{
 	public function boot(){}
 	public function register()
 	{
 		$this->app->bind(Product::class,ProductRepositories::class);
 	}
 }