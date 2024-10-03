<?php

function processUploadedFile($filename)
{
	// directory where the file is going to be placed
	$target_dir = "./upload/";

	// server path of the file to be uploaded
	$target_file = $target_dir.basename($_FILES[$filename]["name"]);
    var_dump($target_file);

	$uploadOk = true;
	// Check if file already exists on the server
	if (file_exists($target_file))
	{
		echo "<div>Sorry, file already exists. No upload was done.</div>";
		$uploadOk = false;
	}

	// Check file size
	if ($_FILES[$filename]["size"] > 500000) 
	{
		echo "<div>Sorry, your file is too large.</div>";
		$uploadOk = false;
	}

	// file extension (in lower case)
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	// check file extension 
	// let's say : only PDF and JPG files are authorized 
	$filetypeok_a = array( "pdf", "jpg" );
	if( ! in_array( $imageFileType, $filetypeok_a ))
	{
		echo "<div>Sorry, only PDF or JPG files are allowed.</div>";
		$uploadOk = false;
	}

	// Check if image file is a actual image or fake image
	/*
	$check = getimagesize($_FILES[$filename]["tmp_name"]);
	if( ! $check) 
	{
		echo "File is not an image, it's another unwanted stuff.</div>";
		$uploadOk = false;
	} */

	// Check if $uploadOk is set to 0 by an error
	if( ! $uploadOk ) 
	{
	  echo "<div>Sorry, your file was not uploaded.</div>";
	  exit;
	}

	// HERE everything is ok, try to upload file
	$check = move_uploaded_file($_FILES[$filename]["tmp_name"], $target_file);

	if($check) 
	{
		echo "<div>The file ". htmlspecialchars( basename( $_FILES[$filename]["name"])). " has been uploaded.</div>";
	} 
	else 
	{
		echo "<div>Sorry, there was an error uploading your file.</div>";
	}

	echo "<div>script completed</div>";
	
	return $target_file;
}
	
?>
<html>
<head>
	<meta charset="UTF-8" /> 
</head>
<body>
<h1>Running the script to manage the file</h1>
<pre>
<?php
var_dump($_POST);
var_dump($_FILES);
?>
</pre>
<?php
// check if button was pressed
if( ! isset($_POST["submit"])) 
{
	echo "<div>button submit not pressed, no image uploaded</div>".
	exit;
}

// $file1 = processUploadedFile("imgToUpload");
$file2 = processUploadedFile("fileToUpload");

?>
<h1>Displaying the uploaded file</h1>

<div><a href="<?=$file2?>" target="_blank">Click here to see the uploaded file</a></div>

</body>
</html>