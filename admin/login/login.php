<?php
if (isset($_POST) && !empty($_POST)) {
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    $username = $_POST['username'];
    $password = sha1(md5($_POST['password']));
    $sql = "SELECT*FROM users WHERE username='$username' AND pass='$password'";
    $query = mysqli_query($con, $sql);
    $row = mysqli_num_rows($query);
    echo $row;
    if ($row > 0) {
        $result = mysqli_fetch_assoc($query);
        $_SESSION['user_login'] = $result['username'];
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("Login Successfully!!");';
        $alert .= 'window.location.href="";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("Incorect Username and Password!!");';
        $alert .= 'window.location.href="";';
        $alert .= '</script>';
        echo $alert;
        exit();
    }
}
?>

<body class="app app-login p-0">
    <div class="row g-0 app-auth-wrapper">
        <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon mr-2" src="assets/images/kst.png" alt="logo"></a></div>

                    <div class="auth-form-container text-left">
                        <form action="" method="post" class="auth-form login-form">
                            <div class="email mb-3">
                                <label class="sr-only" for="username">Username</label>
                                <input name="username" class="form-control signin-email" placeholder="Username" required="required">
                            </div>
                            <!--//form-group-->
                            <div class="password mb-3">
                                <label class="sr-only" for="signin-password">Password</label>
                                <input name="password" type="password" class="form-control signin-password" placeholder="Password" required="required">
                                <div class="extra mt-3 row justify-content-between">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="RememberPassword">
                                            <label class="form-check-label" for="RememberPassword">
                                                Remember me
                                            </label>
                                        </div>
                                    </div>
                                    <!--//col-6-->
                                    <div class="col-6">
                                        <div class="forgot-password text-right">
                                            <a href="reset-password.html">Forgot password?</a>
                                        </div>
                                    </div>
                                    <!--//col-6-->
                                </div>
                                <!--//extra-->
                            </div>
                            <!--//form-group-->
                            <div class="text-center">
                                <button type="submit" class="btn app-btn-primary btn-block theme-btn mx-auto">Log In</button>
                            </div>
                        </form>

                        <div class="auth-option text-center pt-5">Contact to Support <a class="text-link" href="signup.html">here</a>.</div>
                    </div>
                    <!--//auth-form-container-->

                </div>

            </div>
            <!--//flex-column-->
        </div>
        <!--//auth-main-col-->
        <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
            <div class="auth-background-holder">
            </div>
            <div class="auth-background-mask"></div>
            <div class="auth-background-overlay p-3 p-lg-5">
                <div class="d-flex flex-column align-content-end h-100">
                    <!-- <div class="h-100"></div>
                    <div class="overlay-content p-3 p-lg-4 rounded">
                        <h5 class="mb-3 overlay-title">Explore Portal Admin Template</h5>
                        <div>Portal is a free Bootstrap 5 admin dashboard template. You can download and view the template license <a href="https://themes.3rdwavemedia.com/bootstrap-templates/admin-dashboard/portal-free-bootstrap-admin-dashboard-template-for-developers/">here</a>.</div>
                    </div> -->
                </div>
            </div>
            <!--//auth-background-overlay-->
        </div>
        <!--//auth-background-col-->

    </div>
    <!--//row-->


</body>