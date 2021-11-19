<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HealthSpeech;
use App\Models\HealthTopic;

class SitemapXmlController extends Controller
{
    public function index() {
        $articals = HealthSpeech::all();
        $topics = HealthTopic::all();
        return response()->view('sitemap', [
            'articals' => $articals,
            'topics' => $topics
        ])->header('Content-Type', 'text/xml');
      }
}
