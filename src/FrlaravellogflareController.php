<?php

namespace Freemancontingent\Laravellogflare;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Freemancontingent\Laravellogflare\Flare;
use App\Http\Requests;

class FrlaravellogflareController extends Controller
{
    public function index()
    {
        $flare = new Flare();
        return $flare->firing();
    }
}
