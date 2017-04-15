<?php

	 	$term = $_POST['base64'];
        $language = $_POST['language']; 
        $a = $_POST['querytext']; 
        $latitude = $_POST['latitude']; 
        $longitude = $_POST['longitude'];
        $sort = $_POST['sort']; // if no sort then null
        $values = $_POST['tagTerm']; // values hidden split
        $TorF = $_POST['TorF'];

echo $term."<BR><BR><BR>";
echo $language."<BR>";
echo $a."<BR>";
echo $latitude."<BR>";
echo $longitude."<BR>";
echo $sort."<BR>";
echo $values."<BR>";
echo $TorF."<BR>";

include_once("recordToWord.php");

echo $a;
?>