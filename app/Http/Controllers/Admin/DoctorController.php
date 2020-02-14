<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller; 
class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


   
    public function index()
    {

        $doctors= User::doctors()->paginate(10);   
        return view('doctors.index',compact('doctors'));
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
        $rules=[
         'name' => 'required|min:3',
         'email'=> 'required|email',
         'dni'=> 'nullable|digits:8',
         'direccion'=> 'nullable|min:5',
         'telefono'=> 'nullable|min:6'

        ];
        $this->validate($request,$rules);

        User::create(
            $request->only('name','email','dni','direccion','telefono')
            + [ 

              'role' => 'doctor' ,
              'password' => bcrypt($request->input('password')) 
            ]
        );

          $notification= 'El médico se creo correctamente.';
        return redirect('/doctors')->with(compact('notification'));  
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

       $doctor= User::doctors()->findOrFail($id);
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

         $rules=[
         'name' => 'required|min:3',
         'email'=> 'required|email',
         'dni'=> 'nullable|digits:8',
         'direccion'=> 'nullable|min:5',
         'telefono'=> 'nullable|min:6'

        ];
        $this->validate($request,$rules);
          
        $doctor= User::doctors()->findOrFail($id);  
        $data=  $request->only('name','email','dni','direccion','telefono');
        $password = $request->input('password');
        if($password){
           $data['password'] = bcrypt($password);
        }  
        $doctor->fill($data);
        $doctor->save();

          $notification= 'La información del médico se actualizo correctamente.';
        return redirect('/doctors')->with(compact('notification'));  
        
    }

   
    public function destroy(User $doctor)
    {

        $doctorName = $doctor->name;
        $doctor->delete();
        $notification= 'El médico '.$doctorName.' ha sido eliminado correctamente.';
        return redirect('/doctors')->with(compact('notification')); 
    }
}
