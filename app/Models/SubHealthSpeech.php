<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubHealthSpeech extends Model
{
    use HasFactory;
    protected $fillable = ['hs_tipics_id', 'sub_hs_title', 'sub_hs_image', 'sub_hs_description'];
}
