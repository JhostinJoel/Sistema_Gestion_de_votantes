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
                          <h1 class="box-title">Personas <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Id Persona</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Telefono</th>
                            <th>Escuela</th>
                            <th>Mesa</th>
                            <th>Lider</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Id Persona</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Telefono</th>
                            <th>Escuela</th>
                            <th>Mesa</th>
                            <th>Lider</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Id Persona *</label>
                            <input type="hidden" name="prvo_prvo" id="prvo_prvo">
                            <input type="text" class="form-control" name="prvo_id" id="prvo_id" maxlength="50" placeholder="Identificación de la persona" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Primer Nombre *</label>
                            <input type="text" class="form-control" name="prvo_pri_nombre" id="prvo_pri_nombre" maxlength="256" placeholder="Primer nombre de la persona" required>
                          </div>
                          <!--  -->
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Segundo Nombre *</label>
                            <input type="text" class="form-control" name="prvo_seg_nombre" id="prvo_seg_nombre" maxlength="50" placeholder="Segundo nombre de la persona" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Primer Apellido *</label>
                            <input type="text" class="form-control" name="prvo_pri_apellido" id="prvo_pri_apellido" maxlength="256" placeholder="Primer apellido de la persona" required>
                          </div>
                          <!--  -->
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Segundo Apellido *</label>
                            <input type="text" class="form-control" name="prvo_seg_apellido" id="prvo_seg_apellido" maxlength="50" placeholder="Segundo apellido" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Dirección *</label>
                            <input type="text" class="form-control" name="prvo_direccion" id="prvo_direccion" maxlength="256" placeholder="Dirección de la persona" required>
                          </div>
                          <!--  -->
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Escuela *</label>
                            <select id="prvo_escu" name="prvo_escu" class="form-control selectpicker" data-live-search="true" required></select>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Mesa *</label>
                            <input type="text" class="form-control" name="prvo_mesa" id="prvo_mesa" maxlength="256" placeholder="Mesa" required>
                          </div>
                          <!--  -->
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Lider *</label>
                            <select id="prvo_lide" name="prvo_lide" class="form-control selectpicker" data-live-search="true" required></select>
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
<script type="text/javascript" src="scripts/prediccionesvotos.js"></script>