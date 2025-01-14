<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Exception;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $user = Auth::user();
            if(empty($user)){
                throw new Exception('Please login');
            }
            return view('user.profile', compact('user'));
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function update(Request $request)
    {
          try {
            $user = Auth::user();
            if(empty($user)){
                throw new Exception('Please login');
            }
            $user->update($request->all());
            return redirect("/profile");
          }
          catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    

}
