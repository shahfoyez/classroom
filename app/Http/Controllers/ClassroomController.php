<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Classroom;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ClassroomMember;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreClassroomRequest;
use App\Http\Requests\UpdateClassroomRequest;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Classroom $classroom)
    {
        // dd($classroom);
        $member =ClassroomMember::get()->where('user_id', auth()->user()->id);
        return view('classroom', [
            'classroomMember' => $member,
            'classroom' => $classroom
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        $peoples= ClassroomMember::all()->where('classroom_id', $classroom->id);
        // dd($peoples);
        $member =ClassroomMember::get()->where('user_id', auth()->user()->id);
        return view('people', [
            'classroomMember' => $member,
            'classroom' => $classroom,
            'peoples' => $peoples
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function joinClass(Request $request)
    {
        $attributes=request()->validate([
            'classCode'=> 'required | exists:classrooms,code'
        ]);
        $classroom= Classroom::firstWhere('code', $request->classCode);
        $classroomId=$classroom->id;
        $user= ClassroomMember::where('user_id', '=', auth()->user()->id)
            ->where('classroom_id', '=',  $classroomId)
            ->get()->count();
        // dd($user);
        if($user>0){
            return redirect('/dashboard')->with('message', 'You are already a member');
        }else{
            $joinClass= ClassroomMember::create([
                'user_id'=> auth()->user()->id,
                'classroom_id'=> $classroomId,
                'is_teacher'=> 0
            ]);
        }
        return redirect('/dashboard')->with('message', 'Joined Class Successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClassroomRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $attributes=request()->validate([
            'name'=> 'required | min:3 | max:255',
            'section'=> 'required | min:1 | max:255',
            'subject'=> ['required', 'min:1', 'max:255']
        ]);
        // dd($attributes);
        $class= Classroom::create([
            'name'=> request()->input('name'),
            'section'=> request()->input('section'),
            'subject'=> request()->input('subject'),
            'created_by'=> auth()->user()->id,
            'code' => Str::random(5)
        ]);
        $class= ClassroomMember::create([
            'user_id'=> auth()->user()->id,
            'classroom_id'=> $class->id,
            'is_teacher'=> 1
        ]);

        return redirect('/dashboard')->with('message', 'Class Added Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Classroom $classroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClassroomRequest  $request
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClassroomRequest $request, Classroom $classroom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom)
    {
        //
    }
}
