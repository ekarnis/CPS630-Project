<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About Us';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>

<div class="site-about">

    <div class="list-group">
      <a href="#" class="list-group-item active" style="background-color:#795548">
        <h4 class="list-heading">Team Members</h4>
      </a>
      <a href="#" class="list-group-item" id= "item" >
        <figure class="right">
          <img src="isaac.jpg" alt="yeah" height="180" width="120"/>
        </figure>
        <h4 class="list-group-item-heading">Isaac Tong</h4>
        <ul>
          <li class="list-group-item-text">University: Ryerson</li>
          <li class="list-group-item-text">Program: Computer Science</li>
          <li class="list-group-item-text">Year(s) of programming: 3</li>
          <li class="list-group-item-text">Responsibilities: How-to Tutorial, The actual page and The about page </li>
        </ul>
      </a>
      <a href="#" class="list-group-item">
        <figure class="right">
          <img src="charliepic2.jpg" alt="charlie" height="120" width="120"/>
        </figure>
        <h4 class="list-group-item-heading">Charlie Driver</h4>
        <ul>
          <li class="list-group-item-text">University: Ryerson</li>
          <li class="list-group-item-text">Program: Computer Science</li>
          <li class="list-group-item-text">Year(s) of programming: 4</li>
          <li class="list-group-item-text">Responsibilities: Content of the Home page, Proofing</li>
        </ul>
      </a>
      <a href="#" class="list-group-item" id="item">
        <h4 class="list-group-item-heading">Matin Shirandasht</h4>
        <ul>
          <li class="list-group-item-text">University: Ryerson</li>
          <li class="list-group-item-text">Program: Computer Science</li>
          <li class="list-group-item-text">Year(s) of programming: 4 </li>
          <li class="list-group-item-text">Responsibilities: Installation tutorial </li>
        </ul>
      </a>
      <a href="#" class="list-group-item" id="item">
        <figure class="right">
          <img src="eric.jpg" alt="me too thanks" height="120" width="120"/>
        </figure>
        <h4 class="list-group-item-heading">Eric Karnis</h4>
        <ul>
          <li class="list-group-item-text">University: Ryerson</li>
          <li class="list-group-item-text">Program: Computer Science</li>
          <li class="list-group-item-text">Year(s) of programming: 4</li>
          <li class="list-group-item-text">Responsibilities: Visual Design, Conclusion, Proof Reading</li>
        </ul>
      </a>
</div>

    <div style="font-size:80%">
        <p>References :</p>
        <a href="https://erickarnis.wordpress.com/">Eric Karnis's Website</a> <br>
        <a href="http://www.yiiframework.com/performance/">Image Source: PHP Framework Performance Comparison </a><br>
        <a href="https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller#/media/File:MVC-Process.svg">Image Source: Model-View-Controller Relationship</a><br>
    </div>


</div>
