<!DOCTYPE html>
<html>

<head>
    <title>SERP DATA</title>
    <link rel="stylesheet" href="sty.css">
</head>

<body>
    <div id="menu">
            <a href="index.php"><img src="home.png" width="50px"></a>    
            </div>
            <br>


    <font size="7"><p align="center">ADD A WEBSITE</p></font>
    <form action="" method="POST" enctype="multipart/form-data">
        <table border="0" width="75%" align="center" cellspacing="10">
            <tr>
                <td>Website Title</td>
                <td><input type="text" name="websitetitle"></td>
            </tr>
            <tr>
                <td>Website Link</td>
                <td><input type="text" name="websitelink"></td>
            </tr>
            <tr>
                <td>Website Keywords</td>
                <td><input type="text" name="websitekeywords"></td>
            </tr>
            <tr>
                <td>Website Description</td>
                <td><textarea name="websitedescription" id="desc"></textarea>
                </td>
            </tr>
            <tr>
                <td>Website Images</td>
                <td><input type="file" name="uploadfile"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="addwebsite" id="addbtn"> &nbsp;
                    <input type="reset" name="addwebsite" id="cancelbtn">
                </td>
            </tr>

        </table>

    </form>
</body>

</html>

<?php
include("connection.php");
if ($_POST['addwebsite']) 
{
    $website_title = $_POST['websitetitle'];
    $website_link = $_POST['websitelink'];
    $website_keywords = $_POST['websitekeywords'];
    $website_description = $_POST['websitedescription'];
    $filename=$_FILES["uploadfile"]["name"];
    $tempname=$_FILES["uploadfile"]["tmp_name"];
    $folder="website_images/".$filename;
    move_uploaded_file($tempname,$folder);

    if ($website_title!="" && $website_link!="" && $website_keywords!="" && $website_description!="" && $filename!="" ) 
    { 
        $query = "INSERT INTO add_website values ('$website_title','$website_link','$website_keywords','$website_description','$folder')";
        $data = mysqli_query($conn,$query);

        if ($data) 
        {
            echo "<script>alert('Website Inserted')</script>";
        }
    }
    else{
            echo "<script>alert('Failed')</script>";
        }
}
?>