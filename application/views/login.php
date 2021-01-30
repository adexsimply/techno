<!doctype html>
<html lang="en">

<head>
    <title>:: Techno :: Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
    <meta name="author" content="WrapTheme, design by: ThemeMakker.com">

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/color_skins.css">
</head>

<body class="theme-cyan">
    <!-- WRAPPER -->
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle auth-main">
                <div class="auth-box">
                    <div class="top">
                        <!-- <img src="<?php echo base_url(); ?>assets/images/logo-white.svg" alt="Lucid"> -->
                    </div>
                    <div class="card">
                        <div class="header">
                            <p class="lead">Login to your account</p>
                        </div>
                        <div class="body">
                            <form class="form-auth-small" id="form-signin">
                                <div class="validation-message text-center mb-3" style="color: red" data-field="password"></div>
                                <div class="form-group">
                                    <label for="signin-email" class="control-label sr-only">Email</label>
                                    <input type="email" class="form-control" id="signin-email" name="username" value="admin" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input type="password" class="form-control" id="signin-password" name="password" value="admin" placeholder="Password">
                                </div>
                                <div class="form-group clearfix">
                                    <label class="fancy-checkbox element-left">
                                        <input type="checkbox">
                                        <span>Remember me</span>
                                    </label>
                                </div>
                                <button type="button" id="sign-in" class="btn btn-primary ">LOGIN</button>
                                <!--   <div class="bottom">
                                    <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href="page-forgot-password.html">Forgot password?</a></span>
                                    <span>Don't have an account? <a href="page-register.html">Register</a></span>
                                </div> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->
</body>

</html>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript">
    ////Signin script starts here       
    $('#sign-in').on("click", function() {
        login();
    });
    $("#form-signin").keypress(function(event) {
        if (event.which == 13) {
            login();
        }
    });

    function login() {
        $('#sign-in').html("Authenticating...").attr('disabled', true);
        var data = $('#form-signin').serialize();
        $.post("<?php echo base_url() . 'auth/login_attempt'; ?>", data).done(function(data) {
            console.log(data)
            if (data.status == "success") {
                window.location.replace("<?php echo base_url(); ?>");
            } else {
                $('#sign-in').html("Login").attr('disabled', false);
                $('.validation-message').html('');
                $('.validation-message').each(function() {
                    for (var key in data) {
                        if ($(this).attr('data-field') == key) {
                            $(this).html(data[key]);
                        }
                    }
                });
            }
        });
    }
    /////////////End of Signin script
</script>