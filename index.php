<!-- Needs to load last-->
<script src="http://maps.google.com/maps/api/js?v3.7&sensor=true"></script>

<?php include("header.php");?>

    <main class="container" id="link_1">
        <article class="xl-12 lg-12 md-12 sm-12">
			<textarea id="textbox" rows="4" cols="50" placeholder="Please past your coordinates here"></textarea>
			<div id="error-div">
			</div>

			<div id="map">
			</div>
        </article>

        <article class="xl-12 lg-12 md-12 sm-12">
            <div id="append-to-div">
            </div>
        </article>
    </main>
	
<?php include("footer.php");?>

<!-- Local Javascript -->
<script type="text/javascript" src="script\index.js"></script>