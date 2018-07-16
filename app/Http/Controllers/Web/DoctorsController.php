<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//
use App\Doctor;

class DoctorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::where('status','ACTIVO')->orderBy('full_name')->paginate(20);

        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $doctor = $request->all();
        $doctor['full_name'] = $request->get('last_name_one') . ' ' . $request->get('last_name_two') . ' ' . $request->get('name');
        Doctor::create( $doctor );

        return redirect()->route('doctors.index')->with('info', 'Doctor creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = Doctor::find($id);

        return view('doctors.edit', compact('doctor')); 
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
        $doctor = Doctor::find( $id );

        $doctor->update( $request->all() );

        return redirect()->route('doctors.index')->with('info','Doctor actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor_upd['status'] = 'INACTIVO';

        $doctor = Doctor::find( $id );

        $doctor->update( $doctor_upd );

        return redirect()->route('doctors.index')->with('info','Doctor eliminado correctamente.');
    }
}
