<?php
session_destroy();
$alert = '<script type="text/javascript">';
$alert .= 'alert("Logedout Successfully!!");';
$alert .= 'window.location.href="../admin/index.php";';
$alert .= '</script>';
echo $alert;
exit();
