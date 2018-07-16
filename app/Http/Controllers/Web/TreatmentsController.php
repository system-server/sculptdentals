<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//add
use App\Customer;
use App\Service;
use App\Treatment;
use Illuminate\Support\Facades\Auth;

class TreatmentsController extends Controller
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
    public function index(Request $request)
    {
        if( $request->ajax() ){

            $customer = Customer::find( $request->get('customer_id') );

            if( count($customer->treatments) >0 ){
                foreach ($customer->treatments as $treatment) {
                    $treatment->id;
                    $treatment->diagnostic;
                    $treatment->observations;
                    $treatment->updated_at;
                    $treatment->doctor->full_name;
                    $treatment->service->name;
                    $treatment->assistant_name;
                    $treatment->price = number_format($treatment->price_single, 2);
                    $treatment->created_at;
                }
                return response()->json( $customer->treatments );
            }else{
                return response()->json( ['msg'=>'El cliente aun no tiene tratamientos'] );
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if( $request->ajax() ){

            $customer = Customer::find( $request->get('customer_id') );
            $service  = Service::find( $request->get('service_id') );

            $treatment              = $request->all();
            $treatment['doctor_id'] = Auth::user()->doctor_id;
            $treatment['price']     = $service['price_single'];

            $treatment = Treatment::create( $treatment );

            $customer->treatments()->attach( $treatment->id );

            return response()->json( ['msg' => 'Tratamiento creado satisfactoriamente'] );
        }
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
        $id = explode('-', $id);
        $treatment = Treatment::find( $id[1] );
        return response()->json( $treatment );
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
        if( $request->ajax() ){
            $treatment = Treatment::find($id);
            $treatment->update( $request->all() );
            return response()->json( ['msg'=>'Tratamiento actualizado satisfactoriamente'] );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = explode('-', $id);
        $treatment = Treatment::find($id[1])->delete();

        return response()->json( ['msg'=>'Tratamiento eliminado satisfactoriamente'] );
    }
}
