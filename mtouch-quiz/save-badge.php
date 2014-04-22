<?php
if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' ); 

//load the directory $plug_dir_path =  $GLOBALS['wpframe_plugin_folder'];
//Writes the badge image to the server $dir_target = $plug_dir_path."/images/badges/"; 




$allowedExts = array("jpg", "jpeg", "gif", "png");
$extension = end(explode(".", $_FILES["file"]["name"]));
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 20000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    //echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    //echo "Type: " . $_FILES["file"]["type"] . "<br />";
    //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists($dir_target . $_FILES["file"]["name"]))
      {
      //echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      $upload_overrides = array('test_form' => false);
      $uploaded_file = wp_handle_upload($_FILES["file"], $upload_overrides);
      //echo "Stored in: " . $uploaded_file["file"];
      //echo "Stored in for public: " . $uploaded_file["url"];
      }
    }
  }
else
  {
  echo "Invalid file";
  }
  
  ?>
  