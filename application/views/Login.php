<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Production System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= site_url('asset/Login&Register/style.css'); ?>">
</head>

<body>

    <section class="section-login">
        <div class="row">
            <div class="col-xl-6">
                <img src="<?= site_url('asset/Login&Register/bg-production.jpg'); ?>" class="d-none d-sm-none d-md-none d-lg-none d-xl-block" alt="">
            </div>
            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-mobile col-tab">
                <div class="form-login text-center">
                    <div class="parent d-flex justify-content-center align-items-center" style="height: 80vh;">
                        <div class="child">
                            <form action="<?= site_url('login/'); ?>" method="post">
                                <h4>Production System</h4>
                                <h5 class="mt-3">Sign in by entering the information below</h5>
                                <div class="form-group mt-5">
                                    <input type="text" class="form-control" placeholder="Username" name="username" autofocus>
                                </div>
                                <div class="form-group">
                                    <input id="password-field" type="password" class="form-control" name="password" placeholder="Password">
                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <button type="submit" class="btn btn-login bg-primary">LOGIN</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

<script src="https://code.jquery.com/jquery-3.5.1.min.js " integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin=" anonymous "></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js " integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx " crossorigin="anonymous "></script>
<script>
    $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
</script>

</html>