<?php
if (isset($_POST['searching'])) {
    $keyword = $_POST['keyword'];
}
$result = DB::connect()->query("SELECT * FROM product WHERE product.product_name LIKE '%" . $keyword . "%'");
?>

<section class="menu">
    <h1 class="searching"> Kết quả tìm kiếm: <span><?php echo $_POST['keyword'] ?></span></h1>

    <div class="box-container">

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $product_id = $row['product_id'];
                $product_name = $row['product_name'];
                $image = $row['product_img'];
                $description = $row['product_desc'];
                $price = $row['product_price'];
                $category_id = $row['category_id'];

                echo '
                <form action="admin_cf/controllers/handle_cart.php" method="post">
                    <div class="box">
                        <img src="' . dir_admin_url . $image . '" alt="">
                        <h3>' . $product_name . '</h3>
                        <div class="price">' . number_format($price) . '<sup>đ</sup></div>
                        <input type="submit" name="add_to_cart" class="btn" value="Add To Cart">
                        <input type="hidden" name="product_img" value="' . $image . '">
                        <input type="hidden" name="product_name" value="' . $product_name . '">
                        <input type="hidden" name="product_price" value="' . $price . '">
                        <input type="hidden" name="category_id" value="' . $category_id . '">
                    </div>
                </form>
                ';
            }
        }
        ?>

    </div>
</section>
