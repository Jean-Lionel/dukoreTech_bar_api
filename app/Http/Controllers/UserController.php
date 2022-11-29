<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Controllers\API\BaseController;

class UserController extends BaseController
{

	public function index(){

		$search = \Request::get("q");

		$users = User::where(function($query) use($search){
			if($search){
				$query
				->where('name', 'like', '%'.$search.'%')
				->OrWhere('email', 'like', '%'.$search.'%')
				;
			}
		})->get();


		return $this->sendResponse($users, "Listes Des utilis....");
	}

	public function show($id){

		return User::find($id);
	}
}