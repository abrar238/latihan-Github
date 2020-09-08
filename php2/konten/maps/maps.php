<script type="text/javascript">
<script async defer
         src="https://maps.googleapis.com/maps/api/js?key=YourAPIkey">
</script>
<script type="text/javascript">
    var marker;
    function initialize(){
        var infoWindow = new google.maps.infoWindow;

        var mapOptions={
            mapTypeld:google.maps.mapTypeld.ROADMAP
        }
        var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
        var bounds =  new google.maps.LatLngBounds();

        <?php 
        $query=mysqli_query("SELECT*FROM maps");
        while ($data=mysqli_fetch_array($query)){
            $nama = $data['nama_provinsi'];
            $lat = $data['latitude'];
            $lon = $data['longitude'];
            echo ("addMarker($lat,$lon,$nama);\n");
        }
         ?>

         function addMarker(lat,lng, info){
            var lokasi = new google.maps.LatLang(lat,lng);
            bounds.extend(lokasi);
            var marker = new google.maps.Marker({
                map:map,
                position: lokasi
            });
            map.fitBounds(bounds);
            bindInfoWindow(marker,map,infoWindow,info);
         }

         function bindInfoWindow(marker, map, infoWindow, html){
            google.maps.event.addListener(marker,'click', function(){
                infoWindow.setContent(hmtl);
                infoWindow.open(map,marker);
            })
         }
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<div id='map-canvas' class="col-sm-6" style="height: 300px"></div>