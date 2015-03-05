<?php
// Gets Max ID
function getMaxID($filename)
{
	$theFile = fopen($filename, "r");
	$idArr = array();
	$lineFromFile = fgets($theFile);
	while(!feof($theFile)) {
		list($id, $quote) = explode("#", $lineFromFile);
		$idArr[] = $id;
		$lineFromFile = fgets($theFile);
	}
	fclose($theFile);
	$maxID = max($idArr);
	return $maxID;
}

// Reads from $filename to get a quote
function getQuote($getID, $filename)
{
	$theFile = fopen($filename, "r");
	$line = fgets($theFile);
	while(!feof($theFile)) {
		list($id, $quote) = explode("#", $line);
		if($id == $getID) {
			fclose($theFile);
			return $quote;
		}
		$line = fgets($theFile);
	}
	fclose($theFile);
}

	// Set the filename to read from
	// Randomly chooses a number between 1 and the highest ID in quotes.txt
	// then prints it.
	$filename 	= "quotes.txt";
	$minID 		= "1";
	$maxID 		= getMaxID($filename);
	$id			= rand($minID, $maxID);
	$quote		= getQuote($id, $filename);
	echo $quote;
?>
