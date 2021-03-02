<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM l2group where l2id='$id'";
    if (mysqli_query($con, $sql)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("Delete Successfully!!");';
        $alert .= 'window.location.href="?page=category&function=managel2group";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Failed==" . $sql . "<br>" . mysqli_error($con);
    }
}
mysqli_close($con);
