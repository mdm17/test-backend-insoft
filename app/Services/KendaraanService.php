<?php

namespace App\Services;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanService
{
    public function create(Request $request)
    {
        Kendaraan::create($request);
    }
}
