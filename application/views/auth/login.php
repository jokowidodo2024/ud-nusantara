<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/images/favicon.png'); ?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">
</head>

<body class="h-100" style="background-color: blue;">
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>

    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="<?= base_url('index.html'); ?>">
                                    <h4>UD Nusantara</h4>
                                </a>

                                <?php if ($this->session->flashdata('error')) : ?>
                                    <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
                                <?php endif; ?>

                                <!-- Login Form -->
                                <form action="<?= site_url('auth/login'); ?>" method="post" class="mt-5 mb-5 login-input">
                                    <div class="form-group">
                                        <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan Username" value="<?= set_value('username'); ?>">
                                        <?= form_error('username', '<div class="error text-danger">', '</div>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                            <div class="input-group-append">
                                                <span class="input-group-text" onclick="togglePasswordVisibility()">
                                                    <i class="fa fa-eye" id="togglePasswordIcon"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <?= form_error('password', '<div class="error text-danger">', '</div>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100" style="border-radius: 10px;">Login</button>
                                </form>

                                <p class="mt-5 text-center">Don't have an account? <a href="<?= base_url('auth/register'); ?>" class="text-primary">Sign Up</a> now</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var toggleIcon = document.getElementById("togglePasswordIcon");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
        }
    </script>
    <script src="<?= base_url('assets/plugins/common/common.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/custom.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/settings.js'); ?>"></script>
    <script src="<?= base_url('assets/js/gleek.js'); ?>"></script>
    <script src="<?= base_url('assets/js/styleSwitcher.js'); ?>"></script>
</body>

</html>