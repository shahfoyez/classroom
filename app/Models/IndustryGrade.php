<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndustryGrade extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function industryWorkSubmit(){
        return $this->belongsTo(IndustryWorkSubmit::class, 'iws_id');
    }
}
