<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Support\Str;
use App\Models\ClassroomMember;
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
        // dd(Str::random(5));
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
        $member =ClassroomMember::get()->where('user_id', auth()->user()->id);
        return view('people', [
            'classroomMember' => $member,
            'classroom' => $classroom
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

        return redirect('/dashboard')->with('success', 'Class Added Successfully');
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
