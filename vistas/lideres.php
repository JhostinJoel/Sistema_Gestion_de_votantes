<?php
require 'header.php';
?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Lideres <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Id</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>Celular</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Id</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>Celular</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Tipo Id Persona:</label>
                            <input type="hidden" name="lide_lide" id="lide_lide">
                            <input type="text" class="form-control" name="lide_tipo_id" id="lide_tipo_id" maxlength="50" placeholder="Tipo de Id de la persona" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Identificación Lider:</label>
                            <input type="text" class="form-control" name="lide_id" id="lide_id" maxlength="256" placeholder="Identificación de la persona">
                          </div>
                          <!--  -->
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Primer Nombre:</label>
                            <input type="text" class="form-control" name="lide_pri_nombre" id="lide_pri_nombre" maxlength="50" placeholder="Primer nombre de la persona" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Segundo Nombre:</label>
                            <input type="text" class="form-control" name="lide_seg_nombre" id="lide_seg_nombre" maxlength="50" placeholder="Segundo nombre de la persona" required>
                          </div>
                          <!--  -->
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Primer Apellido:</label>
                            <input type="text" class="form-control" name="lide_pri_apellido" id="lide_pri_apellido" maxlength="256" placeholder="Primer apellido de la persona">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Segundo Apellido:</label>
                            <input type="text" class="form-control" name="lide_seg_apellido" id="lide_seg_apellido" maxlength="50" placeholder="Segundo apellido de la persona" required>
                          </div>
                          <!--  -->
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Dirección:</label>
                            <input type="text" class="form-control" name="lide_direccion" id="lide_direccion" maxlength="256" placeholder="Dirección de la persona">
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Telefono:</label>
                            <input type="text" class="form-control" name="lide_telefono" id="lide_telefono" maxlength="50" placeholder="Telefono de la persona" required>
                          </div>
                          <!--  -->
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Celular:</label>
                            <input type="text" class="form-control" name="lide_celular" id="lide_celular" maxlength="256" placeholder="Celular de la persona">
                          </div>
                          <!--  -->
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
require 'footer.php';
?>
<script type="text/javascript" src="scripts/lideres.js"></script>