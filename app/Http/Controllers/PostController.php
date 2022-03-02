<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Topic;
use App\Models\Classroom;
use App\Models\Assignment;
use App\Models\Attachment;
use Illuminate\Http\Request;
use App\Models\ClassroomMember;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    public function index(Post $post)
    {
        // dd($post->assignment);
        $classroom= Classroom::find($post->classroom_id);
        $member =ClassroomMember::get()->where('user_id', auth()->user()->id);
        return view('assignment-submit', [
            'classroomMember' => $member,
            'classroom' => $classroom,
            'assignment' => $post->assignment
        ]);
    }
    public function classwork(Classroom $classroom)
    {
        $member =ClassroomMember::get()->where('user_id', auth()->user()->id);
        return view('classwork', [
            'classroomMember' => $member,
            'classroom' => $classroom
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $attributes=request()->validate([
            'title'=> 'required | min:3 | max:255'
        ]);

        // Convert a link into embed
        // if (filter_var($request->title, FILTER_VALIDATE_URL)) {
        //     $path= preg_replace(
        //         "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
        //         "<iframe src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",
        //         $request->title
        //     );
        // }
        $post= Post::create([
            'classroom_id' => $request->classroom,
            'title'=> request()->input('title'),
            'type' => 'general',
            'user_id'=> auth()->user()->id
        ]);
        if ($request->has('image')) {
            $imageName='IMG_'.md5(date('d-m-Y H:i:s')).'.'.$request->image->extension();
            $attachment = Attachment::create([
                'post_id'=> $post->id,
                'path'=>  $imageName
            ]);
            $request->image->move(public_path('uploads/classrooms/attachments'),$imageName);
        }
        return redirect('/classroom/'.$request->classroom)->with('message', 'Post Added Successfully');
    }
    public function submit(Post $post)
    {
        dd($post);
    }
    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
        //
    }

    public function update(Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
