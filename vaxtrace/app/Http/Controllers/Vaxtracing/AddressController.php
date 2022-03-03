<?php

namespace App\Http\Controllers\Vaxtracing;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    public function index()
    {
        $address = json_decode(file_get_contents(public_path() . "/js/user/address.json"), true);

        return response()->json( [$address] );
    }
}
