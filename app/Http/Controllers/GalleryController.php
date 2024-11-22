<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\gallery;
class GalleryController extends Controller
{
    public function index(){
        $gallery = gallery::all();
        return view('admin.gallery.gallery',['gallery'=>$gallery]);
    }

    public function store(Request $request){
        $gallery = new gallery();
        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
             $gallery -> image = '/images/'.$imageName;
        }
        $gallery->save();
        return redirect('/admin/gallery');
    }

    public function delete(string $id){
        $gallery = gallery::find($id);
        if ($gallery) {
            $imagePath = public_path($gallery->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }

            $gallery->delete();
        }
        return redirect('/admin/gallery');
    }
}
