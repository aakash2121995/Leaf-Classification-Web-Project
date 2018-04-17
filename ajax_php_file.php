<?php
session_start();
if(isset($_FILES["file"]["type"]))
{
// echo $_FILES["file"]["size"] ;
$validextensions = array("jpeg", "jpg", "png");
$temporary = explode(".", $_FILES["file"]["name"]);
$file_extension = end($temporary);
if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
) && ($_FILES["file"]["size"] < 10000000)//Approx. 100kb files can be uploaded.
&& in_array($file_extension, $validextensions)) {
if ($_FILES["file"]["error"] > 0)
{
echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
}
else
{
if (file_exists("leaf Images/" . $_FILES["file"]["name"])) {
echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
}
else
{
$now = new DateTime();
$targetFile = "$_SESSION[id]_" .$now->getTimestamp();    // MySQL datetime format
$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
$targetPath = "leaf Images/$targetFile.$file_extension"; // Target path where file is to be stored
move_uploaded_file($sourcePath,$targetPath) ;
$_SESSION['image'] = $targetPath;
 // Moving Uploaded file
// echo "<script>alert('uploaded') </script>";
echo "<span id ='upload' class='success'>Image Uploaded Successfully !!</span><br/>";
// echo "<script>alert('uploaded')</script>";
echo "<span id='leaftext' class='success'>Analysing leaf features ...</span><br/>";
echo "<img id='leafload' src='http://www.chemgenhealthcare.com/images/loader.gif' width=100 height = 100>";
echo "<script src='classify.js'>
</script>";
}
}
}
else
{
// echo "<script>alert('error ')</script>";
echo "<span id='invalid'>***Invalid file Size or Type***<span>";
}
}
?>