<?php

namespace App\Http\Controllers;

use App\Http\Services\CategoryService;
use Illuminate\Http\Request;

class CatergoryController extends Controller
{
    protected $categorySer;
    public function __construct(CategoryService $categoryService)
    {
        $this->categorySer = $categoryService;
    }

    public function index()
    {
        $categories = $this->categorySer->getAll();
//        return view('admin.category.list',compact('categories'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
