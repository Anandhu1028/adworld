<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Achievement;
use App\Models\Achivement_list;
class AchievementsController extends Controller
{
    public function index(){
        $achievements = Achievement::all();
        return view("admin.achivementes.index", compact("achievements"));
    }

    public function store(Request $request){
        $achievement = new Achievement();
        $achievement->type = $request->name;
        $achievement->save();
        return redirect()->back();
    }

    public function show(string $id){
        $achievement_list = Achivement_list::where('ach_id', $id)->get();
        return view("admin.achivementes.show", compact("achievement_list", "id"));
    }

    public function create(string $id){
        return view("admin.achivementes.create", compact("id"));
    }

    public function store_data(Request $request){
        $achievement = new Achivement_list();
        $achievement->ach_id = $request->ach_id;
        $achievement->heading = $request->heading;
        $achievement->description = $request->description;
        if ($request->file('img'))
        {
           $image = $request->file('img');
           $imageName = time().'.'.$image->getClientOriginalExtension();
           $image->move(public_path('images'), $imageName);

           // You can also store the image path in your database if needed
            $awards -> image = '/images/'.$imageName;
       }
        $achievement->save();
        return redirect()->back();
    }

    public function edit(string $id){
        $achievement_list = Achivement_list::find($id);
        return view("admin.achivementes.edit", compact("achievement_list"));
    }

    public function update(Request $request , string $id)
    {
        $achievement = Achivement_list::find($id);
        $achievement->heading = $request->heading;
        $achievement->description = $request->description;
        if ($request->file('image'))
        {
           $image = $request->file('image');
           $imageName = time().'.'.$image->getClientOriginalExtension();
           $image->move(public_path('images'), $imageName);

           // You can also store the image path in your database if needed
            $achievement -> image = '/images/'.$imageName;
       }
        $achievement->save();
        return redirect()->back();

    }

    public function item_delete(string $id){
        $achievement = Achivement_list::find($id);
        $achievement->delete();
        return redirect()->back();
    }

    public function all_delete(string $id){
        $achievement = Achievement::find($id);
        $achievement_list = Achivement_list::where('ach_id', $id)->get();

        if($achievement_list){
            foreach($achievement_list as $achievement){
                $achievement->delete();
            }
        }
        $achievement->delete();

        return redirect()->back();

    }

}
