<?php
namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// use App\Http\Requests\AuthRequest;
// use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    public function __construct()
    {

    }

    public function getLocation(Request $request)
    {
        $province_id = $request->input('province_id');
        echo $province_id;die();
    }
}
