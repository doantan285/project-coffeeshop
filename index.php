<?php
session_start();
require 'constant.php';

require dir_admin . '/config/database.php';

// require model file
require dir_root . '/models/product_front.php';

// require controller file
// require dir_root . '/controllers/handle_order_front.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Point</title>
    <!-- link font awesome -->
    <link rel="stylesheet" href="assets/fonts/fontawesome-6.4.0/css/all.min.css">
    <!-- link css -->
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
</head>

<body>
    <!-- header section -->
    <?php include 'views/section/header.php'; ?>

    <?php
    
    if (isset($_GET['page'])) {
        if ($_GET['page'] == 'searching') {
            include 'views/section/search.php';
        } elseif ($_GET['page'] == 'cart') {
            include 'views/cart/check_cart.php';
        } elseif ($_GET['page'] == 'payment') {
            include 'views/cart/payment.php';
        }
    } else { ?>
        <!-- home section -->
        <?php include 'views/section/home.php'; ?>

        <!-- about section -->
        <?php include 'views/section/about.php'; ?>

        <!-- coffee section -->
        <?php include 'views/section/coffee.php'; ?>

        <!-- cake section -->
        <?php include 'views/section/cake.php'; ?>

        <!-- gallery section -->
        <?php include 'views/section/gallery.php'; ?>

        <!-- contact section -->
        <?php include 'views/section/contact.php'; ?>

        <!-- blogs section -->
        <?php include 'views/section/blog.php'; ?>

    <?php
    }
    ?>

    <!-- footer section -->
    <?php include 'views/section/footer.php'; ?>



    <!-- link javascript -->
    <script src="assets/js/script.js"></script>
</body>

</html>