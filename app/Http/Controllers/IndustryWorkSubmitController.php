<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Classroom;
use App\Models\IndustryWork;
use App\Models\IndustryGrade;
use App\Models\ClassroomMember;
use App\Models\IndustryWorkSubmit;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreIndustryWorkSubmitRequest;
use App\Http\Requests\UpdateIndustryWorkSubmitRequest;

class IndustryWorkSubmitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndustryWork $industryWork, Classroom $classroom)
    {
        // dd($industryWork);
        // dd($classroom->id);
        $curMember =ClassroomMember::get()->where('user_id', auth()->user()->id);
        $member =ClassroomMember::get()->where('user_id', auth()->user()->id);
        return view('industryWork', [
            'classroom' => $classroom,
            'classroomMember' => $member,
            'curMember' => $curMember,
            'industryWork' => $industryWork
        ]);
    }
    public function industryGradeSubmit(IndustryWorkSubmit $industryWorkSubmit){
        // dd($industryWorkSubmit->classroom);
        $workPoints= $industryWorkSubmit->industryWork->points;
        $attributes=request()->validate([
            'points'=> 'required | lte: 100'
        ]);

        if(auth()->user()->role== 2){
            if($industryWorkSubmit->industryGrade){
                IndustryGrade::where('iws_id',$industryWorkSubmit->id)->update([
                    'teacher_points'=> request()->input('points')
                ]);
                return Redirect::back()->with('message', 'Grade Updated!');
            }else{
                $post= IndustryGrade::create([
                    'teacher_points' => request()->input('points'),
                    'iws_id'=> $industryWorkSubmit->id
                ]);
                return Redirect::back()->with('message', 'Submission Graded!');
            }
        }else{
            if($industryWorkSubmit->industryGrade){
                IndustryGrade::where('iws_id',$industryWorkSubmit->id)->update([
                    'industry_points'=> request()->input('points')
                ]);
                return Redirect::back()->with('message', 'Grade Updated!');
            }else{
                $post= IndustryGrade::create([
                    'industry_points' => request()->input('points'),
                    'iws_id'=> $industryWorkSubmit->id
                ]);
                return Redirect::back()->with('message', 'Submission Graded!');
            }
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(IndustryWork $industryWork, Classroom $classroom)
    {
        //  dd($industryWork);
        //  $classroom= Classroom::find($industryWork->classroom_id);
         $member =ClassroomMember::get()->where('user_id', auth()->user()->id);
         return view('industryWorkSubmit', [
             'classroomMember' => $member,
             'classroom' => $classroom,
             'industryWork' => $industryWork
         ]);
    }
    public function industryView(IndustryWork $industryWork)
    {
        //  dd($industryWork);
        $industryWorks= IndustryWork::get()->where('user_id', auth()->user()->id);
        $classroom= Classroom::find($industryWork->classroom_id);
        $member =ClassroomMember::get()->where('user_id', auth()->user()->id);
        return view('industryWorkIndustryView', [
             'classroomMember' => $member,
             'classroom' => $classroom,
             'industryWork' => $industryWork,
             'industryWorks' => $industryWorks

         ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreIndustryWorkSubmitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IndustryWork $industryWork ,Classroom $classroom)
    {
        // dd($industryWork);
        $attributes=request()->validate([
            "industryWork" => "required|mimes:pdf|max:10000"
        ]);
        if (request()->has('industryWork')) {
            $pdfName='PDF_'.md5(date('d-m-Y')).'.'.request()->industryWork->extension();
            $AssignmentSubmission= IndustryWorkSubmit::create([
                'iw_id'=> $industryWork->id,
                'classroom_id'=>  $classroom->id,
                'attachment_path' => $pdfName,
                'user_id'=> auth()->user()->id
            ]);
            request()->industryWork->move(public_path('uploads/classrooms/industryWork'), $pdfName);
        }
        return  back()->with('message', 'Industry Work Submitted Successfully');
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
