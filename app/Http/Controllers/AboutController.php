<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AboutController extends Controller
{

	//allow unauthenticated users
	public function __construct()
	{
		view()->share('app_name', config('constants.app_name'));
	}

	public function index()
	{
		$data['page_title'] = 'About';
		return view('about.index', $data);
	}
}
