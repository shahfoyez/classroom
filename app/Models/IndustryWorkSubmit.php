<?php

namespace App\Models;

use App\Models\IndustryWork;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IndustryWorkSubmit extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with=['user','industryGrade'];

    public function industryWork(){
        return $this->belongsTo(IndustryWork::class, 'iw_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function industryGrade(){
        return $this->hasOne(IndustryGrade::class, 'iws_id');
    }
}
