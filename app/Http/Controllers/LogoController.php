<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Logo_list;
class LogoController extends Controller
{
    public function index(){
        $logo = Logo::all();
        return view("admin.logo.index", compact("logo"));
    }

    public function store(Request $request){
        $logo = new Logo();
        $logo->type = $request->name;
        $logo->save();
        return redirect()->back();
    }

    public function show(string $id){
        $logo_list = Logo_list::where('ach_id', $id)->get();
        return view("admin.logo.show", compact("logo_list", "id"));
    }

    public function create(string $id){
        return view("admin.logo.create", compact("id"));
    }

    public function store_data(Request $request){
        $logo = new Logo_list();
        $logo->ach_id = $request->ach_id;
        $logo->heading = $request->heading;
        $logo->description = $request->description;
        if ($request->file('img'))
        {
           $image = $request->file('img');
           $imageName = time().'.'.$image->getClientOriginalExtension();
           $image->move(public_path('images'), $imageName);

           // You can also store the image path in your database if needed
            $logo -> image = '/images/'.$imageName;
       }
        $logo->save();
        return redirect()->back();
    }

    public function edit(string $id){
        $logo_list = Logo_list::find($id);
        return view("admin.logo.edit", compact("logo_list"));
    }

    public function update(Request $request , string $id)
    {
        $logo = Logo_list::find($id);
        $logo->heading = $request->heading;
        $logo->description = $request->description;
        if ($request->file('image'))
        {
           $image = $request->file('image');
           $imageName = time().'.'.$image->getClientOriginalExtension();
           $image->move(public_path('images'), $imageName);

           // You can also store the image path in your database if needed
            $logo -> image = '/images/'.$imageName;
       }
        $logo->save();
        return redirect()->back();

    }

    public function item_delete(string $id){
        $logo = Logo_list::find($id);
        $logo->delete();
        return redirect()->back();
    }

    public function all_delete(string $id){
        $logo = Logo::find($id);
        $logo_list = Logo_list::where('ach_id', $id)->get();

        if($logo_list){
            foreach($logot_list as $achilogovement){
                $logo->delete();
            }
        }
        $logo->delete();

        return redirect()->back();

    }

}
