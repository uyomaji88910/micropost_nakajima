<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class FavoriteController extends Controller
{
    PUBLIC FUNCTION STORE(REQUEST $request, $micropostId)  
    {
        \Auth::user()->fav($micropostId);
        return redirect()->back();
    }

    public function destroy($micropostId)
    {
        \Auth::user()->unfav($micropostId);
        return redirect()->back();
    }
}
