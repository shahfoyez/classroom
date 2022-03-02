<?php

namespace App\Models;

use App\Models\AssignmentSubmission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssignmentAttachment extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function assignmentSubmission(){
        return $this->belongsTo(AssignmentSubmission::class, 'submit_id');
    }
}
