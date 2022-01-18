<h1 class="page-header">Planilla de Trabajadores</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Trabajador&a=Crud">Nuevo trabajador</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombres</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Tipo Doc</th>
            <th>N° Doc</th>
            <th>Sexo</th>
            <th>Nacimiento</th>
            <th>Departamento</th>
            <th>Provincia</th>
            <th>Distrito</th>
            <th>Dirección</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->nombre; ?></td>
            <td><?php echo $r->apellido_p; ?></td>
            <td><?php echo $r->apellido_m; ?></td>
            <td>
                <?php 
                    if($r->tipo_doc == 1){
                        echo 'DNI';
                    }else if($r->tipo_doc == 2){
                        echo 'Pasaporte';
                    }else{
                        echo 'RUC';
                    }
                ?>
            </td>
            <td><?php echo $r->num_doc; ?></td>
            <td>
                <?php 
                    if($r->sexo == 1){
                        echo 'Femenino';
                    }else if($r->sexo == 2){
                        echo 'Masculino';
                    }else{
                        echo 'Prefiero no decir';
                    }
                ?>
            </td>
            <td><?php echo $r->fecha_nacimiento; ?></td>
            <td><?php echo $r->nombre_departamento; ?></td>
            <td><?php echo $r->nombre_provincia; ?></td>
            <td><?php echo $r->nombre_distrito; ?></td>
            <td><?php echo $r->direccion; ?></td>
            <td>
                <a href="?c=Trabajador&a=Crud&id=<?php echo $r->id_trabajador; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro que quiere eliminar este registro?');" href="?c=Trabajador&a=Eliminar&id=<?php echo $r->id_trabajador; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
