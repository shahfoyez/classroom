<?php

namespace App\Http\Controllers;

use App\Models\AssignmentAttachment;
use App\Http\Requests\StoreAssignmentAttachmentRequest;
use App\Http\Requests\UpdateAssignmentAttachmentRequest;

class AssignmentAttachmentController extends Controller
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
     * @param  \App\Http\Requests\StoreAssignmentAttachmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAssignmentAttachmentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssignmentAttachment  $assignmentAttachment
     * @return \Illuminate\Http\Response
     */
    public function show(AssignmentAttachment $assignmentAttachment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssignmentAttachment  $assignmentAttachment
     * @return \Illuminate\Http\Response
     */
    public function edit(AssignmentAttachment $assignmentAttachment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAssignmentAttachmentRequest  $request
     * @param  \App\Models\AssignmentAttachment  $assignmentAttachment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAssignmentAttachmentRequest $request, AssignmentAttachment $assignmentAttachment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssignmentAttachment  $assignmentAttachment
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssignmentAttachment $assignmentAttachment)
    {
        //
    }
}
