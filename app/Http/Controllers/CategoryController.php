<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        $categories=Category::get();
        return view('crudtable',compact('categories'));
    }
    public function store(Request $request)
    {
     $request->validate([
    'name' => 'required|string|max:255',
    'slug' => 'required|string|max:255|unique:categories',
    'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
    'status' => 'required|string|in:active,inactive',
]);

$category = new Category([
    'name' => $request->input('name'),
    'slug' => $request->input('slug'),
    'status' => $request->input('status'),
]);
if ($request->hasFile('thumbnail')) {
    $thumbnail = $request->file('thumbnail');
    $destinationPath = public_path('thumbnail'); // Path to the public/thumbnail directory
    $thumbnailName = time() . '_' . $thumbnail->getClientOriginalName();


    $thumbnail->move($destinationPath, $thumbnailName);
     $category->thumbnail = 'thumbnail/' . $thumbnailName;
}

$category->save();

return redirect()->route('categories.index')->with('success', 'Category added successfully!');

    }
    public function edit($id)
{
    // Retrieve category data by ID
    $category = Category::findOrFail($id);

    // Pass category data to the view
    return view('edit', ['category' => $category]);
}

public function update(Request $request, $id)
{
    // Validate request data
    $request->validate([
        'name' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:categories,slug,' . $id,
        'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        'status' => 'required|string|in:active,inactive',
    ]);

    // Find category by ID
    $category = Category::findOrFail($id);

    // Update category data
    $category->name = $request->input('name');
    $category->slug = $request->input('slug');
    $category->status = $request->input('status');

    // Handle thumbnail file upload
    if ($request->hasFile('thumbnail')) {
        $thumbnail = $request->file('thumbnail');
        $destinationPath = public_path('thumbnail');
        $thumbnailName = time() . '_' . $thumbnail->getClientOriginalName();
        $thumbnail->move($destinationPath, $thumbnailName);
        $category->thumbnail = 'thumbnail/' . $thumbnailName;
    }

    // Save the category
    $category->save();

    // Redirect to the category index page with a success message
    return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
}
public function destroy($id)
{
   $category = Category::findOrFail($id);
    $category->delete();
     return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
}
//Retrive DATA
 public function categoryform()
    {
         return view('AddNewCategory');
    }


}