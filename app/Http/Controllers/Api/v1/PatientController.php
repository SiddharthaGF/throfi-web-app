<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PatientResource;
use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return PatientResource::collection(
            Patient::select([
                'id',
                'name',
                'last_name',
                'birthdate',
                'city',
                'profile_photo',
            ])->name($request->name)
                ->Paginate(25)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patient = new Patient();
        $patient->name = $request->name;
        $patient->last_name = $request->last_name;
        $patient->ocupation = $request->ocupation;
        $patient->birthdate = $request->birthdate;
        $patient->city = $request->city;
        $patient->nutritional_diagnosis = $request->nutritional_diagnosis;
        $patient->type_of_surgery = $request->type_of_surgery;
        $patient->save();
        return $patient;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::find($id);

        return $patient;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $patient = Patient::findOrFail($request->id);
        $patient->name = $request->name;
        $patient->last_name = $request->last_name;
        $patient->ocupation = $request->ocupation;
        $patient->birthdate = $request->birthdate;
        $patient->city = $request->city;
        $patient->nutritional_diagnosis = $request->nutritional_diagnosis;
        $patient->type_of_surgery = $request->type_of_surgery;
        $patient->save();
        return $patient;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::destroy($id);
        return $patient;
    }
}
