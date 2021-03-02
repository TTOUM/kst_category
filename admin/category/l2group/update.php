<?php
$sql = "SELECT*FROM businessunit";
$query_business = mysqli_query($con, $sql);

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $buid = $_GET['bid'];
    $l2name = $_GET['name'];
    if (isset($_POST['submit'])) {
        if (!empty($_POST['business'])) {
            $selected = $_POST['business'];
            $catename = $_POST['catename'];
            $sql_update = "UPDATE l2group SET businessid='$selected',l2groupname='$catename' WHERE l2id='$id';";
            $query_update = mysqli_query($con, $sql_update);
            if ($query_update > 0) {
                $alert = '<script type="text/javascript">';
                $alert .= 'alert("Updated Successfully!!");';
                $alert .= 'window.location.href="?page=category&function=managel2group";';
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
}



mysqli_close($con);
?>
<h1 class="app-page-title">Update Product Category</h1>
<hr class="mb-4" />
<div class="row g-4 settings-section">
    <div class="col-12 col-md-12">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <form method="post">
                    <div class="mb-2 col-lg-6">
                        <label class="form-label">Category Name</label>
                        <input type="text" class="form-control" name="catename" value="<?= $l2name ?>" required />
                    </div>

                    <div> <label class="form-label">Business Unit</label></div>
                    <div class="form-floating col-lg-6  mb-2">
                        <div class="select-block">
                            <select name="business" class="form-select">
                                <option value="" disabled selected>Choose Unit</option>
                                <?php
                                while ($row = $query_business->fetch_assoc()) {
                                    $name = $row['businessunit'];
                                    $bid = $row['businessid'];
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