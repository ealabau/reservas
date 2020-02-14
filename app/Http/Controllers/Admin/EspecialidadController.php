<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Especialidad;
use App\Http\Controllers\Controller;
class EspecialidadController extends Controller
{
    //

   

    private function performValidation(Request $request)
    {

    	  $rules = [
 			'name' => 'required|min:3'
        ];
        
        $messages = [
            'name.min' =>  'El nombre de la especialidad tiene que tener como mínimo 3 caracteres.',
            'name.required'=> 'El nombre de la especialidad es obligatorio.'
        ];

    	$this->validate($request, $rules, $messages);
       
    }       

    public function index()
    {
        $especialidades= Especialidad::all();  
    	return view('especialidades.index',compact('especialidades'));	
    }


    public function create()
    {

    	return view('especialidades.create');	
    }

    public function edit(Especialidad $especialidad)
    {

        
    	return view('especialidades.edit', compact('especialidad'));	
    }

    public function update(Request $request, Especialidad $especialidad)
    {

    	 //dd($request->all());
      
       $this->performValidation($request);

        $especialidad->nombre = $request->input('name');
        $especialidad->descripcion = $request->input('description');
        $especialidad->save();
         $notification= 'La especialidad se ha actualizado correctamente.';
    	return redirect('/especialidades')->with(compact('notification'));;	
    	
    }


   public function store(Request $request)
    {

        //dd($request->all());
        $this->performValidation($request);

        $especialidad= new Especialidad();
        $especialidad->nombre = $request->input('name');
        $especialidad->descripcion = $request->input('description');
        $especialidad->save();

        $notification= 'La especialidad se ha registrado correctamente.';
    	return redirect('/especialidades')->with(compact('notification'));	
    }

     public function destroy(Especialidad $especialidad)
    {

    	
        $especialidad->delete();
      
         $notification= 'La especialidad '.$especialidad->nombre.' se ha eliminado correctamente.';
    	return redirect('/especialidades')->with(compact('notification'));	
    	
    }



}
