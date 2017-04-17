
<?php
//$a=$_POST['Find']; // query term (the query after speech and translate)
/*
$a=$_POST['querytext']; 
$latitude=$_POST['latitude']; 
$longitude=$_POST['longitude'];
$sort =$_POST['sort']; // if no sort then null
$values =$_POST['tagTerm']; // values hidden split
*/
echo $values1;

// query post to yelp
$yelpURL1 = "term=".$a."&categories".$values1."&latitude=".$latitude."&longitude=".$longitude."&limit=50";
$yelpURL2 = "term=".$a."&categories".$values1."&location=Pittsburgh"."&limit=50";
    
// prevent lat & long did'nt pass to php
if ($latitude==null||$longitude==null){
  $url = "https://api.yelp.com/v3/businesses/search?".$yelpURL2;
}else{
  $url = "https://api.yelp.com/v3/businesses/search?".$yelpURL1;
}


function GetValue($url){
  $ch = curl_init($url);
  //curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  //curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer 2CZXLHGWHYx')); // Yelp token
  $result = curl_exec($ch);
  curl_close($ch);  
  return $result;
}

// call GetValue function
$result_yelp = GetValue($url);


$de_json1 = json_decode($result_yelp,true);

$total = $de_json1['total'];

// prevent more than 50 error
if($total>=50){
  $num =50;
}
else{
  $num = $total;
}

//正常顺序
for ($i = 0; $i <$num; $i++){

$address[$i] = $de_json1['businesses'][$i]['location']['address1'];
$city[$i] = $de_json1['businesses'][$i]['location']['city'];
$state[$i] = $de_json1['businesses'][$i]['location']['state'];
$url[$i] = $de_json1['businesses'][$i]['url'];
$categories[$i] = $de_json1['businesses'][$i]['categories'][0]['alias'];
$latitude1[$i] = $de_json1['businesses'][$i]['coordinates']['latitude'];
$longitude1[$i] = $de_json1['businesses'][$i]['coordinates']['longitude'];
$price[$i] = $de_json1['businesses'][$i]['price'];
$image_url[$i] = $de_json1['businesses'][$i]['image_url'];
$rating[$i] = $de_json1['businesses'][$i]['rating'];
$name[$i] = $de_json1['businesses'][$i]['name'];
$phone[$i] = $de_json1['businesses'][$i]['phone'];
$mile[$i] = $de_json1['businesses'][$i]['distance'];

}

// test the search result 
/*if($a!==null){
	for ($j = 0; $j<$num;$j++){ //正常顺序
	echo $address[$j]."<BR>".$city[$j]."<BR>".$state[$j]."<BR>".$url[$j]."<BR>".$categories[$j]."<BR>".$latitude[$j]."<BR>".$longitude[$j]."<BR>".$price[$j]."<BR>".$image_url	[$j]."<BR>".$rating[$j]."<BR>".$name[$j]."<BR>".$phone[$j]."<BR>".$mile[$j]."<BR>"."<BR>"."<BR>";
		}
	}*/

// change sort type
if ($sort== "mile"){//按距离排序
	$type = $mile;
	asort($type);
}
elseif ($sort=="price"){//按钱排序
	$type = $price;
	asort($type);
}
elseif ($sort=="rating"){//按rating排序
	$type = $rating;
	arsort($type);
}
else{ //正常排序
	$type = $address;
}


$m=0;
foreach($type as $key=>$value){
	if($m<$num){
		$arr[$m]=$key;
	}
	else{
		break;
	}
	$m++;
}

// 按if条件重新排序
for ($i = 0; $i <$num; $i++){

  $address[$i] = $de_json1['businesses'][$arr[$i]]['location']['address1'];
  $city[$i] = $de_json1['businesses'][$arr[$i]]['location']['city'];
  $state[$i] = $de_json1['businesses'][$arr[$i]]['location']['state'];
  $url[$i] = $de_json1['businesses'][$arr[$i]]['url'];
  $categories[$i] = $de_json1['businesses'][$arr[$i]]['categories'][0]['alias'];
  $latitude1[$i] = $de_json1['businesses'][$arr[$i]]['coordinates']['latitude'];
  $longitude1[$i] = $de_json1['businesses'][$arr[$i]]['coordinates']['longitude'];
  $price[$i] = $de_json1['businesses'][$arr[$i]]['price'];
  $image_url[$i] = $de_json1['businesses'][$arr[$i]]['image_url'];
  $rating[$i] = $de_json1['businesses'][$arr[$i]]['rating'];
  $name[$i] = $de_json1['businesses'][$arr[$i]]['name'];
  $phone[$i] = $de_json1['businesses'][$arr[$i]]['phone'];
  $mile[$i] = $de_json1['businesses'][$arr[$i]]['distance'];

}

/*
// print result for test 
for ($j = 0; $j<$num;$j++){ 
  echo $address[$j]."<BR>".$city[$j]."<BR>".$state[$j]."<BR>".$url[$j]."<BR>".$categories[$j]."<BR>".$latitude[$j]."<BR>".$longitude[$j]."<BR>".$price[$j]."<BR>".$image_url[$j]."<BR>".$rating[$j]."<BR>".$name[$j]."<BR>".$phone[$j]."<BR>".$mile[$j]."<BR>"."<BR>"."<BR>";
}
*/

// split hidden tag value
$arr1 = explode(",",$values);

// find top 4 category
$ary=array_count_values($categories);//统计数组中所有的值出现的次数
//print_r($ary);
arsort($ary);//倒序排序
$i=0;
foreach($ary as $key=>$value){

    if($i<=7){ // get top 8 category
        $top[$i]= $key;
      //printf("%s 共出现 %d 次<br/>",$key,$value);
    }else{
        break;
    }
    $i++;
}

// delete already select tag
$result=array_diff($top,$arr1);
//print_r($top)."<BR>".print_r($arr1);
//print_r($result);

//echo "<BR>";

// get top 4 tag
$p = 0;
$q = 0;
while ($p<=3) {
  if ($result[$q]!=null){
    $tag_final4[$p] = $result[$q];
    $p++;
  }
  $q++;
}

// print final 4 tag 
//print_r($tag_final4);

//print_r ($arr1);


?>