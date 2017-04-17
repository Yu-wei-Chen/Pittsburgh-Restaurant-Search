<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<!--Wayne add -->
	<script src="src/recorder.js"></script>
	<script src="src/Fr.voice.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/app2.js"></script> <!--mobile: app.js / web: app2.js-->
<title>Pittsburgh Restaurant Search System</title>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Flat Search Box Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<!--Google Fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--Google Fonts-->
	<script>
		var ow;
		window.onload=function(){
		    ow = window.innerWidth;
		}

		window.onresize = function(){
		    var cw = window.innerWidth;
		    var left = ow - cw ;
		    var c = document.getElementsByTagName('body');
		  c.style.backgroundPositionX = -left;
		}
	</script>
</head>
<body>
<!--Wayne add -->
    <script type="text/javascript">

        if (navigator.geolocation) {

            // HTML5 定位抓取
            navigator.geolocation.getCurrentPosition(function(position) {
                    mapServiceProvider(position.coords.latitude, position.coords.longitude);
                },
                function(error) {
                    switch (error.code) {
                        case error.TIMEOUT:
                            //alert('連線逾時');
                            break;

                        case error.POSITION_UNAVAILABLE:
                            //alert('無法取得定位');
                            break;

                        case error.PERMISSION_DENIED://拒絕
                            //alert('想要參加本活動，\n記得允許手機的GPS定位功能喔!');
                            break;

                        case error.UNKNOWN_ERROR:
                            //alert('不明的錯誤，請稍候再試');
                            break;
                    }
                });

        } else { // 不支援 HTML5 定位

            // 若支援 Google Gears
            if (window.google && google.gears) {
                try {
                    // 嘗試以 Gears 取得定位
                    var geo = google.gears.factory.create('beta.geolocation');
                    geo.getCurrentPosition(successCallback,errorCallback, { enableHighAccuracy: true,gearsRequestAddress: true });
                } catch(e){
                    //alert("定位失敗請稍候再試");
                }
            }else{
                //alert("想要參加本活動，\n記得允許手機的GPS定位功能喔!");
            }
        }


        // 取得 Gears 定位發生錯誤
        function errorCallback(err) {
            var msg = 'Error retrieving your location: ' + err.message;
            alert(msg);
        }

        // 成功取得 Gears 定位
        function successCallback(p) {
            mapServiceProvider(p.latitude, p.longitude);
        }

        // 顯示經緯度
        function mapServiceProvider(latitude, longitude) {
            var element = document.getElementById("latitude");
            element.value = latitude;
            var element1 = document.getElementById("longitude");
            element1.value = longitude;
            //alert("經緯度：" + latitude + ", " + longitude);
            //location.href="yelp.php?latitude="+latitude;
            //location.href="yelp.php?longitude="+longitude;
        }

        function clic () {
            var check = document.getElementById("cb5");
            var setcheck = document.getElementById("language");

            if (check.checked == true) {
                //box.checked = false;
                //alert("zh");
                setcheck.value = "zh";
            }
            else if (check.checked == false) {
                //box.checked = true;
                setcheck.value = "en";
                //alert("en");
            }
        }

    </script>
<!--search start here-->
<div class="search">

	<div class="s-bar">
	      
	   	   <!--Wayne edit -->
           <form id="sampleForm" name="sampleForm" action="second.php" method="post">
		   <ul>
    		   <li class='tg-list-item'>
    			    <input class='tgl tgl-flip' id='cb5' type='checkbox' value="" onclick="clic()">
    			    <label class='tgl-btn' data-tg-off='English' data-tg-on='中文' for='cb5' ></label>
    		   </li>
		   </ul>
		   <br/><br/>
		   <!--Wayne add -->
	            <input type="hidden" name="latitude" id="latitude" value="" >
	            <input type="hidden" name="longitude" id="longitude" value="" >
	            <input type="hidden" name="tagTerm" id="tagTerm" value="" >
                <input type="hidden" name="TorF" id="TorF" value="T" > <!--Google speech API or not-->
                <input type="hidden" name="language" id="language" value="en" > <!--Google speech API or not-->
	            <input type="hidden" name="sort" value=""> <!-- mile, price, rating-->
	            <input type="hidden" name="base64" id="base64" value="" >
		   </form>
           <!--Wayne add -->
            <!--<button class="button recordButton" style="background-color: lightblue; width: 25%;height: 40% " id="record" >Record</button> -->
		   <input type="button" style="width: 50%" id="record" value="record"/>
		   <br/><br/><br/><br/>
		   
           <form id="sampleForm1" name="sampleForm1" action="second.php" method="post">
		   		<input type="text" name="querytext" id="querytext" value="hamburger" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search Template';}"> <!--Search Template-->
		   		<input type="hidden" name="latitude" id="latitude" value="" >
	            <input type="hidden" name="longitude" id="longitude" value="" >
	            <input type="hidden" name="tagTerm" id="tagTerm" value="" >
	            <input type="hidden" name="TorF" id="TorF" value="F" > 
	            <input type="hidden" name="sort" value=""> 
				<input type="submit"  value="Search"/>
		   </form>
        
	  
	</div>
</div>
</body>
</html>