<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }
    public function update(Request $request)
    {
          try {
            $user = Auth::user();
            $user->update($request->all());
            return redirect("/profile");
          }
          catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    

}
