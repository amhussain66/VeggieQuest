<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //

class ProgressController extends Controller
{
    public function update(Request $request)
    {
        $user = Auth::guard('websiteuser')->user();
        if ($user) {
            $user->points = min(100, intval($request->points));
            $user->save();
            return response()->json(['success' => true, 'points' => $user->points]);
        }
        return response()->json(['success' => false], 401);
    }
}
