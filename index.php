<?php
$url = "https://www6.tce.ma.gov.br/tce_api/contratos/documentos?enteId=2110609&exercicio=2018"; 
$ch = curl_init($url); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
$licitacoes = json_decode(curl_exec($ch));
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Licitações</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>
<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Start Bootstrap</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Buscar por..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="/licitacoesjson">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Licitações</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Painel</a>
          </li>
          <li class="breadcrumb-item active">Licitações</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Licitçoes 2018</div>
          <div class="card-body">
			<div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Exercício</th>
                    <th>Data Assinatura</th>
                    <th>Nº Contrato</th>
                    <th>Objeto</th>
                    <th>Valor Contrato</th>
                    <th>Nº Licitação</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Exercício</th>
                    <th>Data Assinatura</th>
                    <th>Nº Contrato</th>
                    <th>Objeto</th>
                    <th>Valor Contrato</th>
                    <th>Nº Licitação</th>
                  </tr>
                </tfoot>
                <?php
                if(count($licitacoes->contratoId)) {
                $i = 0;
                foreach($licitacoes->contratoId as $Licitacao) {
                $i++;
                ?>
                <?php if($i % 3 == 1) { ?>
                <tbody>
                <?php } ?>
                  <tr>
                    <td><?=$Licitacao->exercicio?></td>                    
                    <td><?=$Licitacao->dataAssinatura?></td>
                    <td><?=$Licitacao->numeroContrato?></td>
                    <td><?=$Licitacao->objeto?></td>
					<?php
						$valorcontrato = $Licitacao->valorContrato;
					?>
					
                    <td width="10%"><? echo 'R$ ' . number_format($valorcontrato, 2, ',', '.'); ?></td>
                    <td><?=$Licitacao->licitacaoId?></td>
                  </tr>
                <?php if($i % 3 == 0) { ?>                 
                </tbody>
                <?php } } } else { ?>
                  <strong>Nenhuma Licitação encontrada</strong>
                <?php } ?>

              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

        <p class="small text-center text-muted my-5">
          <em>More table examples coming soon...</em>
        </p>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>