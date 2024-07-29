<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HotelModel;
use App\Models\Wishlist;
use App\Models\Review;
use App\Models\Pengguna;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $isLoggedIn = $request->session()->get('isLoggedIn');
        $username = $request->session()->get('username');
        $role = $request->session()->get('role');
        $profilePhoto = $request->session()->get('profilePhoto');

        $Products;
        $currentQuery = strtoupper($request->input('category'));
        
        if (!$currentQuery) {
            $Products = HotelModel::all();
        } else {
            $Products = HotelModel::where('categories', $currentQuery)->get();
        }

        return view('admin/dashboard', [
            'title' => "Dashboard",
            'isLoggedIn' => $isLoggedIn,
            'username' => $username,
            'role' => $role,
            'profilePhoto' => $profilePhoto,
            'products' => $Products,
            'currentQuery' => $currentQuery
        ]);
    }

    public function showProperty() {
        return view('admin/property', [
            'title' => "All Property"
        ]);
    }

    public function showUser(Request $request) {

        $isLoggedIn = $request->session()->get('isLoggedIn');
        $username = $request->session()->get('username');
        $role = $request->session()->get('role');
        $profilePhoto = $request->session()->get('profilePhoto');

        $currentQuery = strtoupper($request->input('category'));

        $users;

        if (!$currentQuery) {
            $users = Pengguna::where('role', '!=', "ADMIN")->get();
        } else {
            $users = Pengguna::where('role', '!=', "ADMIN")->where('role', $currentQuery)->get();
        }

        return view('admin/user', [
            'title' => "All Users",
            'isLoggedIn' => $isLoggedIn,
            'username' => $username,
            'role' => $role,
            'profilePhoto' => $profilePhoto,
            'currentQuery' => $currentQuery,
            'users' => $users
        ]);
    }
   
    public function showDetailUser(Request $request, String $id) {
        $isLoggedIn = $request->session()->get('isLoggedIn');
        $username = $request->session()->get('username');
        $role = $request->session()->get('role');
        $profilePhoto = $request->session()->get('profilePhoto');

        $user = Pengguna::where('id', $id)->get()->first();

        return view('admin/user_detail', [
            'title' => "All Users",
            'isLoggedIn' => $isLoggedIn,
            'username' => $username,
            'role' => $role,
            'profilePhoto' => $profilePhoto,
            'user' => $user
        ]);
    }

    public function deleteUser(Request $request, String $id) {
        $role = $request->session()->get('role');

        if ($role != "ADMIN") {
            return redirect('/');
        }

        Pengguna::where('id', $id)->delete();

        return redirect('/admin/users')->with('success', 'Data berhasil dihapus');
    }

    public function deleteProduct(Request $request, String $id) {
        $role = $request->session()->get('role');
        $isLoggedIn = $request->session()->get('isLoggedIn');

        if ($role != "ADMIN" && !$isLoggedIn) {
            return redirect('/');
        }

        HotelModel::where('id', $id)->delete();
        Wishlist::where('productId', $id)->delete();
        Review::where('productId', $id)->delete();

        return redirect('/admin/dashboard')->with('success', 'Data berhasil dihapus');
       
    }
}
