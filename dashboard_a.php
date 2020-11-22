<?php 
  session_start();
  if($_SESSION['login']!='login') header('Location: login.php');
  include 'koneksi.php';  // include = menambahkan/mengikutkan file, setting koneksi ke database
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
  
  <!-- DATA TABLES -->
    <link href="css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <link href="css/dataTables.tableTools.min.css" rel="stylesheet" type="text/css" />

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Genta ESP Admin</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><?php echo "Hello, ".ucwords($_SESSION['user']);?></a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
          
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
          <?php if($_SESSION['level']=='admin'){?>
             
            <li class="active"><a href="denom_kertas.php">Denom Kertas</a></li>
            <li><a href="dashboard_a.php">Denom Koin</a></li>
            <li><a href="">Keuangan</a></li>
            <?php } ?>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard <?php echo ucfirst($_SESSION['level']);?></h1>
      <div class="row">
        <div class="col-lg-12">
            <button class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#exampleModal" style="font-weight: bold;">Tambah</button>
        </div> 
      </div>
      <br>
          <div>
            <table class="table table-bordered table-striped dataTable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Denom</th>
                  <th>Rp1</th>
                  <th>Rp2</th>
                  <th>Rp3</th>
                  <th>Rp4</th>
                  <th>Rp5</th>
                  <th>Rp6</th>
                  <th>Inpak</th>
                  <th style="text-align: center;">Action</th>
                </tr>
              </thead>
              <?php 
                $results = $mysqli->query('SELECT * FROM denom_kertas');
                 if ($results->num_rows > 0) {
                  $no = 1;
                  while ($row = $results->fetch_assoc()) {
              ?>
              <tbody>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?=$row['denom_kertas']?></td>
                  <td><?=$row['rp1']?></td>
                  <td><?=$row['rp2']?></td>
                  <td><?=$row['rp3']?></td>
                  <td><?=$row['rp4']?></td>
                  <td><?=$row['rp5']?></td>
                  <td><?=$row['rp6']?></td>
                  <td><?=$row['inpak']?></td>
                  <td class="d-flex">
                    <a class="btn btn-sm btn-success" href="edit.php">Edit</a>
                    <form action="denom_kertas_process/process_delete_kertas.php" method="GET">
                      <input type="hidden" name="id_denom_kertas" value="<?= $row['id_denom_kertas'] ?>">
                      <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
              </tbody>
              <?php 
                }
              }
              ?>
            </table>
            <br/><br/>
          </div>
         </div>
        </div>
      </div>
    </div>

    <!-- Modal Add -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
            <form action="denom_kertas_process/process_denom_kertas.php" method="POST">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Denom</label>
                    <input type="number" name="denom_kertas" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Rp1</label>
                    <input type="number" name="rp1" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Rp3</label>
                    <input type="number" name="rp3" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Rp5</label>
                    <input type="number" name="rp5" class="form-control">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Inpak</label>
                    <input type="number" name="inpak" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Rp2</label>
                    <input type="number" name="rp2" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Rp4</label>
                    <input type="number" name="rp4" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Rp6</label>
                    <input type="number" name="rp6" class="form-control">
                  </div>
                </div>
              </div>
              <div>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  <!-- DATA TABES SCRIPT -->
    <script src="js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="js/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="js/dataTables.tableTools.min.js" type="text/javascript"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="js/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>

    <!-- <script type="text/javascript">
      $(document).on('click', '#id_denom', function() {
        var id_denom_kertas = $(this).data('id_denom_kertas');
        var denom_kertas = $(this).data('denom_kertas');
        var inpak = $(this).data('inpak');
        var rp1 = $(this).data('rp1');
        var rp2 = $(this).data('rp2');
        var rp3 = $(this).data('rp3');
        var rp4 = $(this).data('rp4');
        var rp5 = $(this).data('rp5');
        var rp6 = $(this).data('rp6');

        $('#id_denom_kertas').val(id_denom_kertas);
        $('#denom_kertas').val(denom_kertas)
        $('#inpak').val(inpak)
        $('#rp1').val(rp1)
        $('#rp2').val(rp2)
        $('#rp3').val(rp3)
        $('#rp4').val(rp4)
        $('#rp5').val(rp5)
        $('#rp6').val(rp6)

        $('#modal_edit').modal('show');
      });

      $('#update_data').on('click', function(e) {
        e.preventDefault();
        var form_data = {
          id_denom_kertas: $('#id_denom_kertas').val(),
          denom_kertas: $('#denom_kertas').val(),
          rp1: $('#rp1').val(),
          rp2: $('#rp2').val(),
          rp3: $('#rp3').val(),
          rp4: $('#rp4').val(),
          rp5: $('#rp5').val(),
          rp6: $('#rp6').val(),
          inpak: $('#inpak').val(),
        }
        var type = "POST";
        var id_denom_kertas = $('#id_denom_kertas').val();
        var dataType = 'JSON';

      })
    </script> -->
  </body>
</html>
