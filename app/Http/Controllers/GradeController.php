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
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(AssignmentSubmission $assignmentSubmission)
    {
        $assignmentPoints= $assignmentSubmission->assignment->points;
        $attributes=request()->validate([
            'points'=> 'required | lte: 100'
        ]);
        if($assignmentSubmission->grade){
            Grade::where('as_id',$assignmentSubmission->id)->update([
                'points'=> request()->input('points')
            ]);
            return Redirect::back()->with('message', 'Grade Updated!');
        }else{
            $post= Grade::create([
                'points' => request()->input('points'),
                'as_id'=> $assignmentSubmission->id,
                'type' => 'assignment'
            ]);
            return Redirect::back()->with('message', 'Submission Graded!');
        }

    }

    public function show(Grade $grade)
    {
        //
    }

    public function edit(Grade $grade)
    {
        //
    }

    public function update(UpdateGradeRequest $request, Grade $grade)
    {
        //
    }

    public function destroy(Grade $grade)
    {
        //
    }
}
