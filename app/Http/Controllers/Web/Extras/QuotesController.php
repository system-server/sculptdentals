<?php

namespace App\Http\Controllers\Web\Extras;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//add
use App\Customer;
use App\Quote;
use Carbon\Carbon;

class QuotesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
      
    public function getCustomer(Request $request){

    	$customers = Customer::where( [ ['full_name','like', '%'.$request->name.'%'], ['status','ACTIVO'] ] )->take(10)->get();

    	foreach ($customers as $customer) {
    		$customer->sex 			= ucfirst(strtolower($customer->sex));
    		$customer->civil_state 	= ucfirst(strtolower($customer->civil_state));
    	}

    	return response()->json( $customers );
    }

    public function getQuotes(Request $request){

      if($request->date==''){
        $request->date = Carbon::now()->format('Y-m-d');
        $day = Carbon::now()->format('D');
      }else{
        $day = Carbon::parse($request->date)->format('D');
      }


      //domingo
      if($day == 'Sun'){
        $arr_horas = [ "09-00", "09-40", "10-20", "11-00", "11-40", "12-20", "13-00", "13-40", "14-20", "15-00"];
      }else{
        $arr_horas = [ "09-00", "09-40", "10-20", "11-00", "11-40", "12-20", "13-00", "break",
                       "15-00", "15-40", "16-20", "17-00", "17-40", "18-20", "19-00"];
      }

    	$quotes = Quote::where( [ ['date','=',$request->date], ['doctor_id','=',$request->doctor_id] ])->get();

    	foreach ($arr_horas as $id=>$hora) {
   			$quot['hour'] = $hora;
   			$quot['date'] = $request->date;
   			$quot['treatment'] 	= '';
   			$quot['observation'] = '';
   			$quot['status'] = 'Disponible';
   			$quot['doctor'] = '';
   			$quot['customer'] = '';
   			$quot['customer_id'] = '';
        $quot['quote_id'] = '';
   			$arr_horas[$id] = $quot;    		
	    	foreach ($quotes as $quote) {
	    		if($hora == $quote->hour){
	    			$quot['hour'] = $quote->hour;
	    			$quot['date'] = $quote->date;
	    			$quot['treatment'] = $quote->treatment;
	    			$quot['observation'] = $quote->observation;
	    			$quot['status'] = ucfirst(strtolower($quote->status));
	    			$quot['doctor'] = $quote->doctor->full_name;
	    			$quot['customer'] = $quote->customer->full_name;
	    			$quot['customer_id'] = $quote->customer->id;
            $quot['quote_id'] = $quote->id;
	    			$arr_horas[$id] = $quot;
	    		}
	    	}
    	}



    	return response()->json( $arr_horas );
    }

    public function doctorCalendar(){
      return view('quotes.calendar_doctor');
    }
}
