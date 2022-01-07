<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Models\ClassroomMember;

class GeneralController extends Controller
{
    public function index()
    {
        $member =ClassroomMember::get()->where('user_id', auth()->user()->id);
        return view('dashboard', [
            'classroomMember' => $member
        ]);
    }
}
