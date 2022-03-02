<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\AssignmentAttachment;
use App\Models\AssignmentSubmission;
use App\Http\Requests\StoreAssignmentSubmissionRequest;
use App\Http\Requests\UpdateAssignmentSubmissionRequest;

class AssignmentSubmissionController extends Controller
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
     * @param  \App\Http\Requests\StoreAssignmentSubmissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Assignment $assignment)
    {
        $attributes=request()->validate([
            "assignment" => "required|mimes:pdf|max:10000"
        ]);
        if (request()->has('assignment')) {
            $pdfName='PDF_'.md5(date('d-m-Y')).'.'.request()->assignment->extension();
            // dd($pdfName);
            $AssignmentSubmission= AssignmentSubmission::create([
                'assignment_id'=> $assignment->id,
                'classroom_id'=>  $assignment->post->classroom_id,
                'post_id'=>  $assignment->post->id,
                'user_id'=> auth()->user()->id
            ]);

            $AssignmentAttachment = AssignmentAttachment::create([
                'submit_id'=> $AssignmentSubmission->id,
                'type'=>  'pdf',
                'path' => $pdfName
            ]);
            request()->assignment->move(public_path('uploads/classrooms/assignments'), $pdfName);
        }
        return redirect('/assignmentSubmitPage/'.$assignment->post->id)->with('message', 'Assignment Submitted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssignmentSubmission  $assignmentSubmission
     * @return \Illuminate\Http\Response
     */
    public function show(AssignmentSubmission $assignmentSubmission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssignmentSubmission  $assignmentSubmission
     * @return \Illuminate\Http\Response
     */
    public function edit(AssignmentSubmission $assignmentSubmission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAssignmentSubmissionRequest  $request
     * @param  \App\Models\AssignmentSubmission  $assignmentSubmission
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAssignmentSubmissionRequest $request, AssignmentSubmission $assignmentSubmission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssignmentSubmission  $assignmentSubmission
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssignmentSubmission $assignmentSubmission)
    {
        //
    }
}
