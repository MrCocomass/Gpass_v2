<?php

namespace App\Http\Controllers;

use App\Password;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create()
    {

        $title = $_POST['title'];
        $password = $_POST['password'];
        $passwords = Password::where('title', $title)->get();

        $passwords = new Password();
            $passwords->title = $title;
            $passwords->password = $password;  
            $passwords->save();

    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(Password $password)
    {
        $password = Password::all();
        return $this->createResponse(200, 'Password', array('password' => $password));
    }

    
    public function edit(Password $password)
    {
        //
    }

    
    public function update(Request $request, Password $password)
    {
        //
    }

    
    public function destroy($id)
    {
        $password = Password::find($id);
        $password->delete();

        return $this->success (200, 'Password deleted');
    }
    
}
