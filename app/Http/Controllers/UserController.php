<?php

namespace App\Http\Controllers;
use App\Models\HotelModel;
use App\Models\Pengguna;
use App\Models\Wishlist;
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
        $user_id = $request->session()->get('user_id');
        $role = $request->session()->get('role');

        // mengambil salah satu data yang ada pada url
        $Product = HotelModel::find($id);
        // mengambil data owner
        $ownerInformation = Pengguna::where('id', $Product['createdBy'])->get()->first();

        // cek jika produk sudah ada didalam wishlist
        $isProductIsInWishlist = Wishlist::where('productId', $id)->where('user' , $user_id)->get()->first();

        return view('detail_property', [
            'title' => "Product Detail",
            'isLoggedIn' => $isLoggedIn,
            'username' => $username,
            'role' => $role,
            'product' => $Product,
            'productOwner' => $ownerInformation,
            'alreadyInWishlist' => $isProductIsInWishlist
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
        $user_id = $request->session()->get('user_id');
        $role = $request->session()->get('role');

        $product = Wishlist::where('user', $user_id)->get();

        return view('userPage/wishlist', [
            'title' => "Wishlist",
            'isLoggedIn' => $isLoggedIn,
            'username' => $username,
            'role'=> $role,
            'products' => $product
        ]);
    }


    public function deleteWishlist(Request $request, String $id) {
        $isLoggedIn = $request->session()->get('isLoggedIn');
        $username = $request->session()->get('username');
        $user_id = $request->session()->get('user_id');
        $role = $request->session()->get('role');

        $productId = Wishlist::where('id', $id)->get()->first();
        Wishlist::where('id', $id)->delete();

        return redirect('/product/' . $productId->productId);
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

    public function storeWishlist(Request $request, String $id) {
        $isLoggedIn = $request->session()->get('isLoggedIn');
        $username = $request->session()->get('username');
        $role = $request->session()->get('role'); 

        if (!$isLoggedIn) {
            return redirect('/login');
        } else if ($role == "OWNER") {
            return redirect('/owner/dashboard');
        } else if ($role == "ADMIN") {
            return redirect('/admin/dashboard');
        }

        $Product = HotelModel::where('id', $id)->get()->first();


        $newWishlist = new Wishlist;
        $newWishlist->productId = $Product->id;
        $newWishlist->name = $Product->nama;
        $newWishlist->tagline = $Product->tagline;
        $newWishlist->rating = "5";
        $newWishlist->price = $Product->price;
        $newWishlist->image = $Product->image;
        $newWishlist->country = $Product->country;
        $newWishlist->user = $request->session()->get('user_id'); 
        
        $newWishlist->save();

        return redirect('/product/' . $Product->id);
    }
}
