<?php
  require_once('app/db-connect.php');
  $query = "SELECT AVG(power) AS pow FROM ( SELECT * FROM iot_log ORDER BY id DESC LIMIT 10 ) AS `table` ORDER by id ASC";
  $res = mysqli_query($con, $query);

  while ($row = mysqli_fetch_assoc($res))
  {
     $cp = $row['pow'];
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Power monitoring system</title>
    <!-- code by ANIKET SARDAR -->

    <link href="vendors/normalize-css/normalize.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendors/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/fontawesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom CSS  -->
    <link rel="stylesheet" href="style.css">

  </head>
  <body>

<!-- code by ANIKET SARDAR -->
      <header>
        <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <!-- code by ANIKET SARDAR -->
              <a class="navbar-brand" href=" ">Smart Monitor</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav">
                <li ><a href=" ">Home</a></li>
                <li><a href="app/get-data.php">Data</a></li>
                <!-- <li><a href="#">Page 2</a></li> -->
                <!-- <li><a href="#">Page 3</a></li> -->
              </ul>

            </div>
          </div>
        </nav>

      </header>

      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <a class="autoPilot btn btn-danger pull-right">Auto Pilot</a>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <div class="panel panel-primary">
              <!-- code by ANIKET SARDAR -->
              <div class="panel-heading">
                <h3>Stats</h3>
              </div>
              <div class="panel-body">
                <!-- final dynamic graph -->
              <div class="graph">
                <!-- <canvas id="mycanvas" width="330" height="150"></canvas> -->
                <div id="chartContainer" style="height: 300px; width: 100%;"></div>
              </div>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-md-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <h3>Mode</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                  <!-- code by ANIKET SARDAR -->
                  <div class="col-sm-8">
                  <a class="btn btn-primary btn-lg mode" data-mode='1' id="mode1">Mode 1</a>
                </div>
                </div>

                <div class="row">
                  <div class="col-sm-8">
                  <a class="btn btn-primary btn-lg mode" data-mode="2" id="mode2">Mode 2</a>
                </div>
                </div>

                <!-- code by ANIKET SARDAR -->
                <div class="row">
                  <div class="col-sm-8">
                  <a class="btn btn-primary btn-lg mode" data-mode="3" id="mode3">Mode 3</a>
                </div>
                </div>
                <!-- code by ANIKET SARDAR -->

                <div class="row">
                  <div class="col-sm-8">
                  <a class="btn btn-primary disabled btn-lg" data-mode="4">Mode 4</a>
                </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-12 col-md-3">
            <div class="panel panel-warning dev-controls">
              <div class="panel-heading">
                <h3>Control</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                  <!-- code by ANIKET SARDAR -->
                  <div class="col-sm-6">
                    <i class="fa fa-lightbulb-o"></i> Bulb `1`
                  </div>
                  <div class="col-sm-6">
                    <a class="btn btn-warning devC" data-dev="1" data-status="off"> off </a>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <i class="fa fa-lightbulb-o"></i> Bulb `2`
                  </div>
                  <div class="col-sm-6">
                    <a class="btn btn-warning devC" data-dev="2" data-status="off">off </a>
                  </div>
                </div>
                <!-- code by ANIKET SARDAR -->

                <div class="row">
                  <div class="col-sm-6">
                    <i class="fa fa-lightbulb-o"></i> Bulb `3`
                  </div>
                  <div class="col-sm-6">
                    <a class="btn btn-warning devC" data-dev="3" data-status="off">off </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-4">
            <!-- code by ANIKET SARDAR -->
            <div class="panel panel-default">
              <div class="panel-heading">
                Total
              </div>
              <div class="panel-body">
                <h3><?php echo $cp; ?> mWatt</h3>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- code by ANIKET SARDAR -->

    <!-- jQuery -->
    <script src="vendors/jquery/jquery.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/js/bootstrap.min.js"></script>
    <!-- Smoothie.js - grap -->
    <script src="vendors/smoothiejs/smoothie.js" charset="utf-8"></script>
    <!-- CanvasJS -->
    <script src="vendors/canvasjs/jquery.canvasjs.min.js" charset="utf-8"></script>
    <!-- Custom js -->
    <!-- code by ANIKET SARDAR -->
    <script src="script.js" charset="utf-8"></script>

  </body>
</html>
