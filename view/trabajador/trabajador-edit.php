<h1 class="page-header">
    <?php echo $tra->id_trabajador != null ? $tra->nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Trabajador">Trabajadores</a></li>
  <li class="active"><?php echo $tra->id_trabajador != null ? $tra->nombre : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-planilla" action="?c=Trabajador&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" id="id_trabajador" value="<?php echo $tra->id_trabajador; ?>" />
    
    <div class="form-group">
        <label>Nombres</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $tra->nombre; ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Apellido Paterno</label>
        <input type="text" name="ap_paterno" id="ap_paterno" value="<?php echo $tra->apellido_p; ?>" class="form-control" placeholder="Ingrese su apellido paterno" data-validacion-tipo="requerido|min:3" />
    </div>

    <div class="form-group">
        <label>Apellido Materno</label>
        <input type="text" name="ap_materno" id="ap_materno" value="<?php echo $tra->apellido_m; ?>" class="form-control" placeholder="Ingrese su apellido materno" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Tipo de Documento</label>
        <select name="tipoDoc" id="tipoDoc" class="form-control">
            <option value="">Seleccione Tipo Documento</option>
            <option <?php echo $tra->tipo_doc == 1 ? 'selected' : ''; ?> value="1">DNI</option>
            <option <?php echo $tra->tipo_doc == 2 ? 'selected' : ''; ?> value="2">Pasaporte</option>
            <option <?php echo $tra->tipo_doc == 3 ? 'selected' : ''; ?> value="3">RUC</option>
        </select>
    </div>
    <!-- falta validaar -->
    <div class="form-group"> 
        <label>Número de Documento</label>
        <input type="text" name="num_doc" id="num_doc" value="<?php echo $tra->num_doc; ?>" class="form-control" onkeypress="return onlyNumberKey(event)" placeholder="Ingrese su Número de Documento" />
    </div>
    
    <div class="form-group">
        <label>Sexo</label>
        <select name="sexo" id="sexo" class="form-control">
            <option <?php echo $tra->sexo == 1 ? 'selected' : ''; ?> value="1">Femenino</option>
            <option <?php echo $tra->sexo == 2 ? 'selected' : ''; ?> value="2">Masculino</option>
            <option <?php echo $tra->sexo == 3 ? 'selected' : ''; ?> value="3">Prefiero No Decir</option>
        </select>
    </div>
    <div class="form-group">
        <label id="label_fecha">Fecha de nacimiento</label>
        <input type="date" name="fecha_nac" id="fecha_nac" value="<?php echo $tra->fecha_nacimiento; ?>" class="form-control" placeholder="Ingrese su fecha de nacimiento" data-validacion-tipo="requerido" />
    </div>
    <div id="div_fecha"></div>
    <br>

    <div class="form-group">
        <label>Departamento</label>
        <select name="departamento" id="departamento" class="form-control">
            <option >
            <?php
                $pdo = Database::connect();
                $sql = 'SELECT * FROM departamentos';
                $opcionesDpto = '';

                foreach ($pdo->query($sql) as $row) {
                    $opcionesDpto.='<option value="'.$row["id_departamento"].'">'. $row["nombre_departamento"] . '</option>';
                }

                echo $opcionesDpto;
            ?>
            </option>
        </select>
    </div>

    <div class="form-group">
        <label>Provincia</label>
        <select name="provincia" id="provincia" class="form-control">
        </select>
    </div>

    <div class="form-group">
        <label>Distrito</label>
        <select name="distrito" id="distrito" class="form-control">
        </select>
    </div>

    <div class="form-group">
        <label>Dirección</label>
        <input type="text" name="direccion" id="direccion" value="<?php echo $tra->direccion; ?>" class="form-control" placeholder="Ingrese su dirección" data-validacion-tipo="requerido|min:10" />
    </div>
    
    <hr />
    
    <div class="text-center">
        <button class="btn btn-success btn-block">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-planilla").submit(function(){
            return $(this).validate();
        });

        $("#departamento").change(function(){
        var id_dpto= $("#departamento").val();
            $.ajax({
                data:   "id_dpto=" + id_dpto,
                url:   'view/trabajador/ajax_provincias.php',
                type:  'post',
                success: function (response){
                    $("#provincia").html(response);
                }
            });
        });

        $("#provincia").change(function(){
        var id_provincia= $("#provincia").val();
            $.ajax({
                data:   "id_provincia=" + id_provincia,
                url:   'view/trabajador/ajax_provincias.php',
                type:  'post',
                success: function (response){
                    $("#distrito").html(response);
                }
            });
        });

        $("#tipoDoc").change(function(){
            var id_tipoDoc = $("#tipoDoc").val();
            
            if(id_tipoDoc == 1){
                $('#num_doc').attr('maxlength', 8);
            }else if(id_tipoDoc == 2){
                $('#num_doc').attr('maxlength', 12);
            }else if(id_tipoDoc == 3){
                $('#num_doc').attr('maxlength', 11);
            }
        });
    })

    function onlyNumberKey(evt) {
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
      }

    $(document).ready(function(){
        $("#fecha_nac").change(function(){
            var fecha= $("#fecha_nac").val();
            $.ajax({
                data:   "fecha=" + fecha,
                url:   'view/trabajador/ajax_provincias.php',
                type:  'post',
                success: function (response){
                    $("#div_fecha").html(response);
                }
            });
        });
    })
    
</script>