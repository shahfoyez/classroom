<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Grade;
use App\Models\AssignmentSubmission;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\StoreGradeRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UpdateGradeRequest;

class GradeController extends Controller
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
     * @param  \App\Http\Requests\StoreGradeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssignmentSubmission $assignmentSubmission)
    {
        // dd($assignmentSubmission->assignment->post->id);
        $assignmentPoints= $assignmentSubmission->assignment->points;
        // dd($assignmentPoints);
        $attributes=request()->validate([
            'points'=> 'required | lte: 100'
        ]);
        $post= Grade::create([
            'points' => request()->input('points'),
            'as_id'=> $assignmentSubmission->id,
            'type' => 'assignment'
        ]);
        return Redirect::back()->with('message', 'Submission Graded');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGradeRequest  $request
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGradeRequest $request, Grade $grade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        //
    }
}
