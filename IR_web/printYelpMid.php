<?php

// print result for test 
for ($j = 0; $j<$num;$j++){ 
  //echo $address[$j]."<BR>".$city[$j]."<BR>".$state[$j]."<BR>".$url[$j]."<BR>".$categories[$j]."<BR>".$latitude1[$j]."<BR>".$longitude1[$j]."<BR>".$price[$j]."<BR>".$image_url[$j]."<BR>".$rating[$j]."<BR>".$name[$j]."<BR>".$phone[$j]."<BR>".$mile[$j]."<BR>"."<BR>"."<BR>";
  //echo $address[$j]."<BR>".$city[$j]."<BR>".$state[$j]."<BR>".$url[$j]."<BR>".."<BR>".$latitude1[$j]."<BR>".$longitude1[$j];
	
  	if ($rating[$j]=="1.5"){
  		$rating_pic = "images/1.5.jpg";
  	}elseif ($rating[$j]=="2.5") {
  		$rating_pic = "images/2.5.jpg";
  	}elseif ($rating[$j]=="3.5") {
  		$rating_pic = "images/3.5.jpg";
  	}elseif ($rating[$j]=="4.5") {
  		$rating_pic = "images/4.5.jpg";
  	}elseif ($rating[$j]=="5") {
  		$rating_pic = "images/5.jpg";
  	}elseif ($rating[$j]=="3") {
  		$rating_pic = "images/3.jpg";
  	}elseif ($rating[$j]=="4") {
  		$rating_pic = "images/4.jpg";
  	}else{
  		$rating_pic = "images/4.jpg";
  	}
  	//echo $rating_pic."<BR>";

  	if ($price[$j]=="$$$$"){
  		$price_pic = "images/price4.jpg";
  	}elseif ($price[$j]=="$$$") {
  		$price_pic = "images/price3.jpg";
  	}elseif ($price[$j]=="$$") {
  		$price_pic = "images/price2.jpg";
  	}else{
  		$price_pic = "images/price1.jpg";
  	}

  	//echo $price_pic."<BR>";


	echo "<!--search item 2-->";
		echo "<div class=\"itemA\">";
		    echo "<div class=\"item_left\">";
		    	echo "<img src=".$image_url[$j]." style=\"width: 100%; height: 100%;\"/>";
		    echo "</div>";
		    
		    echo "<div class=\"item_discription\">";
		    	echo "<div class=\"item_discription_name\">";
		    		echo $name[$j];
		    	echo "</div>";
		    	echo "<div class=\"item_discription_Ranking\"><img src=\"";
		    		echo $rating_pic;
		    	echo "\"/></div>";
		   		echo "<div class=\"item_discription_price\"><img src=\"";
		   			echo $price_pic;
		   		echo "\"/></div>";
		    	echo "<div class=\"item_discription_category\">";
		    		echo $categories[$j];
		    	echo"</div>";
		    echo "</div>";
		    echo "<div class=\"item_right\">";
		    	echo "<div class=\"item_right_phone\"><img src=\"images/phone.jpg\"/>";
		    		//echo $phone[$j];
		    	echo "</div>";
		    	echo "<div class=\"item_right_map\">";//<img src=\"images/map.jpg\"/>
		    		echo number_format($mile[$j]/1609, 2)."<BR>miles";
		    	echo "</div>";
	    echo "</div>";
    echo "</div>";



}




?>