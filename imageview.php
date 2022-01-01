<html>
<head>
<title>Image Upload and Display Images under Directory</title>
</head>
<body>
    <h1>Image Upload and Display Images under Directory</h1>
    <div class="upload">
<form action="imageview.php" enctype="multipart/form-data" method="post">
Select image :
<input type="file" name="file"><br/>
<input type="submit" value="Upload" name="Submitimage"> <br/>
</form>
<?php
if(isset($_POST['Submitimage']))
{ 
$filepath = "images/" . $_FILES["file"]["name"];
$file_type = $_FILES['file']['type']; //returns the mimetype

$allowed = array("image/jpeg", "image/gif", "image/png", "image/jpg");
if(!in_array($file_type, $allowed)) {
  
echo "Only Image format allowed.";

  exit();

}
if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath)) 
{
    echo "Successfully Uploaded Image";
} 
else 
{
echo "Error in Handling File";
}
} 
unset($_FILES['file']);
?>
    </div>
    <div class="display">
   <?php
$dirname = "images/";
$images = glob($dirname."*.{jpg,gif,png}",GLOB_BRACE);

foreach($images as $image) {
    echo '<img src="'.$image.'" height="200px" width="auto" /><br><br>';
}
//https://yoganatech.in/
//vivekpandiaraj
?>
    </div>
</body>
</html>