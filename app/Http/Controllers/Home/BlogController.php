<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class BlogController extends Controller
{
    public function BlogList()
    {
        $data = Blog::latest()->get();
        return view('admin.blog.blog_list', compact('data'));
    }
    public function AddBlog()
    {
        $data = BlogCategory::orderBy('category_name', 'ASC')->get();
        return view('admin.blog.blog_add', compact('data'));
    }
    public function StoreBlog(Request $request)
    {
        $request->validate([
            'blog_title' => 'required',
            'blog_tags' => 'required',
            'blog_description' => 'required',
            'blog_image' => 'required',
        ], [
            'blog_title.required' => 'Title Name is Required',
            'blog_tags.required' => 'Tags is Required',
            'blog_description.required' => 'Description is Required',

        ]);

        $image = $request->file('blog_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(430, 327)->save('upload/blog/' . $name_gen);
        $save_url = 'upload/blog/' . $name_gen;
        Blog::insert([
            'blog_title' => $request->blog_title,
            'blog_category_id' => $request->blog_category_id,
            'blog_tags' => $request->blog_tags,
            'blog_description' => $request->blog_description,
            'blog_image' => $save_url,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Blog Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('blog.list')->with($notification);
    }
    public function EditBlog($id)
    {
        $categoryData = BlogCategory::orderBy('category_name', 'ASC')->get();
        $data = Blog::findOrFail($id);
        return view('admin.blog.edit_blog', compact('data', 'categoryData'));
    }

    public function UpdateBlog(Request $request)
    {
        $request->validate([
            'blog_title' => 'required',
            'blog_tags' => 'required',
            'blog_description' => 'required',
        ], [
            'blog_title.required' => 'Title Name is Required',
            'blog_tags.required' => 'Tags is Required',
            'blog_description.required' => 'Description is Required',

        ]);
        $id = $request->id;

        if ($request->file('blog_image')) {

            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(430, 327)->save('upload/blog/' . $name_gen);
            $save_url = 'upload/blog/' . $name_gen;
            Blog::findOrFail($id)->update([
                'blog_title' => $request->blog_title,
                'blog_category_id' => $request->blog_category_id,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'blog_image' => $save_url,
                'created_at' => Carbon::now()
            ]);
            $notification = array(
                'message' => 'Blog Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('blog.list')->with($notification);
        } else {
            Blog::findOrFail($id)->update([
                'blog_title' => $request->blog_title,
                'blog_category_id' => $request->blog_category_id,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'created_at' => Carbon::now()
            ]);
            $notification = array(
                'message' => 'Blog Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('blog.list')->with($notification);
        }
    }
    public function DeleteBlog($id)
    {
        $data = Blog::findOrFail($id);
        $img = $data->blog_image;
        unlink($img);

        Blog::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function BlogDetails($id)
    {
        $categoryData = BlogCategory::orderBy('category_name', 'ASC')->get();
        $blogs = Blog::latest()->limit(5)->get();
        $data = Blog::findOrFail($id);
        return view('frontend.blog_details', compact('data', 'blogs', 'categoryData'));
    }
    public function CategoryBlog($id)
    {
        $categoryData = BlogCategory::orderBy('category_name', 'ASC')->get();
        $blogs = Blog::latest()->limit(5)->get();
        $data = Blog::where('blog_category_id', $id)->orderBy('id', 'DESC')->get();
        $category = BlogCategory::findOrFail($id);
        return view('frontend.cat_blog_details', compact('data', 'categoryData', 'blogs', 'category'));
    }
    public function HomeBlog()
    {
        $categoryData = BlogCategory::orderBy('category_name', 'ASC')->get();
        $blogs = Blog::latest()->limit(5)->get();
        $data = Blog::latest()->paginate(3);
        return view('frontend.blog', compact('data', 'categoryData', 'blogs'));
    }
}
