<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $cats = DB::table('categories')->get();   //create query use query builder DB
        //$cats = Category::all(); // category query laravel use eqolite ORM
        return view('backend.category.index', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //   Validation

        $request->validate(
            [
                'category' => 'required|max:10|min:3|unique:categories,name'  //validation condition
            ],
            [
                'required' => 'Category must be entered',
                'min' => 'Category name minimum 3 latter',
                'max' => 'Category name maximum 10 latter'
            ]
            );

        // use Eloqute
        $category = [
            'name' => $request->category
        ];

        // route er modde taka page a hit korbe // then success massege show index page
        Category::create($category);
        return redirect()->route('category.index')->with('success', 'Category Added');

        // Use Insert method

        //dd($request);
        //return $request->category;
        //return"I am here";
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //dd($category);
        //return "now i am here";
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {

        // validation 

        $request->validate(
            [
                'category' => 'required:max:10|min:3|unique:categories,name'  //validation condition
            ],
            [
                'required' => 'Category must be entered',
                'min' => 'Category name minimum 3 latter',
                'max' => 'Category name maximum 10 latter'
            ]
            );
        //dd($request);
        $data = [
            'name' => $request->category
        ];
        $category->update($data);
        return redirect()->route('category.index')->with('success', 'Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {   //delete function
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Successfully Delete');
    }
}
