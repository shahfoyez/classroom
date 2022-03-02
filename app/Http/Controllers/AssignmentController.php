<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Classroom;
use App\Models\Assignment;
use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\ClassroomMember;
use App\Http\Requests\StoreAssignmentRequest;
use App\Http\Requests\UpdateAssignmentRequest;

class AssignmentController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Classroom $classroom)
    {
        $curMember =ClassroomMember::get()->where('user_id', auth()->user()->id);
        return view('assignmentCreate', [
            'classroomMember' => $curMember,
            'classroom' => $classroom
        ]);
    }
    public function studentsAssignmentWorkCreate(Post $post)
    {
        $classroomId= $post->classroom_id;
        $classroom= Classroom::find($classroomId);
        $member= ClassroomMember::get()->where('classroom_id', $classroom->id)->whereNotIn('is_teacher', 1);
        $curMember =ClassroomMember::get()->where('user_id', auth()->user()->id);
        // dd($post->assignment);
        return view('studentsWork', [
            'classroomMember' => $curMember,
            'classroom' => $classroom,
            'assignment' => $post->assignment,
            'members' => $member
        ]);
    }

    public function store(Request $request)
    {
        $attributes=request()->validate([
            'title'=> 'required | min:3 | max:255',
            'instruction'=> 'required | min:3',
            'classroom'=> 'required',
            'points'=> 'integer|min:1|max:255',
            'date'=> 'nullable|after:yesterday',
            'time'=> 'nullable'
        ]);

        // Convert a link into embed
        // if (filter_var($request->title, FILTER_VALIDATE_URL)) {
        //     $path= preg_replace(
        //         "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
        //         "<iframe src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",
        //         $request->title
        //     );
        // }
        // dd($attributes);
        $post= Post::create([
            'classroom_id' => $request->classroom,
            'title'=> request()->input('title'),
            'type' => 'assignment',
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
        $post= Assignment::create([
            'title'=> request()->input('title'),
            'instruction'=> request()->input('instruction'),
            'type'=> 'assignment',
            'points'=> request()->input('points'),
            'title'=> request()->input('title'),
            'due_date'=> request()->input('date'),
            'due_time'=> request()->input('time'),
            'post_id'=> $post->id,
            'user_id'=> auth()->user()->id
        ]);

        return redirect('/classwork/'.$request->classroom)->with('message', 'Assignment Added Successfully');
    }
    public function submit(Post $post)
    {
        dd($post);
    }

    public function show(Assignment $assignment)
    {
        //
    }

    public function edit(Assignment $assignment)
    {
        //
    }

    public function update(UpdateAssignmentRequest $request, Assignment $assignment)
    {
        //
    }

    public function destroy(Assignment $assignment)
    {
        //
    }
}
