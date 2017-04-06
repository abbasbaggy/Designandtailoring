<?php
/**
 * Created by PhpStorm.
 * User: Abbas
 * Date: 4/6/2017
 * Time: 2:37 PM
 */
if (($_FILES['file']['name']!="")){
// Where the file is going to be stored
    $target_dir = "upload/";
    $file = $_FILES['file']['name'];
    $path = pathinfo($file);
    $filename = $path['filename'];
    $ext = $path['extension'];
    $temp_name = $_FILES['file']['tmp_name'];
    $path_filename_ext = $target_dir.$filename.".".$ext;

// Check if file already exists
    if (file_exists($path_filename_ext)) {
        echo "Sorry, file already exists.";
    }else{
        move_uploaded_file($temp_name,$path_filename_ext);
        echo "Congratulations! File Uploaded Successfully.";
    }
}

?>
<html>
<head>
<title>Check File Size & Extension Before Uploading Using jQuery</title>
</head>
<body>

<form name="form" method="post" action="" enctype="multipart/form-data" >
<p>
<label>Upload Picture:</label></td>
<input type="file" name="file" id="picture" required />
</p>
<p id="error1" style="display:none; color:#FF0000;">
    Invalid Image Format! Image Format Must Be JPG, JPEG, PNG or GIF.
</p>
<p id="error2" style="display:none; color:#FF0000;">
    Maximum File Size Limit is 1MB.
</p>
<p>
<input name="submit" type="submit" value="Submit" id="submit" />

</p>
</form>


<a href="http://www.allphptricks.com/check-file-size-extension-uploading-using-jquery/">Tutorial Link</a> <br /><br />
For More Web Development Tutorials Visit: <a href="http://www.allphptricks.com/">AllPHPTricks.com</a>

<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>
<script>
$('input[type="submit"]').prop("disabled", true);
var a=0;
//binds to onchange event of your input field
$('#picture').bind('change', function() {
    if ($('input:submit').attr('disabled',false)){
        $('input:submit').attr('disabled',true);
    }
    var ext = $('#picture').val().split('.').pop().toLowerCase();
    if ($.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
        $('#error1').slideDown("slow");
        $('#error2').slideUp("slow");
        a=0;
    }else{
        var picsize = (this.files[0].size);
        if (picsize > 1000000){
            $('#error2').slideDown("slow");
            a=0;
        }else{
            a=1;
            $('#error2').slideUp("slow");
        }
        $('#error1').slideUp("slow");
        if (a==1){
            $('input:submit').attr('disabled',false);
        }
    }
});
</script>
</body>
</html>