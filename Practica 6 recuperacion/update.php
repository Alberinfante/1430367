<?php
	if (isset($_GET['id'])){
		$id=intval($_GET['id']);
	} else {
		header("location:index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CRUD MAESTRO</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Editar <b>Maestro</b></h2></div>
                    <div class="col-sm-4">
                        <a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
				
				include_once ("database.php");
				$maestros= new DatabaseMaestro();
				
				if(isset($_POST) && !empty($_POST)){
					$nombres = $maestros->sanitize($_POST['nombres']);
					$apellidos = $maestros->sanitize($_POST['apellidos']);
					$correo_electronico = $maestros->sanitize($_POST['correo_electronico']);
					$carrera = $maestros->sanitize($_POST['carrera']);
					$id_maestro=intval($_POST['id_maestro']);
					$res = $maestros->updateMaestro($nombres, $apellidos, $correo_electronico, $carrera, $id_maestro);
					if($res){
						$message= "Datos actualizados con éxito";
						$class="alert alert-success";
						
					}else{
						$message="No se pudieron actualizar los datos";
						$class="alert alert-danger";
					}
					
					?>
				<div class="<?php echo $class?>">
				  <?php echo $message;?>
				</div>	
					<?php
				}
				$datos_maestro=$maestros->single_recordMaestro($id);
			?>
			<div class="row">
				<form method="post">
				<div class="col-md-6">
					<label>Nombres:</label>
					<input type="text" name="nombres" id="nombres" class='form-control' maxlength="100" required  value="<?php echo $datos_maestro->nombres;?>">
					<input type="hidden" name="id_maestro" id="id_maestro" class='form-control' maxlength="100"   value="<?php echo $datos_maestro->id;?>">
				</div>
				<div class="col-md-6">
					<label>Apellidos:</label>
					<input type="text" name="apellidos" id="apellidos" class='form-control' maxlength="100" required value="<?php echo $datos_maestro->apellidos;?>">
				</div>
				<div class="col-md-6">
					<label>E-mail:</label>
					<input type="email" name="correo_electronico" id="correo_electronico" class='form-control' maxlength="15" required value="<?php echo $datos_maestro->correo_electronico;?>">
				</div>
				<div class="col-md-6">
					<label>Carrera:</label>
					<input type="text" name="carrera" id="carrera" class='form-control' maxlength="64" required value="<?php echo $datos_maestro->carrera;?>">
				
				</div>
				
				<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success">Actualizar datos</button>
				</div>
				</form>
			</div>
        </div>



        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Editar <b>Alumno</b></h2></div>
                    <div class="col-sm-4">
                        <a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
				
				include_once ("database.php");
				$alumnos= new DatabaseAlumno();
				
				if(isset($_POST) && !empty($_POST)){
					$nombres = $alumnos->sanitize($_POST['nombres']);
					$apellidos = $alumnos->sanitize($_POST['apellidos']);
					$correo_electronico = $alumnos->sanitize($_POST['correo_electronico']);
					$carrera = $alumnos->sanitize($_POST['carrera']);
					$id_alumno=intval($_POST['id_alumno']);
					$res = $alumnos->updateAlumno($nombres, $apellidos, $correo_electronico, $carrera, $id_alumno);
					if($res){
						$message= "Datos actualizados con éxito";
						$class="alert alert-success";
						
					}else{
						$message="No se pudieron actualizar los datos";
						$class="alert alert-danger";
					}
					
					?>
				<div class="<?php echo $class?>">
				  <?php echo $message;?>
				</div>	
					<?php
				}
				$datos_alumno=$alumnos->single_recordAlumno($matricula);
			?>
			<div class="row">
				<form method="post">
				<div class="col-md-6">
					<label>Nombres:</label>
					<input type="text" name="nombres" id="nombres" class='form-control' maxlength="100" required  value="<?php echo $datos_alumno->nombres;?>">
					<input type="hidden" name="id_maestro" id="id_maestro" class='form-control' maxlength="100"   value="<?php echo $datos_alumno->id;?>">
				</div>
				<div class="col-md-6">
					<label>Apellidos:</label>
					<input type="text" name="apellidos" id="apellidos" class='form-control' maxlength="100" required value="<?php echo $datos_alumno->apellidos;?>">
				</div>
				<div class="col-md-6">
					<label>E-mail:</label>
					<input type="email" name="correo_electronico" id="correo_electronico" class='form-control' maxlength="15" required value="<?php echo $datos_alumno->correo_electronico;?>">
				</div>
				<div class="col-md-6">
					<label>Carrera:</label>
					<input type="text" name="carrera" id="carrera" class='form-control' maxlength="64" required value="<?php echo $datos_alumno->carrera;?>">
				
				</div>
				
				<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success">Actualizar datos</button>
				</div>
				</form>
			</div>
        </div>        
    </div>     
</body>
</html>                            