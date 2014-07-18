<?php



move_uploaded_file($GLOBALS['_FILES']['fileToUpload']['tmp_name'], $GLOBALS['_FILES']['fileToUpload']['name']);

echo $GLOBALS['_FILES']['fileToUpload']['name'];



?>