<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\DocumentProd;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Session;
use Validator;
use DB;

class HomeController extends Controller{

	public function index(){
		return view("front/index");
	}
	public function login()
	{
		//This function is for login 
	}
	public function register()
	{
		//This is for new registeration
	}
}