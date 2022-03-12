<?php

namespace App\Models;

use App\Models\IndustryWork;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassIndustryWork extends Model
{
    use HasFactory;
    protected $guarded = [];
    // protected $with=['industryWork'];

    public function industryWork(){
        return $this->belongsTo(IndustryWork::class, 'iw_id');
    }
}
