<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthSpeech extends Model
{
    use HasFactory;
    protected $fillable = ['hs_tipics_id','hs_title', 'hs_image', 'hs_description', 'hs_meta_title', 'hs_meta_tages','hs_meta_description', 'hs_meta_keywords', 'slug'];

    public function comment_counts() {
        return $this->hasMany(Comment::class);
    }
}
