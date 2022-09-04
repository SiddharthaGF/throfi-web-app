<?php

namespace App\Http\Controllers\Api\v1\DPA;

use App\Imports\ProvinceImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Province;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Province::Paginate();
    }

    public function importExcel(Request $request) 
    {
        $file = $request->file('file');
        Excel::import(new ProvinceImport, $file);
        return back()->with('message', 'Importacion correcta');
    }
}
