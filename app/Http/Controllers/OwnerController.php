<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HotelModel;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Session;

class OwnerController extends Controller
{
    public function index(Request $request) {
        $isLoggedIn = $request->session()->get('isLoggedIn');
        $username = $request->session()->get('username');
        $user_id = $request->session()->get('user_id');
        $role = $request->session()->get('role');

        $Products = HotelModel::where('createdBy', $user_id)->get();

        return view('ownerPage/dashboard', [
            'isLoggedIn' => $isLoggedIn,
            'title' => 'Dashboard - Manage your property',
            'username' => $username,
            'role' => $role,
            'products' => $Products
        ]);
    }

    public function detail(Request $request, String $id) {
        $isLoggedIn = $request->session()->get('isLoggedIn');
        $username = $request->session()->get('username');
        $nama = $request->session()->get('nama');
        $role = $request->session()->get('role');
        $user_id = $request->session()->get('user_id');

        $Product = HotelModel::where('id', $id)->get()->first();
        
        if ($Product['createdBy'] != $user_id) {
            return redirect('/owner/dashboard');
        }

        return view('ownerPage/detail_property_owner', [
            'title' => "Product Detail",
            'isLoggedIn' => $isLoggedIn,
            'username' => $username,
            'role' => $role,
            'product' => $Product,
            'productOwner' => $nama
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
        $owner_id = $request->session()->get('user_id');
        $role = $request->session()->get('role');

        $Product = HotelModel::where('id', $id)->get()->first();

        if ($Product['created_by'] != $owner_id) {
            return redirect('owner/dashboard');
        }

        return view('ownerPage/editData', [
            'title' => 'Edit Propery',
            'username' => $username,
            'isLoggedIn' => $isLoggedIn,
            'role' => $role,
            'product' => $Product
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

    public function update(Request $request, string $id)
    {
        
    }

    public function destroy(string $id)
    {
        //
    }
}
