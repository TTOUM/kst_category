<?php
$sql = "SELECT*FROM businessunit";
$query = mysqli_query($con, $sql);


if (isset($_POST['submit'])) {
    if (!empty($_POST['business'])) {
        $selected = $_POST['business'];
        $businessname = $_POST['businessname'];
        $sql_insert = "INSERT INTO l2group(l2id,businessid,l2groupname)
        VALUES('','$selected','$businessname')";
        $query_inser = mysqli_query($con, $sql_insert);
        if ($query_inser > 0) {
            $alert = '<script type="text/javascript">';
            $alert .= 'alert("Added Successfully!!");';
            $alert .= 'window.location.href="?page=category&function=managel2group";';
            $alert .= '</script>';
            echo $alert;
            exit();
        }
    } else {
        echo 'Please select the value.';
    }
}



mysqli_close($con);
?>
<h1 class="app-page-title">Add Product Category</h1>
<hr class="mb-4" />
<div class="row g-4 settings-section">
    <div class="col-12 col-md-12">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <form method="post">
                    <div class="mb-2 col-lg-6">
                        <label class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="businessname" required />
                    </div>

                    <div> <label class="form-label">Business Unit</label></div>
                    <div class="form-floating col-lg-6  mb-2">
                        <div class="select-block">
                            <select name="business" class="form-select">
                                <option value="" disabled selected>Choose Unit</option>
                                <?php
                                while ($row = $query->fetch_assoc()) {
                                    $name = $row['businessunit'];
                                    $id = $row['businessid'];
                                    echo "<option value='$id'>$name</option>";
                                }
                                ?>

                            </select>
                        </div>
                    </div>
                    <input type="submit" name="submit" valaue="Choose options">
                </form>
            </div>
            <!--//app-card-body-->
        </div>
        <!--//app-card-->
    </div>
</div>