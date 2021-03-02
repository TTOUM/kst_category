<?php
$sql = "SELECT*FROM l2group";
$query_l2 = mysqli_query($con, $sql);

if (isset($_POST['submit'])) {
    if (!empty($_POST['l2group'])) {
        $selected = $_POST['l2group'];
        $cateUnitname = $_POST['cateUniname'];




        $sql_insert = "INSERT INTO l3group (l3id,l2id,l3groupname)
        VALUES('','$selected','$cateUnitname')";
        $sql_insert = mysqli_query($con, $sql_insert);
        if ($sql_insert > 0) {
            $alert = '<script type="text/javascript">';
            $alert .= 'alert("Insert Successfully!!");';
            $alert .= 'window.location.href="?page=category&function=managel3group";';
            $alert .= '</script>';
            echo $alert;
            exit();
        } else {
            echo "Failed==" . $sql_update . "<br>" . mysqli_error($con);
        }
    } else {
        echo 'Please select the value.';
    }
}




mysqli_close($con);
?>
<h1 class="app-page-title">Add Product Category Unit</h1>
<hr class="mb-4" />
<div class="row g-4 settings-section">
    <div class="col-12 col-md-12">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <form method="post">
                    <div class="mb-2 col-lg-6">
                        <label class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="cateUniname" required />
                    </div>

                    <div> <label class="form-label">Business Unit</label></div>
                    <div class="form-floating col-lg-6  mb-2">
                        <div class="select-block">
                            <select name="l2group" class="form-select">
                                <option value="" disabled selected>Choose Unit</option>
                                <?php
                                while ($row = $query_l2->fetch_assoc()) {
                                    $name = $row['l2groupname'];
                                    $bid = $row['l2id'];
                                    echo "<option value='$bid' >$name</option>";
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