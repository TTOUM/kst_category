<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM l3group where l3id='$id'";
    if (mysqli_query($con, $sql)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("Delete L3 Successfully!!");';
        $alert .= 'window.location.href="?page=category&function=managel3group";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Failed==" . $sql . "<br>" . mysqli_error($con);
    }
}
mysqli_close($con);
