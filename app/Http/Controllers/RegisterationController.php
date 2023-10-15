<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegisterationModel;

class RegisterationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('registeration');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name=$request->get('name');
        $contact=$request->get('contact');
        $email=$request->get('email');
        $username=$request->get('username');
        $password=$request->get('password');

        $register=new RegisterationModel([
            'name'=>$name,
            'contact'=>$contact,
            'email'=>$email,
            'username'=>$username,
            'password'=>$password
        ]);

        $register->save();
        return redirect('login');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
