<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::paginate(5);
        if($request->ajax()) {
            return view('admin._component.category.paginate_category', compact('categories'))->render();
        }

        return view('admin._component.category.manage_category', compact('categories'));
    }

    public function updateStatus(Request $request)
    {
            $category = Category::find($request->id);
            $category->status = $request->status;
            $category->save();

            $html = view('admin._component.category.update_status', compact('category'))->render();
            
            return response($html);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'status' => $request->status,
        ];
        
        $category = Category::create($data);
        $html = view('admin._component.category.update_status', compact('category'))->render();
            
        return response($html);
    }

    public function update(Request $request)
    {
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();

        return response()->json($category);
    }

    public function delete()
    {

    }

    public function search(Request $request)
    {
        $key = $request->key;
        $categories = Category::search($key)->get();
        $result = view('admin._component.category.search', compact('categories'));

        return response($result);
    }

    public function filter(Request $request)
    {
        $status = $request->status;
        $categories = Category::where('status', '=', $status)->get();
        $view = view('admin._component.category.search', compact('categories'))->render();

        return response($view);
    }

    public function show(Request $request)
    {
        $user = Category::find($request->id);

        return response()->json($user);
    }
}
