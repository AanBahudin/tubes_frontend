<?php

namespace App\Http\Controllers;
use App\Models\HotelModel;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request) {
        $isLoggedIn = $request->session()->get('isLoggedIn');
        $username = $request->session()->get('username');
        $role = $request->session()->get('role');

        $Products = HotelModel::all();

        return view('welcome', [
            'title' => "GoHotels",
            'isLoggedIn' => $isLoggedIn,
            'username' => $username,
            'role' => $role,
            'products' => $Products
        ]);
    }

    public function productDetail(Request $request, String $id) {
        $isLoggedIn = $request->session()->get('isLoggedIn');
        $username = $request->session()->get('username');
        $role = $request->session()->get('role');

        $Product = HotelModel::find($id);
        $ownerInformation = Pengguna::where('id', $Product['createdBy'])->get()->first();

        return view('detail_property', [
            'title' => "Product Detail",
            'isLoggedIn' => $isLoggedIn,
            'username' => $username,
            'role' => $role,
            'product' => $Product,
            'productOwner' => $ownerInformation['nama']
        ]);
    }
    
    public function showProfile(Request $request) {
        $isLoggedIn = $request->session()->get('isLoggedIn');
        $user_id = $request->session()->get('user_id');
        $username = $request->session()->get('username');
        $role = $request->session()->get('role');

        $currentUser = Pengguna::where('id', $user_id)->first();

        return view('profile', [
            'title' => "Profile",
            'isLoggedIn' => $isLoggedIn,
            'user_id' => $user_id,
            'username' => $username,
            'role' => $role,
            'user' => $currentUser
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

    public function updateProfile(Request $request, Pengguna $id)
    {

        $user = $id;
        $rules = ([
            'nama' => 'required',
            'email' => 'required',
            'username' => 'required',
        ]);

        $validateUser = $request->validate($rules);
        if ($request->file('image')) {
            if($user->image) {
                Storage::delete($user->image);
            }
            $validateUser['image'] = $request->file('image')->store('user');
        }

        Pengguna::where('id', $user->id)->update($validateUser);

        // perbaharui session
        Session::put('nama', $request->nama);
        Session::put('username', $request->username);
        Session::put('email', $request->email);

        return redirect('/profile');

    }
}
