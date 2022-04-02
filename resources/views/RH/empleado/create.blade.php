Amongos
<form action="{{ url('/RH/empleado') }}" method="post">
    @csrf
    <label for="Nombre">Nombre Empleado</label>
    <input type="text" name="Nombre" id="Nombre"><br>

    <label for="Apellidos">Apellidos Empleado</label>
    <input type="text" name="Apellidos" id="Apellidos"><br>

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
    <input type="text" name="TipoContrato" id="TipoContrato"><br>

    <label for="Prestaciones">Prestaciones: </label>
    <input type="text" name="Prestaciones" id="Prestaciones"><br>

    <label for="Salario">Salario</label>
    <input type="number" name="Salario" id="Salario"><br>

    <input type="submit" value="Agregar Empleado">
</form>