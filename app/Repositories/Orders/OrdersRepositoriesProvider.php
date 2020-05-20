<?php
 
namespace App\Repositories\Orders;
 
use App\Repositories\Orders\Orders;
use App\Repositories\Orders\OrdersRepositories;
use Illuminate\Support\ServiceProvider;

 class OrdersRepositoriesProvider extends ServiceProvider{
 	public function boot(){}
 	public function register()
 	{
 		$this->app->bind(Orders::class,OrdersRepositories::class);
 	}
 }