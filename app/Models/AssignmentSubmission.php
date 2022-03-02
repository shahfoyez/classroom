<?php

namespace App\Models;

use App\Models\Grade;
use App\Models\Assignment;
use App\Models\AssignmentAttachment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssignmentSubmission extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with=['assignmentAttachment','grade','user'];
    public function assignmentAttachment(){
        return $this->hasOne(AssignmentAttachment::class, 'submit_id');
    }
    public function grade(){
        return $this->hasOne(Grade::class, 'as_id');
    }
    public function assignment(){
        return $this->belongsTo(Assignment::class, 'assignment_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
