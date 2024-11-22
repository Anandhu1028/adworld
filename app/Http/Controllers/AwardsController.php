<?php

namespace App\Http\Controllers;
use App\Models\Awards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AwardsController extends Controller
{
    /**
      */
    public function index()
    {   
        $awards = Awards::all();
        return view('admin.awards.index',['awards'=>$awards]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.awards.create');
 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_data(Request $request)
    {
        $awards = new Awards();
        $awards->headline = $request->headline;
        $awards->description = $request->description;
        if ($request->file('img'))
         {
            $image = $request->file('img');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            // You can also store the image path in your database if needed
             $awards -> img = '/images/'.$imageName;
        }
        $awards->save();
        return redirect(route('awards'));
    }

 

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( string $id)
    {
        $awards = Awards::find($id); 
        return view("admin.awards.edit", ['awards'=>$awards]);

    }



    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $awards = Awards::find($id);
        $awards -> headline = $request->headline;
        $awards -> description = $request->description;
        if ($request->file('img'))
         {
            $imagePath = public_path($awards->img);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $image = $request->file('img');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            // You can also store the image path in your database if needed
             $awards -> img = '/images/'.$imageName;
        }
        $awards -> save();
        return redirect(route('awards',['awards'=>$awards]));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function item_delete(string $id)
    {
        $awards = Awards::find($id);
        $imagePath = public_path($awards->img);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }
        $awards->delete();
        return redirect()->back();
    }
}
