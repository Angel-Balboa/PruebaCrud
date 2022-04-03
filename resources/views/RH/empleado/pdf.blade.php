<!DOCTYPE html>
<html>
   <head>
      <title>PDF</title>
   </head>
   <body>
      <header>
         <h1>FOSTER INTELLIGENCE</h1>
      </header>
      <main>
          <label><h3>Nombre del Empleado: <?php echo $empleado['Nombre'];?></label> <?php echo $empleado['Apellidos'];?></h3>
          <label><h3>Trabaja en el departamento de  <?php echo $empleado['Departamento'];?></label></h3>
          <label><h3>Cuyo puesto es de <?php echo $empleado['Puesto'];?></label></h3>
          <label><h3>El tipo de contrato con el que cuenta es <?php echo $empleado['TipoContrato'];?></label></h3>
          <label><h3>Las prestaciones del empleado son las siguientes: </h3> 
          <?php $prestaciones=explode(',',$empleado['Prestaciones']);?>
          @foreach ($prestaciones as $prestacion)
              <?php echo $prestacion;?><br>
           @endforeach
            </label>
          <label><h3>El cual cuenta con un salario de $<?php echo $empleado['Salario'];?> al mes.</label></h3>     
    </main>
      <footer>
      </footer>
   </body>
</html>