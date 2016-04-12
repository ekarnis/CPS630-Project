<?php include("header.php");?>

<main class="container" id="link_1">
  <article class="col-xs-12">
    <input type="textbox" id="login-username-field" class="formattedTextBox" placeholder="Name"></input>

    <br>

    <select id="login-institution-field" class="formattedTextBox">
      <option value="" disabled selected>University/College</option>
    </select>

    <br>

    <input type="textbox" id="login-phone-field" class="formattedTextBox" placeholder="Phone Number"></input>

    <br>

    <input type="password" id="login-password-field" class="formattedTextBox" placeholder="Password"></input>

  </article>

  <article class="col-xs-12">
    <div class="row">
      <div class="col-xs-12">
        <input type="textbox" id="login-address-field" class="formattedTextBox" placeholder="Address"></input>
      </div>
    </div>

    <div class="row10px">
      <div class="col-xs-6">
        <input type="number" id="login-username-field" class="formattedTextBox disabled" placeholder="Lattitude" disabled="disabled"></input>
      </div>

      <div class="col-xs-6">
        <input type="number" id="login-username-field" class="formattedTextBox disabled" placeholder="Longitude" disabled="disabled"></input>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <div id="append-geo-here"></div>
      </div>
    </div>
  </article>

  <div class="col-xs-12">
    <button type="button" id="login-singup-button" class="btn btn-xl btn-warning centeredButton">Done</textarea>
    </div>
  </main>

  <?php include("footer.php");?>
