<?php

/* @var $this yii\web\View */

$this->title = 'Yii Framework';
?>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans|Maven+Pro:500' rel='stylesheet' type='text/css'>
<script src="arrow.js"></script>
</head>
<div class="site-index">

  <header class="jumbotron" style="background-image:url(startup-593327.jpg); background-size: 100% auto; height: 500px; color:white">
    <h1 style="font-size:200px">Yii</h1>
    <br>
    <h3>A Fast, Secure, and Professional PHP Framework</h3>
  </header>
  <section>
    <a class="arrow-wrap" href="#body-content">
      <span class="arrow"></span>
      <!--<span class="hint">scroll</span>-->
    </a>
    <div class="body-content" id="body-content">
      <div class="row">
        <div class="col-lg-12">
          <h2>What Is Yii?</h2>
          <p>
            Yii (pronounced "Yee") is a PHP-based open source web application framework. Yii stands for "Yes, it is!". This comes from their slogan: "Is it fast?...Is it secure?...Is it professional?...Is it right for my next project?...Yes, it is!" Yii promotes DRY (Don't Repeat Yourself) design and rapid development. A main focus of the Yii framework is performance and efficiency, with Yii outperforming all other PHP-based frameworks in the field of requests processed per second.
          </p>
          <figure class="center">
            <img src="performance-20090131.png" alt="Performance Comparison Among PHP Frameworks" height="300" width="550"/>
            <figcaption>Requests Per Second with and without Alternative PHP Cache (APC)</figcaption>
          </figure>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <h2>Popularity</h2>
          <script type="text/javascript" src="//www.google.ca/trends/embed.js?hl=en-US&q=Yii,+/m/09t3sp,+Symfony,+/m/07h2gf,+WebGUI&cmpt=q&tz=Etc/GMT%2B5&tz=Etc/GMT%2B5&content=1&cid=TIMESERIES_GRAPH_AVERAGES_CHART&export=5&w=1000&h=350" style="padding: 25px";
          ></script>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <h2>Technological bases</h2>

          <p>
            A fundamental feature of Yii is its implementation of the Model-View-Controller (MVC) design pattern.
            The MVC design pattern separates the application rules and logic from the user interface, so each part can be edited without
            affecting the others.
            <ul>
              <li>The Model component of MVC contains the data used by the application and the rules that affect that data.</li>
              <li>The View component is the visual output of information. This is the part of the application that the user sees and interacts with directly.</li>
              <li>The Controller component is the brains of the application. It controls all the computation that the application does, including user interactions, modifying the model, and updating the view.</li>
            </ul>
          </p>
          <figure class="center">
            <img src="MVC.png" alt="Model-View-Controller Relationship" height="500" width="500"/>
            <figcaption>
              Model-View-Controller Relationship
            </figcaption>
          </figure>

        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <h2>Strengths</h2>
          <h4 style="text-decoration: underline";>Performance</h4>
          <ul>
            <li>Yii can handle a large number of requests per second. It uses a lazy loading technique.</li>
            <li>Yii is very easy to install</li>
            <li>Very effective caching</li>
          </ul>
          <h4 style="text-decoration: underline";>Security</h4>
          <ul>
            <li>Built in tools for: </li>
              <ul>
                  <li>Cross site scripting prevention</li>
                  <li>Cross-site Request Forgery Prevention</li>
                  <li>Cookie Attack Prevention</li>
                  <li>SQL injection prevention</li>
                  <li>Input validation, output filtering</li>
              </ul>
          </ul>
          <h4 style="text-decoration: underline";>Extensibility</h4>
            <ul>
              <li>Yii features can be replaced with code created from scratch, or even code borrowed from other frameworks.</li>
            </ul>
            <h4 style="text-decoration: underline";>Summary</h4>
              <ul>
                <li>Yii is ideal for layered, very structured sites</li>
                <li>Its extensibility, error handling, security make it ideal for e-commerce sites.</li>
              </ul>
        </div>
        <div class="col-lg-6">
          <h2>Weaknesses</h2>
          <h4 style="text-decoration: underline";>User Issues</h4>
          <ul>
            <li>Steep learning curve</li>
            <li>Development can take a long time for devs that are unfamiliar with the framework.</li>
            <li>Code can become overly verbose</li>
          </ul>
          <h4 style="text-decoration: underline";>Technical Issues</h4>
          <ul>
            <li>Can be overly reliant on static methods</li>
            <li>Danger of bloat due to heavy use of arrays.</li>
          </ul>
          <h4 style="text-decoration: underline";>Summary</h4>
          <ul>
            <li>Large projects can get out of hand in terms of code management.</li>
          </ul>
        </div>
      </div>
      <div class="row">
        <h2>Sites that use Yii</h2>
        <div class="col-lg-6">
          <ul>
            <li><a href="https://www.vice.com/en_ca">VICE</a></li>
            <li><a href="https://www.humhub.org/">Humhub</a></li>
            <li><a href="http://www.realself.com/">Realself</a></li>
            <li><a href="http://www.teachother.education/">teacheachother</a></li>
          </ul>
        </div>
        <div class="col-lg-6">
          <ul>
            <li><a href="http://zurmo.org/">Zurmo</a></li>
            <li><a href="http://noisey.vice.com/en_ca">Noisey</a></li>
            <li><a href="http://www.nutritionix.com/">Nutritionix</a></li>
            <li><a href="http://anytasker.com/">Anytasker</a></li>
          </ul>
        </div>
      </div>
      <div class="row">
        <h2>Open Source Applications that use Yii</h2>
        <div class="col-lg-12">
          <ul>
            <li><a href="https://www.limesurvey.org/en">LimeProject</a></li>
            <li><a href="https://www.x2crm.com/">X2EngineCRM</a>, A Customer Relationship Management System</li>
            <li><a href="http://zurmo.org/">Zurmo</a>, another CRM</li>
            <li><a href="https://github.com/fusonic/chive/">Chive</a>, a Web-Based Database Management tool</li>
          </ul>
        </div>
      </div>

    </div>
  </section>
</div>
