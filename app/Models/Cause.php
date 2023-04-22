<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enum\StatusEnum;

class Cause extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id','title','slug','status','short_description','image','description'
    ];
    public function Category()
    {
        return $this->belongsTo('App\Models\Category','parent_id');
    }
    protected $casts = [
        'status' => StatusEnum::class
    ];
}

