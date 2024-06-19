<?php
//Activamos el almacenamiento en el buffer
require 'header.php';

  require_once "../modelos/Consultas.php";
  $consulta = new Consultas();

  //Datos para mostrar el gráfico de barras de las ventas
  $Lider10 = $consulta->TopLideres();
  $Lide_lide ='';
  $Total_lider='';
  while ($regLide_lide= $Lider10->fetch_object()) {
    $Lide_lide=$Lide_lide.'"'.$regLide_lide-> Lide_lide .'",';
    $Total_lider=$Total_lider.$regLide_lide-> Total_lide .','; 
  }
  //Quitamos la última coma
  $Lide_lide=substr($Lide_lide, 0, -1);
  $Total_lider=substr($Total_lider, 0, -1);
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
                          <h1 class="box-title">Reportes</h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="small-box bg-aqua">
                              <div class="inner">
                                <h4 style="font-size:17px;">
                                  <strong>Top 10 Lideres/ <?php echo $Total_lider ?></strong>
                                </h4>
                                <p>Lideres</p>
                              </div>
                              <div class="icon">
                                <i class="ion ion-bag"></i>
                              </div>
                              <a href="" class="small-box-footer">Lideres <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <div class="box box-primary">
                            <div class="box-header with-border">
                                Top Lideres
                            </div>
                            <div class="box-body">
                              <canvas id="TopLideres" width="100%" height="100%"></canvas>
                            </div>
                          </div>
                        </div>
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
<script src="../public/js/chart.min.js"></script>
<script src="../public/js/Chart.bundle.min.js"></script>
<script type="text/javascript">
var ctx = document.getElementById("TopLideres").getContext('2d');
var compras = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php echo $Lide_lide; ?>],
        datasets: [{
            label: '# TopLideres 10 días',
            data: [<?php echo $Total_lider; ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

</script>
</script> 
<?php 

?>