<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndustryWorkSubmit extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function industryWork(){
        return $this->belongsTo(IndustryWork::class, 'iw_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
