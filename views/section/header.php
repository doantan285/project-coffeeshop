<header class="header">

    <a href="http://localhost/coffee_shop/" class="logo">
        <img src="assets/images/logo.jpg" alt="">
    </a>

    <nav class="navbar">
        <a href="http://localhost/coffee_shop/#home">Home</a>
        <a href="http://localhost/coffee_shop/#about">About</a>
        <a href="http://localhost/coffee_shop/#coffee">Coffee</a>
        <a href="http://localhost/coffee_shop/#cake">Cake</a>
        <a href="http://localhost/coffee_shop/#gallery">Gallery</a>
        <a href="http://localhost/coffee_shop/#contact">Contact</a>
        <a href="http://localhost/coffee_shop/#blog">Blog</a>
    </nav>

    <div class="icons">
        <div class="fa-solid fa-magnifying-glass search-btn"></div>
        
        <?php
        $total_quantity = 0;
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                $total_quantity += $item['quantity'];
            }
        }
        ?>
        <div class="fa-solid fa-cart-shopping cart-btn">
            <span><?php echo $total_quantity; ?></span>

            <div class="cart-items-container">
                <div class="cart-item-box">
                    <?php
                    if (!empty($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $key => $value) {
                            echo '
                            <div class="cart-item">
                                <img src="' . dir_admin_url . '/'  . $value['product_img'] . '">
                                <div class="content">
                                    <h3>' . $value['product_name'] . '</h3>
                                    <p>' . $value['quantity'] . ' x ' . number_format($value['price']) . '<sup>đ</sup></p>
                                </div>
                                <form action="admin_cf/controllers/handle_cart.php" method="POST">
                                    <button type="submit" name="remove_cart_item" class="fa-solid fa-circle-xmark"></button>
                                    <input type="hidden" name="product_name" value="' . $value['product_name'] . '">
                                    <input type="hidden" name="category_id" value="' . $value['category_id'] . '">
                                </form>
                                
                            </div>
                            ';
                        }
                    } else {
                        echo '
                        <div class="cart-empty">
                            <img src="assets/images/empty-cart.png" alt="">
                            <h4>Giỏ hàng trống!</h4>
                        </div>
                        ';
                    }
                    ?>
                </div>
                <div class="cart-footer">
                    <a href="http://localhost/coffee_shop/index.php?page=cart" class="btn">Check Cart</a>
                </div>
            </div>
        </div>
        <div class="fa-solid fa-bars menu-btn"></div>
    </div>

    <form action="http://localhost/coffee_shop/index.php?page=searching" class="search-form" method="post" autocomplete="off">
        <input type="search" name="keyword" id="search-box" placeholder="Tìm kiếm sản phẩm">
        <button for="search-box" name="searching" class="fa-solid fa-magnifying-glass"></button>
    </form>

</header>