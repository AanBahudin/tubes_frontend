<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OwnerController extends Controller
{
    public function index(Request $request) {
        $isLoggedIn = $request->session()->get('isLoggedIn');
        $username = $request->session()->get('username');

        return view('ownerPage/dashboard', [
            'isLoggedIn' => $isLoggedIn,
            'title' => 'Dashboard - Manage your property',
            'username' => $username
        ]);
    }

    public function tambahData(Request $request) {
        $username = $request->session()->get('username');
        $isLoggedIn = $request->session()->get('isLoggedIn');
        $role = $request->session()->get('role');

        return view('ownerPage/tambahData', [
            'title' => 'Add Property - Create your own property',
            'username' => $username,
            'isLoggedIn' => $isLoggedIn,
            'role' => $role
        ]);
    }

    public function editData(String $id) {
        return view('ownerPage/editPage', [
            'title' => 'Edit Propery'
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
