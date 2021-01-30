<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class LoginController extends Controller
{
    public function create_user()
    {
    	$user = new User();
		$user->password = Hash::make('12345');
		$user->email = 'shreyak@yopmail.com';
		$user->name = 'Shreyak';
		$user->save();

		echo "user created";
    }

    public function login()
    {
    	
    }
}
