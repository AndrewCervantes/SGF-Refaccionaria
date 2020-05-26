<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Sistema de inventario">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema de refaccionaria</title>
         
        <link rel="stylesheet" href="css/style.css">
        <link rel="shortcut icon" href="img/vochon.png">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <!-- Importando  bootstrap, Jquery, alertify-->
        <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css"  href="librerias/jquery-ui.css">
        <script src="librerias/jquery-1.12.1.min.js"></script>
        <script src="librerias/jquery-ui.js"></script>
        <script src="librerias/alertifyjs/alertify.js"></script>
        <script src="librerias/bootstrap/js/bootstrap.js"></script>
        <script src="js/funciones.js"></script>
        <script src='js/footer.js'></script>
    </head>
    <body>
        <?php include("header.php"); ?>
        <div class="carru">
            <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-interval="3000" >
                        <img src="img/m.jpg" class="d-block w-100" width="300" height="550" > 
                    </div>
                    <div class="carousel-item" data-interval="3000" >
                        <img src="img/m1.jpg" class="d-block w-100" width="300" height="550" >
                    </div>
                    <div class="carousel-item" data-interval="3000">
                        <img src="img/m2.jpg" class="d-block w-100"  width="300" height="550">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <?php include("footer.php"); ?>
    </body>
</html>