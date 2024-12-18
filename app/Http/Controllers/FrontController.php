<?php

namespace App\Http\Controllers;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use App\Services\FrontService;

class FrontController extends Controller
{
  
    public function index()
    {   
        $lowongans = Lowongan::with('perusahaan')->get();
        return view('front.index', compact('lowongans'));
    }
}
