<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
	include_once('header.php');
?>

<body>
	<br>
	<div class="bandeauGrey">
		<div class="paragraph">
		<br><br>
			<h3>Presentation:</h3>
			<br>
			EfreiPara News is a website that provides a simple way to access news of both <a href="https://efreipara.fr">EfreiPara</a> and 
			<a href="https://aspu.org">ASPU</a>. It also simplify the way to book in for skydive sessions.
			<br><br>

			<br>
			<h4>EfreiPara:</h4>
			<br>
			EfreiPara is a club of students from Efrei - Villejuif. It's objectif is to promote the skydiving to students.
			<br><br>

			<h4>ASPU:</h4>
			<br>
			ASPU is an association providing one of the best and lest expensive skydiving formation.
			The teaching crew is certified by the FFP (French Federation of Parachutism) and and can be proud of having in their ranks french skydiving professionals skydivers.
			<br><br>
		</div>
	</div>

	<div class="paragraph" id="keyLocations">
	<br><br>
		<h4>Key Locations :</h4>
		<br><br>
		<div id="map"></div>
		
		<script type="text/javascript">
			function initMap() {
				var efrei = {lat: 48.788759, lng: 2.363728};
				var dropzone = {lat: 50.316161, lng: 4.029539};
				var classes = {lat: 48.819112, lng: 2.338484};
				var centerZone = {lat: 49.350013, lng: 2.764571};
				var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 7,
				center: centerZone
			});
			var marker1 = new google.maps.Marker({
			  	position: efrei,
			  	map: map,
			  	title: "Efrei"
			});
			var marker2 = new google.maps.Marker({
			  	position: dropzone,
			  	map: map,
    			title: "Dropzone"
			});
			var marker3 = new google.maps.Marker({
			  	position: classes,
			  	map: map,
			  	title: "ASPU Classes"
			});
			}
		    </script>
		    <script async defer
		    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZhGyPKnlBzku2-zPW_qFOZADaHc33YU0&callback=initMap">
		    </script>
		    <br><br>
		</div>
	</div>	
	
		<br><br><br><br><br><br>
		
	<footer class="bandeauBlack">
		<br><br><br><br><br>
		<div>
			Join the webmaster : marc.gayraud@efrei.net
		</div>
		<br><br>	
	</footer>
</body>
</html>