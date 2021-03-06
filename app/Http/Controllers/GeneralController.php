<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\IndustryWork;
use Illuminate\Http\Request;
use App\Models\ClassroomMember;

class GeneralController extends Controller
{
    public function index()
    {
        $member =ClassroomMember::get()->where('user_id', auth()->user()->id);
        // dd($member);
        $industryWork= IndustryWork::get()->where('user_id', auth()->user()->id)->sortByDesc("created_at");
        if(auth()->user()->role!=3){
            return view('dashboard', [
                'classroomMember' => $member
            ]);
        }else{
            return view('dashboard', [
                'industryWorks' => $industryWork
            ]);
        }
    }
}
