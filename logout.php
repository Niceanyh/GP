<?php
session_start();
session_destroy();
echo '<html><head><Script Language="JavaScript">alert("Logout successfully!");</Script></head></html>'.
 "<meta http-equiv=\"refresh\" content=\"0;url=index.php\">";//redirect to register.html
 ?>
