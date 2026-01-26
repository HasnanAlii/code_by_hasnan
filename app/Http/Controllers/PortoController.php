<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Projek;

class PortoController extends Controller
{       

public function index(Request $request)
{
   $projek = Projek::all();
   return view('Porto.index', compact('projek'));
}

}