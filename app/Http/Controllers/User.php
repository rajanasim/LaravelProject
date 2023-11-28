<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class User extends Controller
{
    
    public function index(Request $request)
    {
        // dd($request->inputCity) ;

        $name = $request->input('inputName'); 
        
        DB::table('users')->insert([
            'name' => $name, 
            'email' =>'rajanaseem@gmailwvd.com', 
            'password' =>'abcd123', 
            // Add other fields if applicable
        ]);
        
        return redirect('/');
    }
}