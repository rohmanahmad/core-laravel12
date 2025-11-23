<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SwaggerController extends Controller
{
    public function docs()
    {
        $json = File::get(base_path('swagger.json'));
        return response($json, 200, [
            'Content-Type' => 'application/json'
        ]);
    }
}
