<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class CCategories extends Controller
{
    public function store (Request $request)
    {
        $category = new Category();

        $category->name = $request->get('name');
        if (!$category)
            return [
                'status_code' => 500,
                'message' => 'Fail to save'
            ];
        $category->saveOrFail();
        return [
            'status_code' => 200,
            'message' => 'Saved',
            'value' => $category
        ];
    }

    public function delete ($id)
    {
        $category = Category::where('id', $id);

        if (!$category)
            return
                [
                    'status_code' => 404,
                    'message' => 'Category not found'
                ];
        if (!$category->delete())
            return[
                'status_code' => 500,
                'message' => 'Fail to delete'
            ];
        $category->delete();
        return [
            'status_code' => 200,
            'message' => 'Deleted'
        ];
    }

    public function showAll()
    {
        $categories = Category::all();

        if (!$categories)
            return [
                'status_code' => 404,
                'message' => 'Category not found'
            ];
        return [
            'status_code' => 200,
            'value' => $categories
        ];
    }

    public function show($id)
    {
        $category = Category::where('id', $id)->first();

        if (!$category)
            return [
                'status_code' => 404,
                'message' => 'Category not found'
            ];
        return [
            'status_code' => 200,
            'value' => $category
        ];
    }
}
