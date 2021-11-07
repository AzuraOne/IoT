<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>


    <header>
        <div class="brand">
            <img src="img/hallo.png" alt="logo brand" width="180px" height="120px">
        </div>
        <nav>
            <ul class="list">
                <li><a href="#" class="active">Home</a></li>
                <li><a href="#">Data Logger</a></li>
                <li><a href="#">Graphic</a></li>
                <li><a href="#">Logout</a></li>
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
                    <a href="ProfileCard.html">Pengaturan Profile</a>
                </div>
            </div>
            <div class="box">
                <h1>STATUS AC A </h1>
                <hr>
                <div class="content">
                    <img src="img/statusoff.png" width="50px" height="50px" alt="status off">
                    <button>poweroff</button>
                </div>
            </div>
            <div class="box">
                <h1>STATUS AC B</h1>
                <hr>
                <div class="content">
                    <img src="img/statuson.png" width="50px" height="50px" alt="status on">
                    <button>poweron</button>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="box">
                <h1>SENSOR KELEMBAPAN</h1>
                <hr>
                <div class="content">
                    <img src="img/kelembapan.png" width="70px" height="70px" alt="Kelembapan">
                 
                </div>

            </div>
            <div class="box">
                <h1>Kontrol AC</h1>
                <hr>
                <div class="content">
                <img src="img/kontrolac.png" width="70px" height="70px" alt="Kontrol AC">
                    <h3>Kontrol A:</h3>
                    <button>poweroff</button>
                    <h3>Kontrol B:</h3>
                    <button>poweron</button>
                </div>
            </div>

        </div>
        <div class="col">
            <div class="box">
                <h1>SENSOR SUHU</h1>
                <hr>
                <div class="content">
                    
                <img src="img/sensor_suhu.png" width="70px" height="70px" alt="Sensor Suhu">
                    <h3>39 C</h3>
                    
                </div>
            </div>
            <div class="box">
                <h1>WAKTU SAAT INI</h1>
                <hr>
                <div class="content">
                    <h3 style="font-size:30px;"><?php echo date("h:i:sa")?></h3>
                    
                </div>
            </div>
            <div class="box">
                <h1>waktu pengiriman terakhir
                </h1>
                <hr>
                <div class="content">
                    <h3 style="font-size:30px;"><i class="fa fa-exclamation-triangle" style="color: yellow;"></i> 10:50:38 <span style="font-size: 9px;">| 2021-05-11</span></h3>
                    
                </div>
            </div>
        </div>


    </section>
</body>

</html>