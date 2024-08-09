<?php
$imei = 14512222709;
//$imei = $_REQUEST['imei'];
$conn = mysql_connect("localhost", "admin_root", "B1nt@ng") or die(mysql_error());
mysql_select_db("admin_bintang") or die(mysql_error());
?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Google Maps</title>
    <style type="text/css">
        body {
            font: normal 10pt Helvetica, Arial;
        }
        #map {
            width: 845px;
            height: 315px;
            border: 0;
            padding: 0;
        }
    </style>
    <!--
    <script src="http://maps.google.com/maps/api/js?key=xxxxxxxxxxxxxxx&sensor=false" type="text/javascript"></script>
    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3&sensor=false"></script>
    <script type="text/javascript">
        var icon = new google.maps.MarkerImage("http://etrakz.kpa.web.id/images/truck_red.png",
            new google.maps.Size(32, 32),
            new google.maps.Point(0, 0),
            new google.maps.Point(16, 32));
        var center = null;
        var map = null;
        var currentPopup;
        var bounds = new google.maps.LatLngBounds();
        function addmarker(lat, lng, info) {
            var pt = new google.maps.LatLng(lat, lng);
            bounds.extend(pt);

            var marker = new google.maps.Marker({
                position: pt,
                icon: icon,
                map: map
            });

            var popup = new google.maps.InfoWindow({
                content: info,
                maxWidth: 600
            });

            google.maps.event.addListener(marker, "click", function () {
                if (currentPopup != null) {
                    currentPopup.close();
                    currentPopup = null;
                }
                popup.open(map, marker);
                currentPopup = popup;
            });

            google.maps.event.addListener(popup, "closeclick", function () {
                map.panTo(center);
                currentPopup = null;
            });
        }
        function initMap() {
            var trafficLayer = new google.maps.TrafficLayer();
            map = new google.maps.Map(document.getElementById("map"), {
                center: new google.maps.LatLng(-6.30, 106.78),
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                mapTypeControl: true,
                mapTypeControlOptions: {
                    style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
                },
                navigationControl: true,
                navigationControlOptions: {
                    style: google.maps.NavigationControlStyle.ZOOM_PAN
                }
            });

            <?php
            $imei = $_REQUEST['imei'];
            echo "$imei";
						$query1 = mysql_query("select SQL_NO_CACHE * from perangkat where no_imei='$imei'");
						//echo "select * from perangkat where no_imei='$imei'";
						$row1 = mysql_fetch_array($query1);
						$query2 = mysql_query("select SQL_NO_CACHE * from data where no_imei='$row1[imei]'");
						//echo "select SQL_NO_CACHE * from data where no_imei='$row1[imei]'";
						
						/* $query = mysql_query("
            SELECT SQL_NO_CACHE
            B.vid as no_polisi,
            A.waktu,
            A.no_imei,
            A.alamat,
            A.kecepatan,
            A.lat AS lat,
            A.lng AS lng
            FROM
            master_mobil AS B
            INNER JOIN gps_data AS A ON A.no_imei=B.imei
            WHERE A.no_imei='".$_REQUEST['imei']."' ORDER BY A.waktu DESC LIMIT 0,1 ")or die(mysql_error()); */
            
						
						while($row2 = mysql_fetch_array($query2))
            {
              $no_polisi    = $row1['no_polisi'];
              $waktu        = $row2['waktu'];
              $lat          = $row2['lat'];
              $lon          = $row2['lng'];
              $kecepatan    = $row2['kecepatan'];
              $alamat       = $row2['alamat'];
              echo("addmarker($lat, $lon,
                '$no_polisi<br/>$waktu<br/>$kecepatan 'km/jam'<br/>$alamat');\n");
            }

            ?>
            center = bounds.getCenter();
            trafficLayer.setMap(map);
            //map.fitBounds(bounds);

        }
    </script>
</head>
<body onload="initMap()" style="margin:0px; border:0px; padding:0px;">
<div id="map"></div>
</body>
</html>