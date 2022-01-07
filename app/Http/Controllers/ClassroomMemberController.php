<?php

namespace App\Http\Controllers;

use App\Models\ClassroomMember;
use App\Http\Requests\StoreClassroomMemberRequest;
use App\Http\Requests\UpdateClassroomMemberRequest;

class ClassroomMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreClassroomMemberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClassroomMemberRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassroomMember  $classroomMember
     * @return \Illuminate\Http\Response
     */
    public function show(ClassroomMember $classroomMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassroomMember  $classroomMember
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassroomMember $classroomMember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClassroomMemberRequest  $request
     * @param  \App\Models\ClassroomMember  $classroomMember
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClassroomMemberRequest $request, ClassroomMember $classroomMember)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassroomMember  $classroomMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassroomMember $classroomMember)
    {
        //
    }
}
