<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Customer;
Use App\Company;

class CustomersController extends Controller
{
    //public function list(){  ** these are laravel standard resource controller methods
      public function index(){
    	/*$customers = [
         'mihiran',
         'krishantha',
         'sameera'
      ];*/
      //$activeCustomers = Customer::where('active',1)->get(); // when we use scope we can get rid of this query
      //$activeCustomers = Customer::active()->get();
      //$inactiveCustomers = Customer::where('active', 0)->get();
      //$inactiveCustomers = Customer::inactive()->get();
      //to get all the companies
     // $companies = Company::all();

      //dd($inactiveCustomers);
      $customers = Customer::all();

     // dd($customers);

	/*return view('internals.customers',
     [
        'activeCustomers' => $activeCustomers ,
        'inactiveCustomers' => $inactiveCustomers,
        ]);*/

        // we can  easily do this using compact()

        //return view('internals.customers',compact('activeCustomers','inactiveCustomers','companies'));
        return view('customers.index',compact('customers')); // standard way
    }

    public function create(){
      $companies = Company::all();

      return view('customers.create',compact('companies'));
    }


    public function store(){

         $data = request()->validate([
            'name' => 'required|min:3',
            'email'=> 'email:rfc,dns',
            'active' => 'required',
            'company_id' => 'required'
         ]);

         //dd($data); //inside this $data variable all the data are validated.They are powerful.
         
         //Although we define $data variable we are not using it
         //next try to get use of it
         //
         $customer = Customer::create($data);/*when using this we can get rid using large number of lines*/

          
          //we further do not need this steps
         //by using Customer::create($data) we can store the validated data in the database
         /*$customer = new Customer();
         $customer->name = request('name');
         $customer->email = request('email');
         $customer->active = request('active');
         $customer->save();*/

         //return back(); //we can not do it further
         return redirect('customers');


      //dd(request('name'));
    }
}

//Add [name] to fillable property to allow mass assignment on[App/Customer]
//two ways to overcome this problem
  // 1.0 create the protected $fillable field in the Customer model
  // 2.0 create the protectec $guarded field in the customer model