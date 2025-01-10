<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;



class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       try{
        $url = Url::all();
        return view('url.index', compact('url'));
       }
       catch (\Exception $e) {
        return $e->getMessage();
       }
    }

    public function create()
    {
        return view('url.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    try {
        $request->validate([
        'url' => ['required'],
        ]);
        $id = Auth::id();
        $shortUrl = new Url();
        $shortUrl->url = $request->input('url');        
        $shortUrl->optional_alias = $request->input('optional_alias');
        $shortUrl->exipration_date =$request->input('exipration_date');
        $shortUrl->link_redirection = $request->input('link_redirection');
        $shortUrl->group_name = $request->input('group_name');
        $shortUrl->brand = $request->input('brand');
        $shortUrl->short_url = Str::random(6);
        $shortUrl->user = $id;
        $shortUrl->count = 0;
        $shortUrl->save();        
        return redirect("/")
        ->with('success','url created successfully.');
       }
       catch (\Exception $e) {
        return $e->getMessage();
       }
    }

    /**
     * Show the form for editing the specified url.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $url = Url::find($id);
            return view('url.edit', compact('url'));
        }
        catch (\Exception $e) {

            return $e->getMessage();
        }
    }

      /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          try {
            $Url = Url::find($id);
            $Url->update($request->all());
            return redirect("/url-index");
          }
          catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $url = Url::find($id);
            $url->delete();
            return redirect(route('url-index'));
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function redirectfunction(string $code){
        $exists = Url::where('short_url', $code)->first();
        if ($exists) {
            return redirect()->away($exists->url);       
        }
    }

    public function search(Request $request)
    {
        $url = Url::where('url', 'like', '%' . $request->destination_url . '%')
        ->where('short_url', 'like', '%' . $request->short_code . '%')
        ->get();
        return view('url.index', compact('url'));
        

    }

}
