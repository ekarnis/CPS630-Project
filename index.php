

<?php include("header.php");?>

<main class="container" id="link_1">
  <article>
    <input id="origin-input" class="controls" type="text" placeholder="Where are you?">


    <div id="map"></div>
    <script type="text/javascript" src="script\index.js"></script>
  </article>

</main>

<?php include("footer.php");?>

<!-- Local Javascript -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjpgKNU-wwlsthlfwin0lC4lzPYowxkKc&callback=initMap&libraries=places"async defer></script>
