<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Controllers\API\BaseController;

class UserController extends BaseController
{

	public function index(){
		return User::all();
	}

	public function show($id){

		return User::find($id);
	}
}