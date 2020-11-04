<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Propaganistas\LaravelPhone\PhoneNumber;

class DetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['first','second','all','index']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('all');
    }

    public function all()
    {
        return User::latest()->get();
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
        //'email' => ['required','email', 'unique:users' ],
    }

    public function first(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required','email' ],
            'phone'=> ['required'],
        ]);
        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;

        $new = PhoneNumber::make($phone, 'ZA')->formatForCountry('ZA');
 
        $user = User::query()->where('email',$email)->first();
        
        if(empty($user)){
            $person = new User();
            $person->name = $request->name;
            $person->email = $request->email;
            $person->phone = $new;
            $person->dob = $request->dob;
            $person->gender = $request->gender;
            $person->save();
            return response('Created',201);

        }else{

            $user = User::query()->where('email',$email)->first();
            $user->dob = $request->dob;
            $user->gender = $request->gender;
            $user->save();
            return response('Updated',202);
        }


    }

    public function second(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone'=>'required',
        ]);

        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;

        $new = PhoneNumber::make($phone, 'ZA')->formatForCountry('ZA');
 
        $user = User::query()->where('email',$email)->first();
        
        if(empty($user)){
            $person = new User();
            $person->name = $request->name;
            $person->email = $request->email;
            $person->phone = $new;
            $person->car = $request->car;
            $person->colour = $request->colour;
            $person->save();
            return response('Created',201);

        }else{

            $user = User::query()->where('email',$email)->first();
            $user->car = $request->car;
            $user->colour = $request->colour;
            $user->save();
            return response('Updated',202);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
