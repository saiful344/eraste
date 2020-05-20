<?php
 
namespace App\Repositories\Users;
 
use App\Repositories\Users\Users;
use App\Repositories\Users\UsersRepositories;
use Illuminate\Support\ServiceProvider;

 class UsersRepositoriesProvider extends ServiceProvider{
 	public function boot(){}
 	public function register()
 	{
 		$this->app->bind(Users::class,UsersRepositories::class);
 	}
 }