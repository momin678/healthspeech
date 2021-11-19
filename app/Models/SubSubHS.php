<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubHS extends Model
{
    use HasFactory;
    protected $fillable = ['sub_hs_topics_id', 'sub_sub_hs_title', 'sub_sub_hs_image', 'sub_sub_hs_description'];
}
