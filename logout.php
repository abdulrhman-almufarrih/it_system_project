<?php
session_start();
session_unset();
session_destroy();
header("Location: it_sign_in.php");
exit();
?>