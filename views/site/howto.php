<?php

use yii\helpers\Html;
$this->title= "How-to";
$this->params['breadcrumbs'][] = $this->title;
?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="http://wallpaperstock.net/dark-ocean-wallpapers_38052_1680x1050.jpg" alt="MVC">
      <div class="carousel-caption">
        <h1>How to build a website with Yii Framework</h1>
        <h3>Understand the MVC model</h3>
        <p>It is not difficult at all</p>
      </div>
    </div>

    <div class="item">
      <img src="http://hdwallpapersfit.com/wp-content/uploads/2015/03/dark-ocean-wallpapers.jpg" alt="Generator">
      <div class="carousel-caption">
        <h1>How to build a website with Yii Framework</h1>
        <h3>Use the generator Yii provided</h3>
        <p>Model, CRUD, Controller, Form, Module, Extension Generator</p>
      </div>
    </div>

    <div class="item">
      <img src="http://hdwallpapersfit.com/wp-content/uploads/2015/03/dark-ocean-hd-wallpapers.jpg" alt="CSS">
      <div class="carousel-caption">
        <h1>How to build a website with Yii Framework</h1>
        <h3>Change the CSS </h3>
        <p>Changing the code inside the css file can make the website better</p>
      </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<nav class ="navbar narbar-default">
  <div class ="container-fluid">
    <div class ="navbar-header">
      <h1>Tutorial</h1>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#row_create">Create Database</a></li>
        <li><a href="#row_generator">Yii Generator</a></li>
        <li><a href="#row_css">CSS</a></li>
      </ul>
    </div>
  </div>
</nav>
<section>
  <div class="body-content">
    <div class="row" id="row_create">
      <h2> Create a database </h2>
      <img src="Database.png" alt="DbCreate" height="500" width="900" />
    </div>
    <h2> Connection Set-up </h2>
    <img src="Connection_Setup.png" alt="DbConnection" height="500" width="900"/>
    <div class="row" id="row_generator">
      <h2> Yii Generators </h2>
      <img src="Database_Gii_1.png" alt="DbGii_1" height="500" width="900"/>
      <h2> Model generator for database </h2>
      <img src="Database_Gii_2.png" alt="DbGii_2" height="500" width="900"/>
      <h2> Generator CRUD for database </h2>
      <img src="Database_Gii_3.png" alt="DbGii_3" height="500" width="900"/>
    </div>
    <h2> A webpage is generated with a database</h2>
    <img src="BeforeCSS.png" alt="Database" height="500" width="900"/>
    <div class="row" id="row_css">
      <h2> Changing the CSS code</h2>
      <img src="CSS_1.png" alt="CSS_1" height="500" width="900"/>
    </div>
  </div>
  <br><br>
  <a class="btn btn-primary" href="http://localhost/cps530_project/web/index.php?r=movie/index">Webpage</a>
</div>
</section>
