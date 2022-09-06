<?php

namespace App\Http\Controllers\Api\v1\DPA;

use App\Imports\StateImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\State;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return State::Paginate();
    }

    public function importExcel(Request $request) 
    {
        $file = $request->file('file');
        Excel::import(new StateImport, $file);
        return back()->with('message', 'Importacion correcta');
    }
}
