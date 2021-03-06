<H2>AGREGAR EMPLEADO:</H2>

@if (count($errors)>0)
    @foreach ($errors->all() as $error)
        {{$error}}
        <br>
    @endforeach
@endif

<form action="{{ url('/RH/empleado') }}" method="post">
    @csrf
    <label for="Nombre">Nombre Empleado</label>
    <input type="text" name="Nombre" id="Nombre" value="{{old('Nombre')}}"><br>

    <label for="Apellidos">Apellidos Empleado</label>
    <input type="text" name="Apellidos" id="Apellidos" value="{{old('Apellidos')}}"><br>

    <label for="Puesto">Puesto</label>
    <select name="Puesto" id="Puesto">
        @foreach ($puestos as $puesto)
            <option value="{{$puesto}}">{{$puesto}}</option>
        @endforeach
    </select><br>
    <label for="Departamento">Departamento</label>
    <select name="Departamento" id="Departamento">
        @foreach ($departamentos as $departamento)
            <option value="{{$departamento}}">{{$departamento}}</option>
        @endforeach
    </select>
    <br>
    <label for="TipoContrato">Contrato: </label>
    <input type="text" name="TipoContrato" id="TipoContrato" value="{{old('TipoContrato')}}"><br>

    <label for="Prestaciones">Prestaciones: </label><br>
    <label for="Vacaciones">Vacaciones</label><input type="checkbox" name="Prestaciones[]" id="Vacaciones" value="Vacaciones" 
    @if(in_array('Vacaciones',old('Prestaciones',[])))
    checked
    @endif> <br>
    <label for="Seguro">Seguro</label><input type="checkbox" name="Prestaciones[]" id="Seguro" value="Seguro" 
    @if(in_array('Seguro',old('Prestaciones',[])))
    checked
    @endif><br>
    <label for="Prestamos">Prestamos</label><input type="checkbox" name="Prestaciones[]" id="Prestamos" value="Prestamos"
    @if(in_array('Prestamos',old('Prestaciones',[])))
    checked
    @endif><br>
    <label for="Bonificacion">Bonificacion</label><input type="checkbox" name="Prestaciones[]" id="Bonificacion" value="Bonificacion"
    @if(in_array('Bonificacion',old('Prestaciones',[])))
    checked
    @endif><br>

    <label for="Salario">Salario</label>
    <input type="number" name="Salario" id="Salario" value="{{old('Salario')}}"><br>

    <input type="submit" value="Agregar Empleado">
</form>