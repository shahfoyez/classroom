<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Models\ClassroomMember;

class PdfController extends Controller
{
    function assignmentMark(Post $post){
        $classroomId= $post->classroom_id;
        $classroom= Classroom::find($classroomId);
        $member= ClassroomMember::get()->where('classroom_id', $classroom->id)->whereNotIn('is_teacher', 1);
        $curMember =ClassroomMember::get()->where('user_id', auth()->user()->id);
        // dd($post->assignment);
        return view('assignmentPDF', [
            'classroomMember' => $curMember,
            'classroom' => $classroom,
            'assignment' => $post->assignment,
            'members' => $member
        ]);
    }
}
