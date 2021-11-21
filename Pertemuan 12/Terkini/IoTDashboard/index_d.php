<?php
  error_reporting(0);
  include 'koneksi_d.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Device</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="device.css">
</head>
  <body>
    <header>
        <div class="brand">
            <img src="img/hallo.png" alt="logo brand" width="180px" height="120px">
        </div>
        <nav>
            <ul class="list">
                <li><a href="dashboard.php">Home</a></li>
                <li><a href="index_d.php">Device</a></li>
                <li><a href="index_s.php">Sensor</a></li>
                <li><a href="index_r.php">Ruangan</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>

        </nav>
        <span></span>
    </header>


<div class="container my-3">
  <h1 style="text-align: center;" class=".text-white">Informasi Device</h1>
  <br>
  <center><a class="btn btn-white" href="tambah_d.php">
  Add Data</a></center>
  <br>
    <form>
                <section class="text-white">
                  <br>
                  <table border="1" style="margin: auto;" width="1000px" height="200px">
                    <thead>
                      <tr style="text-align: center;">
                       <th width="10px">Id_Device</th>
                        <th width="100px">Nama Device</th>
                        <th width="100px">Deskripsi</th>
                        <th width="100px">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                 <?php
                  $no=0;
                  $result = mysqli_query($koneksi, "SELECT * FROM device ORDER BY Id_device ASC");
                  while($row = mysqli_fetch_array($result)) {
                      $no++
                ?>
                      <tr align="center"> 
                        <td><?php echo $row['Id_device'];?></td>
                        <td><?php echo $row['Nama_device'];?></td>
                        <td><?php echo $row['Deskripsi'];?></td>
                         <td scope="row">
                           <a href="edit_d.php?id=<?php echo $row['Id_device'];?>"><button type="button" class="btn btn-warning">Edit</button></a>
                           <a href="hapus_d.php?id=<?php echo $row['Id_device'];?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>            
                        </td>
                  </tr>
                  <?php } ?>
                </tbody>
                  </table>
                </section>
          </form>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>