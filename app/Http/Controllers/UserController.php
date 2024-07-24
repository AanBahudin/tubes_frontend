<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request) {
        $isLoggedIn = $request->session()->get('isLoggedIn');
        $username = $request->session()->get('username');
        $role = $request->session()->get('role');

        return view('welcome', [
            'title' => "GoHotels",
            'isLoggedIn' => $isLoggedIn,
            'username' => $username,
            'role' => $role
        ]);
    }

    public function productDetail(String $id) {
        return view('detail_property');
    }
    
    public function showProfile(Request $request) {
        $isLoggedIn = $request->session()->get('isLoggedIn');
        $username = $request->session()->get('username');
        $role = $request->session()->get('role');

        return view('profile', [
            'title' => "Profile",
            'isLoggedIn' => $isLoggedIn,
            'username' => $username,
            'role' => $role
        ]);
    }

    public function showWishlist(Request $request) {
        $isLoggedIn = $request->session()->get('isLoggedIn');
        $username = $request->session()->get('username');
        $role = $request->session()->get('role');

        return view('userPage/wishlist', [
            'title' => "Wishlist",
            'isLoggedIn' => $isLoggedIn,
            'username' => $username,
            'role'=> $role
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
