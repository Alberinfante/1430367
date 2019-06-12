<h1 class="page-header">
    <?php echo $grp->id != null ? $grp->cuatrimestre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Grupo">Alumnos</a></li>
  <li class="active"><?php echo $grp->id != null ? $grp->cuatrimestre : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-grupo" action="?c=Grupo&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $grp->id; ?>" />
    
    <div class="form-group">
        <label>Cuatrimestre</label>
        <select name="cuatrimestre" class="form-control">
            <option <?php echo $grp->cuatrimestre == 1 ? 'selected' : ''; ?> value="1">01_19</option>
            <option <?php echo $grp->cuatrimestre == 2 ? 'selected' : ''; ?> value="2">02_19</option>
            <option <?php echo $grp->cuatrimestre == 3 ? 'selected' : ''; ?> value="3">03_19</option>
        </select>
    </div>
    
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" value="<?php echo $grp->nombre; ?>" class="form-control" placeholder="Ingrese nombre" required>
    </div>
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-grupo").submit(function(){
            return $(this).validate();
        });
    })
</script>