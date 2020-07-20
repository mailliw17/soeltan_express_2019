<?php 
session_start();
require 'fungsiad.php';
$conn = mysqli_connect("localhost", "root", "", "soeltanExpress");

$miniadmin = query("SELECT * FROM mini_admin");
$admin = query("SELECT * FROM admin");
$wkwkw = $_SESSION["ejek"];
$haha = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$wkwkw'");
$maha = mysqli_fetch_assoc($haha);

$pasrah = $maha["no_ktp"];

//apakah tomnol submit dah dipencet blom
if(isset($_POST["submit"])){

  if(tambahmini($_POST) > 0)
  {
    echo "
      <script>
        alert('data berhasil ditambah');
        document.location.href = 'miniadmin.php';
      </script>
    ";
  }
  else{
    echo "
      <script>
        alert('data tidak berhasil ditambahkan ');
        document.location.href = 'miniadmin.php';
      </script>
    ";
  }
}


if(isset($_POST["submitlol"])){

  if(ubahmini($_POST) > 0)
  {
    echo "
      <script>
        alert('data berhasil diubah');
        document.location.href = 'miniadmin.php';
      </script>
    ";
  }
  else{
    echo "
      <script>
        alert('data gagal diubah ');
              document.location.href = 'miniadmin.php';
      </script>
    ";
  }
}

