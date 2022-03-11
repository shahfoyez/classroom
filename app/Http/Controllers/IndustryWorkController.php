<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Attachment;
use App\Models\IndustryWork;
use Illuminate\Http\Request;
use App\Models\ClassroomMember;
use App\Http\Requests\StoreIndustryWorkRequest;
use App\Http\Requests\UpdateIndustryWorkRequest;

class IndustryWorkController extends Controller
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

    public function create()
    {
        $curMember =ClassroomMember::get()->where('user_id', auth()->user()->id);
        return view('industryWorkCreate');
    }
    public function view(Classroom $classroom)
    {
        // dd($classroom);
        $curMember =ClassroomMember::get()->where('user_id', auth()->user()->id);
        $industryWork =IndustryWork::get()->where('classroom_id', $classroom->id)->sortByDesc("created_at");
        return view('addedWorkView', [
            'classroomMember' => $curMember,
            'industryWorks'   => $industryWork,
            'classroom'       => $classroom
        ]);
    }
    public function relatedWorkView(Classroom $classroom)
    {
        //  dd($classroom);
         $curMember =ClassroomMember::get()->where('user_id', auth()->user()->id);
         $industryWork =IndustryWork::get()->where('subject', $classroom->subject)->sortByDesc("created_at");
         return view('relatedWorkView', [
             'classroomMember' => $curMember,
             'industryWorks'   => $industryWork,
             'classroom'       => $classroom
         ]);
    }
    public function workAddToClass(Classroom $classroom, IndustryWork $work)
    {
        $update= IndustryWork::where('id',$work->id)->update(['classroom_id'=> $classroom->id]);
        return redirect('/industryWorkView/'.$classroom->id)->with('message', 'Work Added Successfully');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreIndustryWorkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $attributes=request()->validate([
            'title'=> 'required | min:3 | max:255',
            'instruction'=> 'required | min:3',
            'subject'=> 'required',
            'points'=> 'integer|min:1|max:255',
            'date'=> 'nullable|after:yesterday',
            'time'=> 'nullable'
        ]);

        if ($request->has('image')) {
            $imageName='IMG_'.md5(date('d-m-Y H:i:s')).'.'.$request->image->extension();
            $request->image->move(public_path('uploads/classrooms/attachments'),$imageName);
            $industryWork= IndustryWork::create([
                'title'       => request()->input('title'),
                'instruction' => request()->input('instruction'),
                'type'        => 'work',
                'subject'     => request()->input('subject'),
                'image'       => $imageName,
                'points'      => request()->input('points'),
                'due_date'    => request()->input('date'),
                'due_time'    => request()->input('time'),
                'user_id'     => auth()->user()->id
            ]);
        }else{
            $industryWork= IndustryWork::create([
                'title'       => request()->input('title'),
                'instruction' => request()->input('instruction'),
                'type'        => 'work',
                'subject'     => request()->input('subject'),
                'points'      => request()->input('points'),
                'due_date'    => request()->input('date'),
                'due_time'    => request()->input('time'),
                'user_id'     => auth()->user()->id
            ]);
        }
        return redirect('/dashboard')->with('message', 'Work Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IndustryWork  $industryWork
     * @return \Illuminate\Http\Response
     */
    public function show(IndustryWork $industryWork)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IndustryWork  $industryWork
     * @return \Illuminate\Http\Response
     */
    public function edit(IndustryWork $industryWork)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIndustryWorkRequest  $request
     * @param  \App\Models\IndustryWork  $industryWork
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIndustryWorkRequest $request, IndustryWork $industryWork)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IndustryWork  $industryWork
     * @return \Illuminate\Http\Response
     */
    public function destroy(IndustryWork $industryWork)
    {
        //
    }
}
