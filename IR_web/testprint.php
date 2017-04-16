<?php

	 	$term = $_POST['base64'];
        $language = $_POST['language']; 
        $a = $_POST['querytext']; 
        $latitude = $_POST['latitude']; 
        $longitude = $_POST['longitude'];
        $sort = $_POST['sort']; // if no sort then null
        $values = $_POST['tagTerm']; // values hidden split
        $TorF = $_POST['TorF'];

echo "term: ".$term."<BR><BR><BR>";
echo "language: ".$language."<BR>";
echo "term: ".$a."<BR>";
echo "latitude: ".$latitude."<BR>";
echo "longitude: ".$longitude."<BR>";
echo "sort: ".$sort."<BR>";
echo "values: ".$values."<BR>";
echo "TorF: ".$TorF."<BR>";

include_once("recordToWord.php");

echo $a;
?>