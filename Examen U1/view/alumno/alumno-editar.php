<h1 class="page-header">
    <?php echo $alm->id != null ? $alm->nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Alumno">Alumnos</a></li>
  <li class="active"><?php echo $alm->id != null ? $alm->nombre : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-alumno" action="?c=Alumno&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $alm->id; ?>" />
    
    <div class="form-group">
        <label>Matricula</label>
        <input type="number" name="matricula" value="<?php echo $alm->matricula; ?>" class="form-control" placeholder="Ingrese su Matricula" required>
    </div>

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" value="<?php echo $alm->nombre; ?>" class="form-control" placeholder="Ingrese su nombre" required>
    </div>
    
    <div class="form-group">
        <label>Apellido</label>
        <input type="text" name="apellidos" value="<?php echo $alm->apellidos; ?>" class="form-control" placeholder="Ingrese su apellido" required>
    </div>
    
    <div class="form-group">
        <label>Carrera</label>
        <input type="text" name="carrera" value="<?php echo $alm->carrera; ?>" class="form-control" placeholder="Ingrese su carrera" required>
    </div>
    
    <div class="form-group">
        <label>Generación</label>
        <select name="ano_ingreso" class="form-control">
            <option <?php echo $alm->ano_ingreso == 1 ? 'selected' : ''; ?> value="1">01_19</option>
            <option <?php echo $alm->ano_ingreso == 2 ? 'selected' : ''; ?> value="2">02_19</option>
            <option <?php echo $alm->ano_ingreso == 3 ? 'selected' : ''; ?> value="3">03_19</option>
        </select>
    </div>
    
    <div class="form-group">
        <label>ID Grupo</label>
        <input type="text" name="id_grupo" value="<?php echo $alm->id_grupo; ?>" class="form-control" placeholder="Ingrese ID Grupo" required>
    </div>
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>