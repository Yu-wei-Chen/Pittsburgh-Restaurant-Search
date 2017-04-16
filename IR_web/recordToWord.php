<?php


//$upload = file_get_contents("t1.wav"); // need translate file test3.wav
//$upload = base64_encode($upload);

// Translate API function
include('GoogleTranslateAPI.php');

// Get POST data
//$term = $_POST['base64'];
//$language = $_POST['language'];

// get true base64 data
$term1 = explode("base64,", $term);
$upload = $term1[1];

// Post to Google Speech API with Google API key
$url_send ="https://speech.googleapis.com/v1beta1/speech:syncrecognize?key=AIzVgt4"; 


function setData($language,$upload){
  // Set parameter of Google Speech API
  $data = array(
      "config" => array(
          "encoding" => "LINEAR16",
          "languageCode" => $language,
          "sampleRate" => 48000 // for mobile 48000 for web 44100
      ),
     "audio" => array(
          "content" => $upload //base64_encode(file_get_contents('test1.wav')) //base64_encode($filedata)
      )
  );

  $data2 = json_encode($data);
  $str_data = $data2;
  return $str_data;
}


function sendPostData($url, $post){
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
  curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
  $result = curl_exec($ch);
  curl_close($ch);  

  // json decode
  $text_json = json_decode($result,true);

  // get translate word
  $text_fin = $text_json['results'][0]['alternatives'][0]['transcript'];
  
  return $text_fin;
}
  
//echo $language."<BR>";

// decide English or Chinese
if ($language == "en"){
  $language = "en-US";

  // call function
  $data_API = setData($language,$upload);
  $text = sendPostData($url_send, $data_API);

}else{
  $language = "cmn-Hans-CN";

  // call function
  $data_API = setData($language,$upload);
  $text1 = sendPostData($url_send, $data_API);
  $text = GetTranslate($text1);
}

  // print out
  //echo "<BR>".$text;

$a = $text;

//include_once('yelp_0407.php');




?>