if(!isset($_SESSION["login"])){
  echo "
      <script>
        alert('maaf anda harus login terlebih dahulu');
                document.location.href = 'login.php';
      </script>
    ";
  
  
}


 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SoeltanExpress - Admin</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link href="tables/dataTables.bootstrap4.min.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Soeltan</span>Express</a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php echo $maha['username']; ?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
      <li><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
      <li><a href="userprofile.php"><em class="fa fa-user">&nbsp;</em> User Profile</a></li>
      <li><a href="customer.php"><em class="fa fa-users">&nbsp;</em> Customer</a></li>
      <li class="active"><a href="miniadmin.php"><em class="fa fa-users">&nbsp;</em> Mini Admin</a></li>
      <li><a href="konten.php"><em class="fa fa-tasks">&nbsp;</em> Kelola Konten</a></li>
      <li><a href="faq.php"><em class="fa fa-list">&nbsp;</em> Kelola FAQ</a></li>
      <li><a href="about.php"><em class="fa fa-tasks">&nbsp;</em> About</a></li>
      <li><a href="login.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
    </ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
      <ol class="breadcrumb">
        <li><a href="#">
          <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Mini Admin</li>
      </ol>
    </div><!--/.row-->

    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"><b> Mini Admin</h1></b>
      </div>
    </div><!--/.row-->
				
		
		<div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">Data Pegawai</div>
          <div class="panel-body"><a href="#" class="btn btn-primary" data-target="#produk1" data-toggle="modal">Tambah</a></div>
          <div class="panel-body">
            <div class="col-md-12">
                    <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                  <th scope="col">no KTP</th>
                  <th scope="col">Username</th>
                    <th scope="col">Nama</th>
                    <th scope="col">email</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">nomor HP</th>
                    <th class="text-left">Operasi</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach($miniadmin as $row) : ?>
                <tr>
                    <td><?php echo $row["no_ktp"]; ?></td>
                    <td><?php echo $row["username"]; ?></td>
                    <td><?php echo $row["nama"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["alamat"]; ?></td>
                    <td><?php echo $row["no_hp"]; ?></td>
                    <td class="text-left">  
                      <a href="#" class="btn btn-primary" data-target="#modal2<?php echo $row["no_ktp"]; ?>" data-toggle="modal">Edit</a>
                      <button class="btn btn-danger"><a style="color:white;" href="hapusmini.php?no_ktp=<?php echo $row["no_ktp"]; ?>" onclick="return confirm('yaqin?');">Delete</a></button>
                    </td>
                </tr>

                      <!--modal2-->
             
                  
                
            <?php
            $id = $row['no_ktp']; 
            $query_edit = mysqli_query($conn, "SELECT * FROM mini_admin WHERE no_ktp='$id'");
            //$result = mysqli_query($conn, $query);
            while ($rows = mysqli_fetch_assoc($query_edit)) {  
            ?>

                <div id="modal2<?php echo $row["no_ktp"]; ?>" class="modal fade" tabindex="-1" role="dialog">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title">Edit Mini Admin</h4>
                        </div>
                        <div class="modal-body">
                          <form class="form-horizontal" action="" method="post" >

                    <div class="modal-body">
                          <div class="messages"></div>
                        <input type="hidden" name="no_ktp" value="<?php echo $rows["no_ktp"]; ?>">
                        <div class="form-group">
                          <input type="hidden" name="password" value=" <?php echo $rows["password"]; ?> ">
                          <label for="username" class="col-sm-3 control-label">Username</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $rows["username"]; ?>" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="nama_lengkap" class="col-sm-3 control-label">Nama</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" id="nama_lengkap" name="nama" placeholder="nama lengkap" value="<?php echo $rows["nama"]; ?>" required>
                          </div>
                        </div>
                      <div class="form-group">
                          <label for="email" class="col-sm-3 control-label">Email</label>
                          <div class="col-sm-9">
                          <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $rows["email"]; ?>" required>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="alamat" class="col-sm-3 control-label">Alamat</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" id="email" name="alamat" placeholder="Alamat" value="<?php echo $rows["alamat"]; ?>" required>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="no_hp" class="col-sm-3 control-label">No HP</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" id="email" name="no_hp" placeholder="No HP" pattern="[0-9]{12}" value="<?php echo $rows["no_hp"]; ?>" required>
                          </div>
                      </div>
                    </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary" name="submitlol">Edit Pegawai</button>
                        </div>
                      </form>    
                      </div>
                  </div>
                </div>
              </div>





              <div id="modal2<?php echo $row["no_ktp"]; ?>" class="modal fade" tabindex="-1" role="dialog">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title">Edit Mini Admin</h4>
                        </div>
                        <div class="modal-body">
                          <form class="form-horizontal" action="" method="post">

                    <div class="modal-body">
                          <div class="messages"></div>
                        <div class="form-group">
                          <label for="username" class="col-sm-3 control-label">Username</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $rows["username"]; ?>" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="nama_lengkap" class="col-sm-3 control-label">Nama Lengkap</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" id="nama_lengkap" name="nama" placeholder="nama lengkap" value="<?php echo $rows["nama"]; ?>" required>
                          </div>
                        </div>
                      <div class="form-group">
                          <label for="email" class="col-sm-3 control-label">Email</label>
                          <div class="col-sm-9">
                          <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $rows["email"]; ?>" required>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="alamat" class="col-sm-3 control-label">Alamat</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?php echo $rows["alamat"]; ?>" required>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="no_hp" class="col-sm-3 control-label">No HP</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor HP" pattern="[0-9]{12}" value="<?php echo $rows["no_hp"]; ?>" required>
                          </div>
                      </div>
                                  
                        
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary" name="submit">Edit Mini Admin</button>
                        </div>
                          </form>
                      </div>
                  </div>
                </div>
              </div>



              <?php 
              } ?>

               <?php endforeach; ?>
              </tbody>
                  </table>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>

         <!-- Modal produk1 -->
                    <div id="produk1" class="modal fade" tabindex="-1" role="dialog">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title">Tambah Mini Admin</h4>
                        </div>
                        <div class="modal-body">
                          <form class="form-horizontal" action="" method="post">

                    <div class="modal-body">
                          <div class="messages"></div>
                        <div class="form-group">
                          <label for="username" class="col-sm-3 control-label">no KTP</label>
                          <div class="col-sm-9">
                          <input type="number" class="form-control" id="no_ktp" name="no_ktp" placeholder="no_ktp" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="username" class="col-sm-3 control-label">Username</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="nama_lengkap" class="col-sm-3 control-label">Nama Lengkap</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" id="nama_lengkap" name="nama" placeholder="nama lengkap" required>
                          </div>
                        </div>
                      <div class="form-group">
                          <label for="email" class="col-sm-3 control-label">Email</label>
                          <div class="col-sm-9">
                          <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="alamat" class="col-sm-3 control-label">Alamat</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="no_hp" class="col-sm-3 control-label">No HP</label>
                          <div class="col-sm-9">
                          <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor HP" pattern="[0-9]{12}" required>
                          </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Jenis Kelamin</label>
                        <div class="col-sm-9">
                          <div class="checkbox">
                            <input type="checkbox" name="jenis_kel" value="Laki-laki">Laki-laki
                          </div>
                            <input type="checkbox" name="jenis_kel" value="Perempuan">Perempuan
                        </div>
                      </div>
                        <div class="form-group">
                          <label for="password" class="col-sm-3 control-label">Password</label>
                          <div class="col-sm-9">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                          </div>
                        </div>
                                  
                        
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary" name="submit">Tambah Mini Admin</button>
                        </div>
                          </form>
                      </div>
                  </div>
                </div>
              </div>
        <!-- /.container-fluid -->  
      <div class="col-sm-12">
        <p class="back-link">SoeltanExpress</p>
      </div>
    </div><!--/.row-->
  </div><!--/.main-->
  
	
		<script src="js/jquery-1.11.1.min.js"></script>
		<script type="js/jquery-3.3.1.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	  <!-- Page level plugins -->
  <script src="tables/jquery.dataTables.min.js"></script>
  <script src="tables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/datatables.js"></script>
	
</body>
</html>