<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HotelModel;
use Illuminate\Support\Facades\Session;

class OwnerController extends Controller
{
    public function index(Request $request) {
        $isLoggedIn = $request->session()->get('isLoggedIn');
        $username = $request->session()->get('username');
        $role = $request->session()->get('role');

        $Products = HotelModel::all();

        return view('ownerPage/dashboard', [
            'isLoggedIn' => $isLoggedIn,
            'title' => 'Dashboard - Manage your property',
            'username' => $username,
            'role' => $role,
            'products' => $Products
        ]);
    }

    public function tambahData(Request $request) {
        $username = $request->session()->get('username');
        $isLoggedIn = $request->session()->get('isLoggedIn');
        $user_id = $request->session()->get('user_id');
        $role = $request->session()->get('role');

        return view('ownerPage/tambahData', [
            'title' => 'Add Property - Create your own property',
            'username' => $username,
            'isLoggedIn' => $isLoggedIn,
            'role' => $role,
            'user_id' => $user_id
        ]);
    }

    public function editData(Request $request, String $id) {
        $username = $request->session()->get('username');
        $isLoggedIn = $request->session()->get('isLoggedIn');
        $role = $request->session()->get('role');

        return view('ownerPage/editData', [
            'title' => 'Edit Propery',
            'username' => $username,
            'isLoggedIn' => $isLoggedIn,
            'role' => $role
        ]);
    }

    public function store(Request $request)
    {   
        $validateProduct = $request->validate([
            'nama' => 'required|max:20',
            'tagline' => 'required|max:100',
            'price' => 'required|numeric',
            'categories' => 'required',
            'description' => 'required|max:1000',
            'country' => 'required',
            'image' => 'required|max:1024',
            'guest' => 'required',
            'bedroom' => 'required',
            'bed' => 'required',
            'bath'=> 'required',
            'createdBy' => 'required'
        ]);

        $validateProduct['image'] = $request->file('image')->store('product');
    
        HotelModel::create($validateProduct);
        return redirect('/owner/dashboard');
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
