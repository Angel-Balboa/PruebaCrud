<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Puesto</th>
            <th>Departamento</th>
            <th>Tipo de Contrato</th>
            <th>Prestaciones</th>
            <th>Salario</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <body>
        @foreach  ($empleados as $empleado)
        <tr>
            <th>{{$empleado->Nombre}}</th>
            <th>{{$empleado->Apellidos}}</th>
            <th>{{$empleado->Puesto}}</th>
            <th>{{$empleado->Departamento}}</th>
            <th>{{$empleado->TipoContrato}}</th>
            <th>{{$empleado->Prestaciones}}</th>
            <th>{{$empleado->Salario}}</th>
            <th>
                <a href="{{ url('/RH/empleado/'.$empleado->id.'/edit') }}">EDITAR EMPLEADO</a> | 
                <form action="{{ url('/RH/empleado/'.$empleado->id) }}" method="post">
                    @csrf
                    {{method_field('DELETE')}}
                    <input type="submit" value="Eliminar" onclick="return confirm('¿Está seguro en eliminar el registro?')">
                </form></th>
                |

        </tr>
        @endforeach
    </body>
</table>