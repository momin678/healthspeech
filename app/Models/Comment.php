<?php

namespace App\Models;
use App\Models\HealthSpeech;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = "comments";
    public function healthSpeech(){
        return $this->belongsTo(HealthSpeech::class);
    }
}
