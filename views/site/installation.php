<?php

/* @var $this yii\web\View */

$this->title = 'Installation';
$this->params['breadcrumbs'][] = $this->title;
?>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans|Maven+Pro:500' rel='stylesheet' type='text/css'>
<script src="arrow.js"></script>
</head>
<div class="site-index">

  <header class="jumbotron" style="background-size: 100% auto; height: 400px;">
    <h1>Installing the Yii Framework</h1>
    <h3>Easier than you think.</h3>
  </header>

  <section>
    <a class="arrow-wrap" href="#body-content">
      <span class="arrow"></span>
      <!--<span class="hint">scroll</span>-->
    </a>
    <div class="body-content"  id="body-content">
      <div class="row">
        <div>
          <h2>Requirements:</h2>
          <ul>
            <li>WampServer</li>
            <li>Composer</li>
          </ul>
          <h2>Install WampServer:</h2>
          <figure class="left">
            <img src="Source Forge Wamp.png" alt="Install Wamp" height="400" width="800" />
            <figcaption>Wamp Installation file from Source Forge</figcaption>
          </figure>

          <h2>Install  Composer from
            <a href="http://www.yiiframework.com/doc-2.0/guide-start-installation.html">here</a>
          </h2>
          <img src="Install Yii.png" alt="Install Wamp" height="400" width="800" />
          <h2>For Windows, download and run the installer</h2>
          <img src="InstallLink.png" alt="Install Wamp" height="400" width="800" />
          <h2>For Linux and Mac OS X, run the provided commands in command prompt</h2>
          <img src="cmd.png" alt="Install Wamp" height="400" width="800" />
          <h2>Update composer if the first commmand did not execute</h2>
          <img src="updatecomposer.png" alt="Install Wamp" height="200" width="1000" />
          <h2>Create first application: </h2>
          <img src="second command.png" alt="Install Wamp" height="700" width="1000" />
          <h2>Go to : localhost/web/index.php: </h2>
          <img src="start-app-installed.png" alt="Install Wamp" height="650" width="1000" />

        </div>
      </div>
    </div>
  </section>
</div>
