<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posko;
use App\Models\PoskoKebutuhan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    

    public function showIndex(Request $request)
{
    $search = $request->search;

    $poskos = Posko::with(['kebutuhans', 'picUser'])
        ->when($search, function ($query) use ($search) {
            $query->where('nama_posko', 'like', "%{$search}%")
                  ->orWhere('kelurahan', 'like', "%{$search}%")
                  ->orWhere('kondisi_bencana', 'like', "%{$search}%")
                  ->orWhere('alamat', 'like', "%{$search}%");
        })
        ->get();

    return view('index', compact('poskos'));
}
}
