<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Fortify\Http\Controllers\RegisteredUserController as RegisterUserController;


class CustomRegisterController extends Controller
{
    public function register(Request $request)
{
    $users = User::get();
    
    // foreach ($users as $user) {
    //     // Access record properties
    //     echo $user->id;
    //     echo $user->name;
    //     // Add more properties as needed
    // }
    // print_r($users[0]->id);

        // Redirect to a page where user data can be displayed
        // return redirect()->route('user')->with('user', $users);
        return view('admin.user_info',compact('users'));
}
}