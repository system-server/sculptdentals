<?php

namespace App\Http\Controllers\Web\Extras;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Database\Eloquent\Model;
//
use Illuminate\Support\Facades\Auth;
use App\Package;
use App\Customer;
use App\PackageConcept;
use App\PackagePayment;

class PackagePaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }    

    function addPackage(Request $request){

    	$concept = array();

    	$customer = Customer::find($request->customer_id);
    	$package  = Package::find($request->package_id);

    	$concept = new PackageConcept();
        $concept->name = $package->name;
        $concept->description = $package->description;
        $concept->price = $package->price;
        $concept->package_id = $package->id;
        $concept->save();

        $customer->package_concepts()->syncWithoutDetaching($concept->id);

    	return response()->json( $concept->package->name );

    }

    function getPackages(Request $request){

    	$customer = Customer::find($request->customer_id);

        foreach ($customer->package_concepts as $concept) {
            $concept->package->name;
            foreach ($concept->package_payments as $payment) {
                $payment->amount;
                $payment->description;
                $payment->package_concept_id;
            }
        }

        return response()->json( $customer->package_concepts );
    	
    }

    function storePaymentPackage(Request $request){
        PackagePayment::create( $request->all() );
        return response()->json( $request->all() );
    }

    function getPackagePayment($id){
        $payment = PackagePayment::find($id);
        return response()->json( $payment );
    }

    function updatePackagePayment(Request $request, $id){
        $payment = PackagePayment::find($id)->update( $request->all() );
        return response()->json( $payment );
    }

    function deletePackagePayment($id){
        $payment = PackagePayment::find($id)->delete();
        return response()->json( $payment );
    }

}
