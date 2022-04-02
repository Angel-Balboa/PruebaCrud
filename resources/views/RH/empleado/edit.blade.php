<form action="{{ url('/RH/empleado/'.$empleado->id) }}" method="post">
    @csrf
    {{method_field('PATCH')}}
    <label for="Nombre">Nombre Empleado</label>
    <input type="text" name="Nombre" id="Nombre" value="{{$empleado['Nombre']}}" disabled><br>

    <label for="Apellidos">Apellidos Empleado</label>
    <input type="text" name="Apellidos" id="Apellidos"  value="{{$empleado['Apellidos']}}" disabled><br>

    <label for="Puesto">Puesto</label>
    <select name="Puesto" id="Puesto">
        <option value="{{$empleado['Puesto']}}">{{$empleado['Puesto']}}</option>
        @foreach ($puestos as $puesto)
            @if ($puesto!=$empleado['Puesto'])
                <option value="{{$puesto}}">{{$puesto}}</option>
            @endif
        @endforeach
    </select><br>

    <?php $departamentos=['Administrativo','Recursos Humanos','Finanzas','Marketing','Desarrollo'];?>
    <label for="Departamento">Departamento</label>
    <select name="Departamento" id="Departamento">
        <option value="{{$empleado['Departamento']}}">{{$empleado['Departamento']}}</option>
        @foreach ($departamentos as $departamento)
            @if($departamento!=$empleado['Departamento'])
                <option value="{{$departamento}}">{{$departamento}}</option>
            @endif
        @endforeach
    </select><br>

    <label for="TipoContrato">Contrato: </label>
    <input type="text" name="TipoContrato" id="TipoContrato" value="{{$empleado['TipoContrato']}}"><br>

    <label for="Prestaciones">Prestaciones: </label>
    <input type="text" name="Prestaciones" id="Prestaciones" value="{{$empleado['Prestaciones']}}"><br>

    <label for="Salario">Salario</label>
    <input type="number" name="Salario" id="Salario"  value="{{$empleado['Salario']}}"><br>

    <input type="submit" value="Actualizar Empleado">