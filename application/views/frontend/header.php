<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="<?=base_url()?>assets/leaflet/leaflet.css" rel="stylesheet">
<link rel="stylesheet" href="<?=base_url()?>node_modules/leaflet-draw/dist/leaflet.draw.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
     body{
         font-family:poppins;
     }
     p{
         font-weight: 500;
     }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
      <img src="<?=base_url('')?>/images/logo.png" width = "70px">
      </a>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="nav-link" href="<?=base_url('front')?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('front/dataPelayanan')?>">Pelayanan Publik</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('front/dataKecamatan')?>">Data Kecamatan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('front/filterMap')?>">Featured</a>
      </li>
    </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="nav-item"><a href="<?=base_url('/index.php/home/register')?>" class="nav-link"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li class="nav-item"><a href="<?=base_url('auth')?>" class="nav-link"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
    </div>
</nav>
  


