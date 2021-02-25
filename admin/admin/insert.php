<h1 class="app-page-title">Add User</h1>
<hr class="mb-4" />
<div class="row g-4 settings-section">
    <div class="col-12 col-md-12">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <?php
                if (isset($_POST) && !empty($_POST)) {
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $firstname = $_POST["firstname"];
                    $lastname = $_POST["lastname"];
                    if (!empty($username)) {
                        $sql_check = "SELECT*FROM users WHERE username='$username'";
                        $query_check = mysqli_query($con, $sql_check);
                        $row_check = mysqli_num_rows($query_check);
                        if ($row_check > 0) {
                            $alert = '<script type="text/javascript">';
                            $alert .= 'alert("User has already!!");';
                            $alert .= '</script>';
                            echo $alert;
                            exit();
                        } else {
                            $sql = "INSERT INTO users (uid,username,pass,firstname,lastname)
                            VALUES ('','$username','$password','$firstname','$lastname')";
                            if (mysqli_query($con, $sql)) {
                                $alert = '<script type="text/javascript">';
                                $alert .= 'alert("Added Successfully!!");';
                                $alert .= 'window.location.href="?page=admin";';
                                $alert .= '</script>';
                                echo $alert;
                                exit();
                            } else {
                                echo "Failed==" . $sql . "<br>" . mysqli_error($con);
                            }
                        }
                    }




                    mysqli_close($con);
                }


                ?>
                <form action="" method="post">
                    <div class="mb-2 col-lg-6">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" required />
                    </div>
                    <div class="mb-2 col-lg-6">
                        <label class="form-label">Password</label>
                        <input type="text" class="form-control" name="password" required />
                    </div>

                    <div class="mb-2 col-lg-6">
                        <label class="form-label">Firstname</label>
                        <input type="text" class="form-control" name="firstname" required />
                    </div>
                    <div class="mb-2 col-lg-6">
                        <label class="form-label">Lastname</label>
                        <input type="text" class="form-control" name="lastname" required />
                    </div>

                    <button type="submit" class="btn app-btn-primary bg-success text-white">
                        Save
                    </button>

                </form>
            </div>
            <!--//app-card-body-->
        </div>
        <!--//app-card-->
    </div>
</div>