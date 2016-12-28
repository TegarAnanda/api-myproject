<?php

namespace App\Http\Controllers;

use App\Category;
use App\Thread;
use Illuminate\Http\Request;

use App\Http\Requests;

class CThreads extends Controller
{
    public function store(Request $request)
    {
        $thread = new Thread();

        $thread->title = $request->get('title');
        $thread->body = $request->get('body');
        $thread->category_id = $request->get('category_id');

        $category = Category::where('id', $thread->category_id)->first();

        if (!$category)
            return [
                'status_code' => 404,
                'message' => 'Category not exist'
            ];

        if (!$thread)
            return [
                'status_code' => 500,
                'message' => 'Fail to save'
            ];

        $thread->saveOrFail();
        return [
            'status_code' => 200,
            'message' => 'Saved',
            'value' => $thread
        ];
    }

    public function update (Request $request, $id)
    {
        $thread = Thread::where('id', $id)->first();

        if (!$thread)
            return [
                'status_code' => 404,
                'message' => 'Data not found'
            ];

        $thread->title = $request->get('title');
        $thread->body = $request->get('body');
        $thread->category_id = $request->get('category_id');

        $category = Category::where('id', $thread->category_id)->first();
        if (!$category)
            return [
                'status_code' => 404,
                'message' => 'Category not exist'
            ];

        if (!$thread)
            return [
                'status_code' => 500,
                'message' => 'Update fail'
            ];

        $thread->save();
        return [
            'status_code' => 200,
            'message' => 'Updated'
        ];
    }

    public function delete($id)
    {
        $thread = Thread::where('id', $id)->first();

        if (!$thread)
            return [
                'status_code' => 404,
                'message' => 'Thread not found'
            ];
        if (!$thread->delete())
            return [
                'status_code' => 500,
                'message' => 'Deleting fail'
            ];
        return [
            'status_code' => 200,
            'message' => 'Deleted'
        ];
    }

    public function showAll(){
        $threads = Thread::all();
        if (!$threads)
            return [
                'status_code' => 404,
                'message' => 'Data Not Found'
            ];

        return [
            'status_code' => 200,
            'value' => $threads
        ];
    }

    public function show($id)
    {
        $threads = Thread::where('id', $id)->first();

        if (!$threads)
            return [
                'status_code' => 404,
                'message' => 'Data Not Found'
            ];

        return [
            'status_code' => 200,
            'value' => $threads
        ];
    }

    public function relatedByCategory($cat)
    {
        $threads = Thread::where('category_id', $cat)->get();

        if (!$threads)
            return [
                'status_code' => 404,
                'message' => 'Threads not found'
            ];

        return [
            'status_code' => 200,
            'value' => $threads
        ];
    }
}
