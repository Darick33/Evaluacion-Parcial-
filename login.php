<!DOCTYPE html>
<html lang="es" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Ingreso Administrador</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="./public/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="./public/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="./public/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="./public/assets/css/demo.css" />
    <link rel="stylesheet" href="./public/assets/vendor/css/login.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="./public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="./public/assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="./public/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="./public/assets/js/config.js"></script>
</head>

<body>
    <!-- Content -->
    <div class="section">
        <div class="container">
            <div class="row full-height justify-content-center">
                <div class="col-12 text-center align-self-center py-5">
                    <div class="section pb-5 pt-5 pt-sm-2 text-center">

                        <label for="reg-log"></label>
                        <div class="card-3d-wrap mx-auto">
                            <div class="card-3d-wrapper">
                                <div class="card-front">
                                    <div class="center-wrap">
                                        <div class="section text-center">
                                            <!-- Register -->
               

                        <form action="controllers/artista.controllers.php?op=login" class="mb-3" method="POST">
                            <?php if (isset($_GET['op'])) {
                                switch ($_GET['op']) {
                                    case "1":
                            ?>
                                        <div class="form-group">
                                            <div class="alert alert-danger">
                                                El usuario o la contraseña son incorrectos
                                            </div>
                                        </div>
                                    <?php

                                        break;
                                    case '2':
                                    ?>
                                        <div class="form-group">
                                            <div class="alert alert-danger">
                                                Por favor llene las casillas
                                            </div>
                                        </div>
                            <?php
                                }
                            } ?>
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo Electrónico</label>
                                <input type="text" class="form-control" id="correo" name="correo" placeholder="Ingrese su correo elctrónico" autofocus />
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <!-- <div class="d-flex justify-content-between"> -->
                                    <label class="form-label" for="password">Contraseña</label>

                                <!-- </div> -->
                                <div class="input-group input-group-merge">
                                    <input type="password" id="contrasenia" class="form-control" name="clave" placeholder="*************" aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <button class="btn btn-outline-primary d-grid w-100" type="submit">Ingresar</button>
                            </div>
                        </form>


                  
                <!-- /Register -->

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <!-- / Content -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="./public//assets/vendor/libs/jquery/jquery.js"></script>
    <script src="./public//assets/vendor/libs/popper/popper.js"></script>
    <script src="./public//assets/vendor/js/bootstrap.js"></script>
    <script src="./public//assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="./public//assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="./public//assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
