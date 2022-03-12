<?php

namespace App\Models;

use App\Models\Classroom;
use App\Models\ClassIndustryWork;
use App\Models\IndustryWorkSubmit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IndustryWork extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with=['user','classroom','classroomIndustryWork','industryWorkSubmission'];
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function industryWorkSubmission(){
        return $this->hasMany(IndustryWorkSubmit::class, 'iw_id');
    }
    public function classroom(){
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
    public function classroomIndustryWork(){
        return $this->hasMany(ClassIndustryWork::class, 'iw_id');
    }
}
