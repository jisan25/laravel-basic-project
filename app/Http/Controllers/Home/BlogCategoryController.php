<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function CategoryList()
    {
        $data = BlogCategory::latest()->get();
        return view('admin.blog_category.blog_category_all', compact('data'));
    }

    public function AddCategory()
    {
        return view('admin.blog_category.blog_category_add');
    }
    public function StoreCategory(Request $request)
    {

        BlogCategory::insert([
            'category_name' => $request->category_name,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Category Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('category.list')->with($notification);
    }
    public function EditCategory($id)
    {
        $data = BlogCategory::findOrFail($id);
        return view('admin.blog_category.edit_category', compact('data'));
    }
    public function UpdateCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ], [
            'category_name.required' => 'Category Name is Required',
        ]);
        $id = $request->id;
        BlogCategory::findOrFail($id)->update([
            'category_name' => $request->category_name,
        ]);
        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('category.list')->with($notification);
    }
    public function DeleteCategory($id)
    {
        BlogCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
