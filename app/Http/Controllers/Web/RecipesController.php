<?php

namespace App\Http\Controllers\Web;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Doctor;
use App\Customer;
use App\Recipe;
use App\Area;
use App\Service;

class RecipesController extends Controller
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
        $recipe = new Recipe([
            'name'      => 'Receta',
            'recipe'    => $request->editor,
            'area_id'   => $request->idArea,
            'doctor_id' => $request->idDoctor,
        ]);
        
        $user = Customer::find($request->idCustomer);

        $user->recipes()->save($recipe);

        //dd('no se guardo');

        //dd( $recipe );
        //dd('se guardo');
        //dd($user);
        //dd( $request->all() );

        /*$fecha=date('Y-m-d H:i:s');
        $recipe=$request->all();
        $cadena = trim($recipe['editor'], "\n\t.");
        $doctor = Doctor::find($recipe['idDoctor']);
        $customer = Customer::find($recipe['idCustomer']);
        $area = Area::find($recipe['idArea']);
        $recipe['name'] = "Receta";
        $recipe['date'] = $fecha;
        $recipe['recipe'] = ucfirst($cadena); 
        $recipe['customer_id'] = $customer->id;
        $recipe['doctor_id'] = $doctor->id;
        $recipe['area_id'] = $area->id;
        $recipe = Recipe::create($recipe);
        if(isset($recipe)){        
        $services = Service::where('type','NORMAL')->orderBy('name','ASC')->get();
        $recipes = Recipe::where('customer_id',$customer->id)->orderBy('name','ASC')->get();*/
        //return view('users.show', compact('customer','services','recipes'));
        return redirect()->back();        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $recipe = Recipe::where('id',$id)->orderBy('name','ASC')->get();
        
        $customer = Customer::find($recipe[0]->customer_id);

        $doctor = Doctor::find( $recipe[0]->doctor_id ); 
        
        return view('users.printrecipe', compact('customer','recipe','doctor'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd($id);
        $recipe = Recipe::find($id);
        $customer = Customer::find($recipe->customer_id);
        $doctor = Doctor::find($recipe->doctor_id);
        $areas = Area::orderBy('name','ASC')->pluck('name','id');
        return view('users.show.recipes._editar', compact('customer','doctor','recipe','areas'));
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
        //dd($request->all());
        $recipe = Recipe::find($id);
        $recipe->update( $request->all() );

        //dd($recipe);

        return redirect()->route('users.show',$recipe->customer_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Recipe::find($id)->delete();
        return response()->json( ['msg'=>'deleted'] );
    }
}
