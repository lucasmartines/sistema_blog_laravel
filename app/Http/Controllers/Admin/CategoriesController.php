<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use  App\Http\Requests\CategoryFormRequest;


class CategoriesController extends Controller
{
    //
    public function index(){
       $categories = Category::all();
       return view('backend.categories.index',compact('categories'));
    }
    public function create(){
        return view('backend.categories.create');
    }
    public function store(CategoryFormRequest $request){
        $category = new Category(
            array(
                'name' => $request->get('name')
            )
        );

        $category->save();

        return redirect('categories/create')
            ->with('status','Categoria adicionada');
    }
}
