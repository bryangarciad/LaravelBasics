<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Customer;
use App\Models\Company;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeNewUserMail;
use App\Events\NewCustomerHasRegisteredEvent;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Gate;

class CustomersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    private function validateRequest(){

        return request()->validate([
                'Name' => 'required',
                'company_id' => 'required',
                'email' => 'required',
                'active' => 'required',
                'image' => 'sometimes|file|image'
            ]);
    }

    public function index(){
        // testing hhtp request laravel
        // $response = json_decode(Http::get('https://rickandmortyapi.com/api/character'));
        // dd($response);

        // $activeCustomers = Customer::Active();
        // $inactiveCustomers = Customer::Inactive();
        // $companies = Company::all();
       // $customers = Customer::with('company')->get(); // this is mosre efficient for multiquerys or relationships
        $customers = Customer::with('company')->simplePaginate(5);
        // Long way to pass Data
        // return view('internals.customers', [
        //     'activeCustomers' => $activeCustomers,
        //     'inactiveCustomers' => $inactiveCustomers 
        // ]);

        // Shotcut to pass data
        return view('customers.index', compact('customers'));


    }

    public function create(){
        // if(Gate::allows('create', Auth::user())){
        //     $companies = Company::all();
        //     $customer = new Customer();
        //     return view('customers.create', compact('companies', 'customer'));
        // }
                $this->authorize('create', Customer::class);
                $companies = Company::all();
                $customer = new Customer();
                return view('customers.create', compact('companies', 'customer'));
       
    }

    // public function show($customer){

    //     // $customer = Customer::find($customer);
    //     // if($customer){
    //     //     return view('customers.show', compact('customer'));
    //     // }
    //     // else{

    //     // }

    //     $customer = Customer::where('id', $customer)->firstOrFail();
    //     return view('customers.show', compact('customer'));
    // }
    
    /*
    |route-model binding; thi is fastest than the wy 
    |upper but the parameter should be named equal than in route
    */
    public function show(Customer $customer){
        return view('customers.show', compact('customer'));
    }


    public function store(Request $request){
        $this->authorize('create', Customer::class);
        // dd(request('Name'));
        // There are a lot of validation rules availible to use
        // $data = request()->validate([
        //     'Name' => 'required',
        //     'email' => 'required',
        //     'active' => 'required'
        // ]);

        // $customer = new Customer();
        // $customer->name = request('Name');
        // $customer->email = request('email');
        // $customer->active = request('active');

        // $customer->save();

    /*
    |SESION 13: Another Waty to do the work
    */

        // $data = $this->validate($request, [
        //     'Name' => 'required',
        //     'company_id' => 'required',
        //     'email' => 'required',
        //     'active' => 'required',
        // ]);

        /*
        |SESION 18: refactored into one line validate
        */

        
        $customer = Customer::create($this->validateRequest());

        $this->storeImage($customer);

        event(new NewCustomerHasRegisteredEvent($customer));

        // Mail::to($customer->email)->send(new WelcomeNewUserMail());
        // dump('registered to newsletter');


        return redirect('customers');
    }
    
    private function storeImage(Customer $customer){
        if(request()->has('image')){
            $customer->update([
                'image' => request()->image->store('uploads', 'public')
            ]);
        }

        $image = Image::make(public_path('storage/' .$customer->image))->fit(300, 300);
        $image->save();
    }

    /*
    | EDIT METHOD
    */
    public function edit(Customer $customer){
        $companies = Company::all();
       return view('customers.edit', compact('customer', 'companies'));

    }

    /*
    | UPDATE METHOD
    */
    public function update(Customer $customer, Request $request){

        $customer->update($this->validateRequest());
        $this->storeImage($customer);

        return redirect('customers');

    }

    public function destroy(Customer $customer){

    
        $customer->delete();

        return redirect('customers');

    }
}


