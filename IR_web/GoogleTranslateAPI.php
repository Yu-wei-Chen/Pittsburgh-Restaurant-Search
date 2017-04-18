<?php

function GetTranslate($target,$fromlang){
	// decide translate en to zh or zh to en
	if ($fromlang == "en") {
		$url="https://translation.googleapis.com/language/translate/v2?key=AIzUY&source=en&target=zh-tw&q=".$target;
	}else{
		$url="https://translation.googleapis.com/language/translate/v2?key=AIzaSUY&source=zh-tw&target=en&q=".$target;
	}

	// GET url value (json)
	$text = file_get_contents($url);

	// json decode
	$text_json = json_decode($text,true);

	// get translate word
	$text_fin = $text_json['data']['translations'][0]['translatedText'];

	return $text_fin;
}

?>