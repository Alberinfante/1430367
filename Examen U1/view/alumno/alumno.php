<h1 class="page-header">Alumnos / Grupos / Generaciones</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Alumno&a=Crud">Nuevo alumno</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Matricula</th>
            <th style="width:180px;">Nombre(s)</th>
            <th>Apellidos</th>
            <th>Carrera</th>
            <th style="width:120px;">Generación</th>
            <th style="width:120px;">ID del grupo</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->matricula; ?></td>
            <td><?php echo $r->nombre; ?></td>
            <td><?php echo $r->apellidos; ?></td>
            <td><?php echo $r->carrera; ?></td>
            <td><?php echo $r->ano_ingreso == 1 ? '01_19' : '02_19'; ?></td>
            <td><?php echo $r->id_grupo; ?></td>
            <td>
                <a href="?c=Alumno&a=Crud&id=<?php echo $r->id; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Alumno&a=Eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 

