<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EssayDetail extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function essay()
    {
        return $this->belongsTo(Essay::class, 'essay_id');
    }
}
