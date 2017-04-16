<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
    <!--Wayne add -->
        <script src="src/recorder.js"></script>
        <script src="src/Fr.voice.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/app1.js"></script>
        <title>Pittsburgh Restaurant Search System</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="css12.css" />
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

        
        function sort_price() {
            
            var element2 = document.getElementById("sort");
            element2.value = "price";

            //alert(element2.value);
            
            document.forms["sampleForm1"].submit();
        }
        
        function tomap(lat_tar,long_tar) {
            
            var lat1 = document.getElementById("latitude_tar");
            var long1 = document.getElementById("longitude_tar");

            lat1.value = lat_tar;
            long1.value = long_tar;

            
            document.forms["sampleForm2"].submit();
        }
        
        function sort_distance() {
            
            var element2 = document.getElementById("sort");
            element2.value = "mile";

            //alert(element2.value);
            
            document.forms["sampleForm1"].submit();
        }
        
        function sort_rating() {
            
            var element2 = document.getElementById("sort");
            element2.value = "rating";

            //alert(element2.value);
            
            document.forms["sampleForm1"].submit();
        }

        
        function tag1() {
            
            var element2 = document.getElementById("sort");
            element2.value = "";
            
            var element3 = document.getElementById("tagTerm");
            var element4 = document.getElementById("tag1");
            element3.value = element3.value+","+element4.value;

            //alert(element2.value);
            
            document.forms["sampleForm1"].submit();
        }

        
        function tag2() {
            
            var element2 = document.getElementById("sort");
            element2.value = "";
            
            var element3 = document.getElementById("tagTerm");
            var element4 = document.getElementById("tag2");
            element3.value = element3.value+","+element4.value;

            //alert(element2.value);
            
            document.forms["sampleForm1"].submit();
        }

        
        function tag3() {
            
            var element2 = document.getElementById("sort");
            element2.value = "";
            
            var element3 = document.getElementById("tagTerm");
            var element4 = document.getElementById("tag3");
            element3.value = element3.value+","+element4.value;

            //alert(element2.value);
            
            document.forms["sampleForm1"].submit();
        }

        
        function tag4() {
            
            var element2 = document.getElementById("sort");
            element2.value = "";
            
            var element3 = document.getElementById("tagTerm");
            var element4 = document.getElementById("tag4");
            element3.value = element3.value+","+element4.value;

            //alert(element2.value);
            
            document.forms["sampleForm1"].submit();
        }
        
        function submitsearch() {
            
            var element2 = document.getElementById("sort");
            element2.value = "";
            
            var element3 = document.getElementById("tagTerm");
            element3.value = "";
            
            //var element4 = document.getElementById("sampleForm1");
            //element4.action = "testprint.php";

            //alert(element2.value+"/"+element3.value);
            
            document.forms["sampleForm1"].submit();
        }
        

    </script>
        <?php 

        $term = $_POST['base64'];
        $language = $_POST['language']; 
        $a = $_POST['querytext']; 
        $latitude = $_POST['latitude']; 
        $longitude = $_POST['longitude'];
        $sort = $_POST['sort']; // if no sort then null
        $values = $_POST['tagTerm']; // values hidden split
        $TorF = $_POST['TorF'];

        if ($TorF == "T") {
            include_once("recordToWord.php"); 
        }

        $cate_size = 0-(strlen($values)-1);

        $values1 = substr($values,$cate_size);


        include_once("yelp_0407.php"); 



        ?>
        <div class="top_tag">
            <!--<span><input type="text"></span>-->
            <!--text-->
            <!--<div class="top_text"><input type="text" style="width: 60%; height: 60%;"></div>-->
            
            <!--price, distance, rating sorting-->
            <div class="top_sorting">
                <div class="top_sorting_price">
                    <input type="button" value="price" id="price" name="price" onclick="sort_price()" style="width: 100%; height: 90%;" >
                </div>
                <div class="top_sorting_distance">
                    <input type="button" value="distance" name="distance" onclick="sort_distance()" style="width: 100%; height: 90%;" >
                </div>
                <div class="top_sorting_rating">
                    <input type="button" value="rating" name="rating" onclick="sort_rating()" style="width: 100%; height: 90%;" >
                </div>
            
            </div>
            
            <!--four tag list-->
            <div class="tagul">
                
                
                <div class="tagul_list1">
                    <input type="button" id="tag1" value="<?php echo $tag_final4[0]; ?>" name="t1" style="width: 100%; height: 100%;" onclick="tag1()">
                </div>
                <div class="tagul_list2">
                    <input type="button" id="tag2" value="<?php echo $tag_final4[1]; ?>" name="t2" style="width: 100%; height: 100%;" onclick="tag2()">
                </div>
                <div class="tagul_list3">
                    <input type="button" id="tag3" value="<?php echo $tag_final4[2]; ?>" name="t3" style="width: 100%; height: 100%;" onclick="tag3()">
                </div>
                <div class="tagul_list4">
                    <input type="button" id="tag4" value="<?php echo $tag_final4[3]; ?>" name="t4" style="width: 100%; height: 100%;" onclick="tag4()">
                </div>
            </div>
        </div>
        
        <span class="blank" style="height:12%;"></span>
        <!--search result list-->
        <div class="result">
            
            <!--search item 1-->
        <!--<div class="itemA">
                <div class="item_left"><img src="images/jielan.jpg" style="width: 100%; height: 100%;"/></div>
                <div class="item_discription">
                    <div class="item_discription_name">Name Name Name Name Name Name Name Name Name Name Name </div>
                    <div class="item_discription_Ranking"><img src="images/1.5.jpg"/></div>
                    <div class="item_discription_price"><img src="images/price3.jpg"/></div>
                    <div class="item_discription_category">Category</div>
                </div>
                <div class="item_right">
                    <div class="item_right_phone"><img src="images/phone.jpg"/></div>
                    <div class="item_right_map"><img src="images/map.jpg"/></div>
                </div>
           
                
            </div>
            <!--search item 2-->
        <!--<div class="itemA">
                <div class="item_left"><img src="jielan.jpg" style="width: 100%; height: 100%;"/></div>
                <div class="item_discription">
                    <div class="item_discription_name">Name</div>
                    <div class="item_discription_Ranking"><img src="3.jpg"/></div>
                    <div class="item_discription_price"><img src="price2.jpg"/></div>
                    <div class="item_discription_category">Category</div>
                </div>
                <div class="item_right">
                    <div class="item_right_phone"><img src="phone.jpg"/></div>
                    <div class="item_right_map"><img src="map.jpg"/></div>
                </div>
                
            </div>-->

            
            <!--search item from yelp-->
            <?php include_once("printYelpMid.php"); ?>

           
        </div>
        <span class="blank" style="height:6%;"></span>
        
        <div class="bottom">
            <!--Wayne edit -->
            <form id="sampleForm1" name="sampleForm1" action="second.php" method="post">
                <div class="bottom_text">
                    <input type="text" style="width: 98%; height: 45%;" name="querytext" id="querytext" value="<?php echo $a; ?>">
                    <input type="button" value="search" id="searchbutton" name="r1" style="width: 100%; height: 50%;" onclick="submitsearch()">
                </div>
                <input type="hidden" name="latitude" id="latitude" value="<?php echo $latitude ?>" >
                <input type="hidden" name="longitude" id="longitude" value="<?php echo $longitude ?>" >
                <input type="hidden" name="tagTerm" id="tagTerm" value="<?php echo $values ?>" >
                <input type="hidden" name="TorF" id="TorF" value="F" > <!--Google speech API or not-->
                <input type="hidden" name="sort" id="sort" value="<?php echo $sort ?>"> <!-- mile, price, rating-->
            </form> 
            <!--Wayne edit -->
            <form id="sampleForm" name="sampleForm" action="second.php" method="post">                            
                <div class="bottom_language">
                    <select name="language" id="language" class="language">  
                        <!--<option value="Language">Language</option>-->  
                        <option value="en">English</option> 
                        <option value="zh">中文</option>   
                    </select>
                </div>
                <div class="bottom_recorder">
                    <input type="button" value="recorder" id="record" name="r1" style="width: 100%; height: 100%;" >
                </div>
                <!--Wayne add -->
                <input type="hidden" name="latitude" id="latitude" value="<?php echo $latitude ?>" >
                <input type="hidden" name="longitude" id="longitude" value="<?php echo $longitude ?>" >
                <input type="hidden" name="tagTerm" id="tagTerm" value="<?php echo $values ?>" >
                <input type="hidden" name="TorF" id="TorF" value="T" > <!--Google speech API or not-->
                <!--<input type="hidden" name="language" value="en" > Google speech API or not-->
                <input type="hidden" name="sort" id="sort" value="<?php echo $sort ?>"> <!-- mile, price, rating-->
                <input type="hidden" name="base64" id="base64" value="" >
           </form>
           <form id="sampleForm2" name="sampleForm2" action="GoogleMapAPI.php" method="post">   
                <!--Wayne add -->
                <input type="hidden" name="latitude_tar" id="latitude_tar" value="" >
                <input type="hidden" name="longitude_tar" id="longitude_tar" value="" >
           </form>
        </div>
    </body>
</html>
