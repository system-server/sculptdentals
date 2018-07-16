<?php

namespace App\Http\Controllers\Web;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Customer;
use App\Occupation;
use App\Service;
use App\PackagePayment;
use App\Package;
use App\Doctor;
use App\Recipe;
class UsersController extends Controller
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
        //dd('holis');
        //dd( PackagePayment::find(1) );
        //$customer = Customer::find(21);
        //$customer->packages()->attach([1,2]);

        //dd( $customer->packages );

        /*foreach($customer->packages as $package){
            dd( $customer->packages );
            foreach($package->package_concept->package_payments as $payment){
                dd( $payment);     
            }            
            dd( $package->package_concept->package_payments);     
        }*/

        /*
        $customer = Customer::find(21);
        foreach($customer->special_concepts as $special){
            dd( $special->special_payments );
            foreach($special->special_payments as $payment){

            }
        }*/
        


        $customers = Customer::where('status','ACTIVO')->orderBy('full_name')->paginate(20);        
        return view('users.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $occupations = Occupation::orderBy('title')->pluck('title','id');
        return view('users.create', compact('occupations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd( $request->all() );
        $user = $request->all();
        $user['full_name'] = $request->get('last_name_one') . ' ' . $request->get('last_name_two') . ' ' . $request->get('name');
        Customer::create( $user );

        return redirect()->back()->with('info', 'Cliente creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);

        $services = Service::where('type','NORMAL')->orderBy('name','ASC')->get();

        $packages = Package::orderBy('name','ASC')->get();
        //recetas
        $recipes = Recipe::where('customer_id',$customer->id)->orderBy('updated_at','DESC')->get();
        $doctor = Doctor::find( Auth::user()->doctor_id );
  
        return view('users.show', compact('customer','services','packages','recipes','doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $occupations = Occupation::orderBy('title')->pluck('title','id');

        $customer = Customer::find($id);

        return view('users.edit', compact('customer','occupations')); 
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
        $cus_upd = $request->all();
        $cus_upd['full_name'] = $request->get('last_name_one') . ' ' . $request->get('last_name_two') . ' ' . $request->get('name');
        $customer = Customer::find( $id );

        $customer->update( $cus_upd );

        return redirect()->route('users.index')->with('info','Cliente actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer_upd['status'] = 'INACTIVO';

        $customer = Customer::find( $id );

        $customer->update( $customer_upd );

        return redirect()->route('users.index')->with('info','Cliente eliminado correctamente.');
    }
}
