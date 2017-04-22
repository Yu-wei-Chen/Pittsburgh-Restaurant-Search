<!DOCTYPE html>
<html>
  <head>
    <style type="text/css">
      html, body { height: 100%; margin: 0; padding: 0; }
      #map { height: 100%; width: 100%; }
    </style>
  </head>
  <body>
    <?php 

        $latitude = $_POST['latitude_tar']; 
        $longitude = $_POST['longitude_tar'];

    ?>
    <div id="map"></div>
    <script type="text/javascript">

      var map;
      function initMap() {
        
        var myLatLng = {lat: <?php echo $latitude;?>, lng: <?php echo $longitude; ?>};//{lat: 40.435176, lng: -79.78778};
        
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: <?php echo $latitude;?>, lng: <?php echo $longitude; ?>},
          zoom: 18
        });

        // Create a marker and set its position.
              var marker = new google.maps.Marker({
                map: map,
                position: myLatLng,
                title: 'Hello World!'
              });
      }

    </script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIztbJw&callback=initMap">
    </script>
  </body>
</html>