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
                          <h1 class="box-title">Consulta Votantes por Lider y Escuela</h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="VotantesLiderEscu">
                        <div class="form-inline col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Lideres</label>
                          <select name="lide_lide" id="lide_lide" class="form-control selectpicker" data-live-search="true" required>                         	
                          </select>                          
                        </div>
                        <div class="form-inline col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Escuelas</label>
                          <select name="escu_escu" id="escu_escu" class="form-control selectpicker" data-live-search="true" required>                         	
                          </select>                          
                          <button class="btn btn-success" onclick="listar()">Mostrar</button>
                        </div>
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Tipo Identificaciòn</th>
                            <th>Identificaciòn</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Telefono</th>
                            <th>Direcciòn</th>
                            <th>Escuela</th>
                            <th>Mesa</th>
                            <th>Lider</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                          <th>Tipo Identificaciòn</th>
                            <th>Identificaciòn</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Telefono</th>
                            <th>Direcciòn</th>
                            <th>Escuela</th>
                            <th>Mesa</th>
                            <th>Lider</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
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
<script type="text/javascript" src="scripts/consultas.js"></script>


