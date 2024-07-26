<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HotelModel;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class OwnerController extends Controller
{
    public function index(Request $request) {
        $isLoggedIn = $request->session()->get('isLoggedIn');
        $username = $request->session()->get('username');
        $user_id = $request->session()->get('user_id');
        $role = $request->session()->get('role');
        $profilePhoto = $request->session()->get('profilePhoto');

        dd($profilePhoto);

        // $Products = HotelModel::where('createdBy', $user_id)->get();

        // return view('ownerPage/dashboard', [
        //     'isLoggedIn' => $isLoggedIn,
        //     'title' => 'Dashboard - Manage your property',
        //     'username' => $username,
        //     'role' => $role,
        //     'products' => $Products,
        //     'profilePhoto' => $profilePhoto
        // ]);
    }

    public function detail(Request $request, String $id) {
        $isLoggedIn = $request->session()->get('isLoggedIn');
        $username = $request->session()->get('username');
        $role = $request->session()->get('role');
        $user_id = $request->session()->get('user_id');
        $profilePhoto = $request->session()->get('profilePhoto');

        $Product = HotelModel::where('id', $id)->get()->first();
        $owner = Pengguna::where('id', $user_id)->get()->first();
        
        if ($Product['createdBy'] != $user_id) {
            return redirect('/owner/dashboard');
        }

        return view('ownerPage/detail_property_owner', [
            'title' => "Product Detail",
            'isLoggedIn' => $isLoggedIn,
            'username' => $username,
            'role' => $role,
            'product' => $Product,
            'productOwner' => $owner,
            'profilePhoto' => $profilePhoto
        ]);
    }


    public function tambahData(Request $request) {
        $username = $request->session()->get('username');
        $isLoggedIn = $request->session()->get('isLoggedIn');
        $user_id = $request->session()->get('user_id');
        $role = $request->session()->get('role');
        $profilePhoto = $request->session()->get('profilePhoto');

        return view('ownerPage/tambahData', [
            'title' => 'Add Property - Create your own property',
            'username' => $username,
            'isLoggedIn' => $isLoggedIn,
            'role' => $role,
            'user_id' => $user_id,
            'profilePhoto' => $profilePhoto
        ]);
    }

    public function editData(Request $request, String $id) {
        $username = $request->session()->get('username');
        $isLoggedIn = $request->session()->get('isLoggedIn');
        $owner_id = $request->session()->get('user_id');
        $role = $request->session()->get('role');
        $profilePhoto = $request->session()->get('profilePhoto');
        
        $Product = HotelModel::where('id', $id)->get()->first();

        if ($Product['createdBy'] != $owner_id) {
            return redirect('owner/dashboard');
        }

        return view('ownerPage/editData', [
            'title' => 'Edit Propery',
            'username' => $username,
            'isLoggedIn' => $isLoggedIn,
            'role' => $role,
            'product' => $Product,
            'profilePhoto' => $profilePhoto
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

    public function update(Request $request, HotelModel $id)
    {

        $product = $id;
        $rules = ([
            'nama' => 'required',
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
        ]);

        $validateProduct = $request->validate($rules);
        if ($request->file('image')) {
            if($product->image) {
                Storage::delete($product->image);
            }
            $validateProduct['image'] = $request->file('image')->store('product');
        }

        HotelModel::where('id', $product->id)->update($validateProduct);
        return redirect('/owner/dashboard');
    }

    public function destroy(string $id)
    {

        
        return redirect('/owner/dashboard');
    }
}
