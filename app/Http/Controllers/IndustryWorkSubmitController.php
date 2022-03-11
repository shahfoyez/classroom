<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\IndustryWork;
use App\Models\ClassroomMember;
use App\Models\IndustryWorkSubmit;
use App\Http\Requests\StoreIndustryWorkSubmitRequest;
use App\Http\Requests\UpdateIndustryWorkSubmitRequest;

class IndustryWorkSubmitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(IndustryWork $industryWork)
    {
         // dd($industryWork);
         $classroom= Classroom::find($industryWork->classroom_id);
         $member =ClassroomMember::get()->where('user_id', auth()->user()->id);
         return view('industryWorkSubmit', [
             'classroomMember' => $member,
             'classroom' => $classroom,
             'industryWork' => $industryWork
         ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreIndustryWorkSubmitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IndustryWork $industryWork)
    {
        // dd($industryWork);
        $attributes=request()->validate([
            "industryWork" => "required|mimes:pdf|max:10000"
        ]);
        if (request()->has('industryWork')) {
            $pdfName='PDF_'.md5(date('d-m-Y')).'.'.request()->industryWork->extension();
            $AssignmentSubmission= IndustryWorkSubmit::create([
                'iw_id'=> $industryWork->id,
                'classroom_id'=>  $industryWork->classroom_id,
                'attachment_path' => $pdfName,
                'user_id'=> auth()->user()->id
            ]);
            request()->industryWork->move(public_path('uploads/classrooms/industryWork'), $pdfName);
        }
        return redirect('/industryWorkSubmit/'.$industryWork->id)->with('message', 'Industry Work Submitted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IndustryWorkSubmit  $industryWorkSubmit
     * @return \Illuminate\Http\Response
     */
    public function show(IndustryWorkSubmit $industryWorkSubmit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IndustryWorkSubmit  $industryWorkSubmit
     * @return \Illuminate\Http\Response
     */
    public function edit(IndustryWorkSubmit $industryWorkSubmit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIndustryWorkSubmitRequest  $request
     * @param  \App\Models\IndustryWorkSubmit  $industryWorkSubmit
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIndustryWorkSubmitRequest $request, IndustryWorkSubmit $industryWorkSubmit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IndustryWorkSubmit  $industryWorkSubmit
     * @return \Illuminate\Http\Response
     */
    public function destroy(IndustryWorkSubmit $industryWorkSubmit)
    {
        //
    }
}
