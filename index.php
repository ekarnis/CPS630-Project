

<?php include("header.php");?>

<main class="container" id="link_1">
  <article>
    <input id="origin-input" class="controls" type="text" placeholder="Where are you?">
    <div id="map"></div>
    <script type="text/javascript" src="script\index.js"></script>
  </article>
	<article class="promotional">
		<h1> What is PropSwap?</h1>
		<p>
			PropSwap is a platform that allows you to borrow, rent, or buy props from theatres all around the world. Alternatively, you can list your own props and lend, rent, or sell them. Everyone involved in exchanges can rate each other to ensure reliablity and the safety of the props involved.
		</p>
	</article>
	<article class="promotional">
		<h1> Why should you use PropSwap?</h1>
		<p>
			PropSwap allows you to see all the props available for trade in every nearby instituition and specialty shop. It reduces the need for repetitive calls and exhaustive searches.
		</p>
	</article>

</main>

<?php include("footer.php");?>

<!-- Local Javascript -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjpgKNU-wwlsthlfwin0lC4lzPYowxkKc&callback=initMap&libraries=places"async defer></script>
