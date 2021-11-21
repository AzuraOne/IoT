<?php
error_reporting(0);
include "config.php";

$idruang = $_GET['idruang'];




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link href="assets/fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet">
    <!--load all styles -->
    <link rel="stylesheet" href="css/dashboard.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">

    </script>
    <script>
        $(document).ready(function() {
            setInterval('updateClock()', 1000);
        });

        function updateClock() {
            var currentTime = new Date();
            var currentHours = currentTime.getHours();
            var currentMinutes = currentTime.getMinutes();
            var currentSeconds = currentTime.getSeconds();

            // Pad the minutes and seconds with leading zeros, if required
            currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
            currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;

            // Choose either "AM" or "PM" as appropriate
            var timeOfDay = (currentHours < 12) ? "AM" : "PM";

            // Convert the hours component to 12-hour format if needed
            currentHours = (currentHours > 12) ? currentHours - 12 : currentHours;

            // Convert an hours component of "0" to "12"
            currentHours = (currentHours == 0) ? 12 : currentHours;

            // Compose the string for display
            var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;


            $("#clock").html(currentTimeString);
        }
    </script>
</head>

<body>



    <header>
        <div class="brand">
            <img src="img/hallo.png" alt="logo brand" width="120px" height="80px">

        </div>
        <nav>
        <ul class="list">
                <li><a href="dashboard.php" class="active">Home</a></li>
                <li><a href="index_d.php">Device</a></li>
                <li><a href="index_s.php">Sensor</a></li>
                <li><a href="index_r.php">Ruangan</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>

        </nav>
        <span></span>
    </header>
    <section>

        <div class="col">


            <div class="box">
                <h1>Profil saya</h1>
                <hr>
                <div class="content" style="display: flex; flex-direction:column;">
                    <img src="img/profil saya.png" width="90px" height="90px" alt="logoprofil">
                    <div class="profile-box">
                        <a href="ProfileCard.html">Pengaturan Profile |<i class="fas fa-cogs" style="font-size: 28px; border-color:aqua; padding-left: 12px;"></i></a>




                    </div>
                </div>
            </div>
            <?php if ($idruang) { ?>

                <?php
                $querysuhu = mysqli_query($conn, "SELECT Ruangan.Id_ruangan, Ruangan.Nilai_suhu, Ruangan.Nilai_kelembapan, Sensor_suhu.Id_suhu ,Sensor_suhu.Suhu FROM Ruangan LEFT JOIN Sensor_suhu ON Sensor_suhu.Id_ruangan = Ruangan.Id_ruangan  WHERE Ruangan.Id_ruangan = $idruang ORDER BY Sensor_suhu.Id_suhu  DESC LIMIT 1");
                $querykelembapan = mysqli_query($conn, "SELECT Ruangan.Id_ruangan, Ruangan.Nilai_suhu, Ruangan.Nilai_kelembapan,  Sensor_kelembapan.kelembapan, Sensor_kelembapan.Id_kelembapan FROM Ruangan  LEFT JOIN Sensor_kelembapan ON Sensor_kelembapan.Id_ruangan = Ruangan.Id_ruangan WHERE Ruangan.Id_ruangan = $idruang ORDER BY  Sensor_kelembapan.Id_kelembapan DESC LIMIT 1");
                while ($querykelembapan1 = mysqli_fetch_array($querykelembapan)) {
                    while ($querysuhu1 = mysqli_fetch_array($querysuhu)) {






                        $devices = mysqli_query($conn, "SELECT Ruangan_device.Kondisi , Ruangan_device.Id_device, Device.Nama_device FROM Ruangan_device LEFT JOIN Device on Device.Id_device = Ruangan_device.Id_device WHERE Ruangan_device.Id_ruangan = '$idruang' ORDER BY Ruangan_device.Ruangiddevice DESC LIMIT 1");

                        while ($device = mysqli_fetch_array($devices)) :
                ?>
                            <div class="box">


                                <h1><?= $device['Nama_device']; ?> </h1>
                                <hr>
                                <div class="content">
                                    <img src="<?= $device['Kondisi'] == 'Menyala' ? 'img/statuson.png' : 'img/statusoff.png'; ?> " width="50px" height="50px" alt="status off">
                                    <h2 style="font-size: large;"><?= $device['Kondisi']; ?></h2>
                                </div>

                            </div>
                            <?php 
                            if ($querysuhu1['Suhu'] > $querysuhu1['Nilai_suhu'] || $querykelembapan1['kelembapan'] > $querykelembapan1['Nilai_kelembapan']) {
                                
                                $id_device = $device['Id_device'];
                                $device = mysqli_query($conn, "INSERT INTO Ruangan_device (Ruangiddevice, Id_ruangan, Id_device, Kondisi) VALUES (NULL, '$idruang', '$id_device', 'Menyala')");
                                # code...
                            } ?>
                        <?php endwhile; ?>

        </div>

        <div class="col">

            <div class="box">
                <h1>Sensor Suhu</h1>
                <hr>
                <div class="content">
                    <h2 style="color: white; font-size: 40px;"><?= $querysuhu1['Suhu']; ?> &deg;C </h2>

                    <?php
                    $suhunormal = (int)$querysuhu1['Nilai_suhu'];
                    $suhusekarang = (int)$querysuhu1['Suhu'];
                    $kurang = $suhusekarang - $suhunormal;
                    
                    $tambah = $suhunormal - $suhusekarang;



                        if ($querysuhu1['Nilai_suhu'] == $querysuhu1['Suhu']) {
                            echo "<h2 style='color: white; font-size: 40px;'>Normal</h2>";
                        } elseif ($querysuhu1['Suhu'] > $querysuhu1['Nilai_suhu']) {
                            echo "<h2 style='color: white; font-size: 40px; background-color: red;'><i class='fas fa-exclamation-triangle'></i> Suhu Ruangan melebihi Batas</h2>";
                            
                            ?><script>alert('Suhu melebihi batas normal sebesar <?php echo $kurang;?>9\xB0 C')</script><?php
                    ?><a href="fix.php?id_suhu=<?= $querysuhu1['Id_suhu']; ?>&id_ruang=<?= $idruang ?>" style="color: white; background-color: black; margin-top: 10px;">Fix</a>
                    <?php
                        } elseif ($querysuhu1['Suhu'] < $querysuhu1['Nilai_suhu']) {
                            echo "<h2 style='color: white; font-size: 40px; background-color: red;'><i class='fas fa-exclamation-triangle'></i> Suhu Ruangan Kurang optimal</h2>";
                            ?><script>alert('Suhu kurang optimal sebesar <?php echo  $tambah;?> 9\xB0 C')</script><?php
                    ?><a href="fix.php?id_suhu=<?= $querysuhu1['Id_suhu']; ?>&id_ruang=<?= $idruang ?>" style="color: white; background-color: black;margin-top: 10px;">Fix</a> <?php
                                                                                                                                                                                                                                                                                                                                            } ?>
                </div>

            </div>

            <div class="box">
                <h1>Sensor Kelembapan</h1>
                <hr>
                <div class="content">
                    <h2 style="color: white; font-size: 40px;"><?= $querykelembapan1['kelembapan']; ?>%</h2>
                    <?php
                    $nilaisensor = $querykelembapan1['kelembapan'];
                    $nilainormal = $querykelembapan1['Nilai_kelembapan'];




                        if ($querykelembapan1['Nilai_kelembapan'] == $querykelembapan1['kelembapan']) {
                            echo "<h2 style='color: white; font-size: 40px;'>Normal</h2>";


                        } elseif ($querykelembapan1['kelembapan'] > $querykelembapan1['Nilai_kelembapan']) {
                            echo "<h2 style='color: white; font-size: 40px; background-color: red;'><i class='fas fa-exclamation-triangle'></i> Kelembapan melebihi Batas</h2>";
                            ?><script>alert('Kelembapan melebihi batas normal sebesar <?php echo $nilaisensor-$nilainormal;?>%')</script><?php
                    ?><a href="fix.php?id_kelembapan=<?= $querykelembapan1['Id_kelembapan']; ?>&id_ruang=<?= $idruang ?>" style="color: white; background-color: black;margin-top: 10px;">Fix</a>
                    <?php
                        } elseif ($sensor['kelembapan'] < $sensor['Nilai_kelembapan']) {
                            echo "<h2 style='color: white; font-size: 40px; background-color: red;'><i class='fas fa-exclamation-triangle'></i> Kelembapan Ruangan Kurang optimal</h2>";
                            ?><script>alert('Kelembapan Ruangan Kurang optimal sebesar <?php echo $nilainormal-$nilaisensor;?>%')</script><?php

                    ?><a href="fix.php?id_kelembapan=<?= $sensor['Id_kelembapan']; ?>&id_ruang=<?= $idruang ?>" style="color: white; background-color: black;margin-top: 10px;">Fix</a> <?php
                                                                                                                                                                                    }
                                                                                                                                                                                        ?>
                </div>

            </div>



        </div>

        <div class="col">

            <div class="box">
                <h1>WAKTU SAAT INI</h1>
                <hr>
                <div class="content">


                    <h3 style="font-size:24px;"><i class="fas fa-clock"></i>
                        <div id="clock"></div>
                    </h3>

                </div>
            </div>

            <form action="" method="GET">
                <div class="box">
                    <h1>NAMA RUANGAN</h1>
                    <hr>
                    <div class="content">

                        <select name="idruang" id="idruang">

                            <?php

                            $q = mysqli_query($conn, "SELECT * FROM Ruangan");
                            while ($ruang = mysqli_fetch_array($q)) :



                            ?>
                                <option value="<?php echo $ruang['Id_ruangan']; ?>">
                                    <h2><?php echo $ruang['Nama_ruangan']; ?></h2>

                                </option>
                            <?php endwhile; ?>
                        </select>
                        <button type="submit">Pilih</button>




                    </div>
                </div>
            </form>



        </div>
<?php }
                } ?>
<?php } else { ?>

    <div class="col">

        <div class="box">
            <h1>WAKTU SAAT INI</h1>
            <hr>
            <div class="content">

                <h3 style="font-size:24px;"><i class="fas fa-clock"></i>
                    <div id="clock"></div>
                </h3>

            </div>
        </div>

        <form action="" method="GET" style="margin-top: 20px;">
            <div class="box">
                <h1>NAMA RUANGAN</h1>
                <hr>
                <div class="content">
                    <select name="idruang" id="idruang">
                        <?php
                        $q = mysqli_query($conn, "SELECT * FROM Ruangan");
                        while ($ruang = mysqli_fetch_array($q)) :


                        ?>
                            <option value="<?php echo $ruang['Id_ruangan']; ?>">
                                <h2><?php echo $ruang['Nama_ruangan']; ?></h2>
                            </option>
                        <?php endwhile; ?>
                    </select>
                    <button type="submit">Pilih</button>




                </div>
            </div>
        </form>



    </div>

<?php } ?>



    </section>

</body>

</html>