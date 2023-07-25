<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\MultiImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;


class AboutController extends Controller
{
    public function AboutPage()
    {
        $data = About::find(1);
        return view('admin.about_page.about_page_all', compact('data'));
    }
    public function UpdateAbout(Request $request)
    {
        $id = $request->id;

        if ($request->file('about_image')) {

            $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(523, 605)->save('upload/home_about/' . $name_gen);
            $save_url = 'upload/home_about/' . $name_gen;
            About::findOrFail($id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'about_image' => $save_url
            ]);
            $notification = array(
                'message' => 'About Page Updated with Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            About::findOrFail($id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description
            ]);
            $notification = array(
                'message' => 'About Page Updated without Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }
    public function HomeAbout()
    {
        $data = About::find(1);
        return view('frontend.about_page', compact('data'));
    }

    public function AboutMultiImage()
    {
        return view('admin.about_page.multiimage');
    }
    public function StoreMultiImage(Request $request)
    {
        $images = $request->file('multi_image');

        foreach ($images as $image) {
            // $image = $request->file('about_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(220, 220)->save('upload/multi/' . $name_gen);
            $save_url = 'upload/multi/' . $name_gen;
            MultiImage::insert([
                'multi_image' => $save_url,
                'created_at' => Carbon::now()
            ]);
        }

        $notification = array(
            'message' => 'Multi Image Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function AllMultiImage()
    {
        $data = MultiImage::all();
        return view('admin.about_page.all_multiimage', compact('data'));
    }
    public function EditMultiImage($id)
    {
        $data = MultiImage::findOrFail($id);
        return view('admin.about_page.edit_multiimage', compact('data'));
    }
    public function UpdateMultiImage(Request $request)
    {
        $id = $request->id;

        if ($request->file('multi_image')) {

            $image = $request->file('multi_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(220, 220)->save('upload/multi/' . $name_gen);
            $save_url = 'upload/multi/' . $name_gen;
            MultiImage::findOrFail($id)->update([
                'multi_image' => $save_url
            ]);
            $notification = array(
                'message' => 'Image Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.multi.image')->with($notification);
        } else {

            return redirect()->route('all.multi.image');
        }
    }
    public function DeleteMultiImage($id)
    {
        $data = MultiImage::findOrFail($id);
        $img = $data->multi_image;
        unlink($img);

        MultiImage::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Image Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
