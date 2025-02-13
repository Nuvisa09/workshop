<?php
session_start();
include '../template/topmenu.php';
include '../template/sidemenu_admin.php';
// include '../conf/koneksi.php';
if(isset($_SESSION['login'])){
  $_SESSION['login'] = true;
}else{
  echo "<meta http-equiv='refresh' content = '0; url=../conf/login.php'>";
  die();
}

$nama = $_SESSION['username'];
$akses = $_SESSION['akses'];

if($akses != 'admin'){
  echo "<meta http-equiv='refresh' content = '0; url=../..'>";
  die();
}

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Obat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Obat</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 >List Obat</h3>
                <a href="tambah_obat.php" class="btn btn-primary"> Add obat</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Obat</th>
                    <th>Kemasan</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    include "../conf/koneksi.php";
                    $no = 1;
                    $sql = $koneksi->query ("SELECT *FROM obat");
                    while ($data = $sql->fetch_assoc()){

                    ?>

                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['nama_obat']; ?></td>
                        <td><?php echo $data['kemasan']; ?></td>
                        <td><?php echo $data['harga']; ?></td>

                        <td>
                            <a href="edit_obat.php?&aksi=edit&id=<?php echo $data['id'];?>" class="btn btn-success"><i class="fas fa-edit"></i> Edit</a>
                            <a href="hapus_obat.php?&aksi=hapus&id=<?php echo $data['id'];?>" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  
<?php
include '../template/footer.php';
?>