<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use PDF;

class EmpleadoController extends Controller
{
    public function pdf($id)
    {
        //
        $empleado=Empleado::findOrFail($id);
        $pdf=PDF::loadView('RH/empleado.pdf',['empleado'=>$empleado]);
        return $pdf->download($empleado['Nombre'].'.pdf');
        //return view('RH/empleado.pdf',compact('empleado'));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['empleados']=Empleado::paginate();
        return view('RH/empleado.index',$datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $puestos=array();
        $puestos['puestos']=['Asesor legal y organizacional','Administrador','Analista','Diseñador UI/UX','Programador','Documentador','Analista financiero','Jefe de presupuestos','Publicista','Ventas'];
        $departamentos=array();
        $departamentos['departamentos']=['Administrativo','Recursos Humanos','Finanzas','Marketing','Desarrollo'];
        return view('RH/empleado.create',$puestos,$departamentos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosEmpleado=request()->except('_token','Prestaciones','Salario');
        $prestacion=implode(',',$request->Prestaciones);
        $P["Prestaciones"]=$prestacion;
        $Salario=$request->Salario;
        $S["Salario"]=$Salario;
        $emp=$datosEmpleado+$P+$S;
        $validaciones=['Nombre'=>'required|string|max:100',
            'Apellidos'=>'required|string|max:100',
            'Puesto'=>'required|string|max:100',
            'Departamento'=>'required|string|max:100',
            'TipoContrato'=>'required|string|max:100',
            'Prestaciones'=>'required|max:100',
            'Salario'=>'required|int',];
        $mensaje=['required'=>'El :attribute es requerido.',
            'Apellidos.required'=>'Los apellidos son requeridos',
            'Prestaciones.required'=>'Las prestaciones son requeridas',];
        $this->validate($request,$validaciones,$mensaje);
        Empleado::insert($emp);

        return redirect('RH/empleado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $puestos['puestos']=['Asesor legal y organizacional','Administrador','Analista','Diseñador UI/UX','Programador','Documentador','Analista financiero','Jefe de presupuestos','Publicista','Ventas'];
        $empleado=Empleado::findOrFail($id);
        return view('RH/empleado.edit',compact('empleado'),$puestos);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosEmpleado=request()->except('_token','Prestaciones','Salario','_method');
        $prestacion=implode(',',$request->Prestaciones);
        $P["Prestaciones"]=$prestacion;
        $Salario=$request->Salario;
        $S["Salario"]=$Salario;
        $emp=$datosEmpleado+$P+$S;
        $validaciones=['Nombre'=>'required|string|max:100',
            'Apellidos'=>'required|string|max:100',
            'Puesto'=>'required|string|max:100',
            'Departamento'=>'required|string|max:100',
            'TipoContrato'=>'required|string|max:100',
            'Prestaciones'=>'required|max:100',
            'Salario'=>'required|int',];
        $mensaje=['required'=>'El :attribute es requerido.',
            'Apellidos.required'=>'Los apellidos son requeridos',
            'Prestaciones.required'=>'Las prestaciones son requeridas',];
        $this->validate($request,$validaciones,$mensaje);
        Empleado::where('id','=',$id)->update($emp);
        $datos['empleados']=Empleado::paginate();
        return redirect('RH/empleado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Empleado::destroy($id);
        return redirect('RH/empleado');
    }
}
