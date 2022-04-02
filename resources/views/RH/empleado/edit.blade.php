<h2>EDITAR EMPLEADO: </h2>
@if (count($errors)>0)
    @foreach ($errors->all() as $error)
        {{$error}}
        <br>
    @endforeach
@endif
<form action="{{ url('/RH/empleado/'.$empleado->id) }}" method="post">
    @csrf
    {{method_field('PATCH')}}
    <label for="Nombre">Nombre Empleado</label>
    <input type="text" name="Nombre" id="Nombre" value="{{$empleado['Nombre']}}" readonly><br>

    <label for="Apellidos">Apellidos Empleado</label>
    <input type="text" name="Apellidos" id="Apellidos"  value="{{$empleado['Apellidos']}}" readonly><br>

    <label for="Puesto">Puesto</label>
    <select name="Puesto" id="Puesto">
        @foreach ($puestos as $puesto)
            @if ($puesto!=$empleado['Puesto'])
                <option value="{{$puesto}}">{{$puesto}}</option>
            @else
            <option value="{{$puesto}}" selected>{{$puesto}}</option>
            @endif
        @endforeach
    </select><br>

    <?php $departamentos=['Administrativo','Recursos Humanos','Finanzas','Marketing','Desarrollo'];?>
    <label for="Departamento">Departamento</label>
    <select name="Departamento" id="Departamento" value="{{$empleado['Departamento']}}">
        @foreach ($departamentos as $departamento)
            @if($departamento!=$empleado['Departamento'])
                <option value="{{$departamento}}">{{$departamento}}</option>
            @else
                <option value="{{$departamento}}" selected>{{$departamento}}</option>
            @endif
        @endforeach
    </select><br>

    <label for="TipoContrato">Contrato: </label>
    <input type="text" name="TipoContrato" id="TipoContrato" value="{{$empleado['TipoContrato']}}"><br>

    <?php $prestacion=$empleado['Prestaciones'];
    $prestacion=explode(",",$prestacion);?>

    <label for="Prestaciones">Prestaciones: </label><br>
    <label for="Vacaciones">Vacaciones</label><input type="checkbox" name="Prestaciones[]" id="Vacaciones" value="Vacaciones"
    @if(in_array('Vacaciones',$prestacion))
    checked
    @endif> <br>
    <label for="Seguro">Seguro</label><input type="checkbox" name="Prestaciones[]" id="Seguro" value="Seguro" 
    @if(in_array('Seguro',$prestacion))
    checked
    @endif><br>
    <label for="Prestamos">Prestamos</label><input type="checkbox" name="Prestaciones[]" id="Prestamos" value="Prestamos"
    @if(in_array('Prestamos',$prestacion))
    checked
    @endif><br>
    <label for="Bonificacion">Bonificacion</label><input type="checkbox" name="Prestaciones[]" id="Bonificacion" value="Bonificacion"
    @if(in_array('Bonificacion',$prestacion))
    checked
    @endif><br>

    <label for="Salario">Salario</label>
    <input type="number" name="Salario" id="Salario"  value="{{$empleado['Salario']}}"><br>

    <input type="submit" value="Actualizar Empleado" onclick="return confirm('¿Los datos son correctos?')">
</form>