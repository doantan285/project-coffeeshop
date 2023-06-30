<section class="payment">
    <h1 class="heading"> Make <span>Payment</span></h1>

    <form action="admin_cf/index.php" method="post">
        <div class="box-container">
            <div class="information">
                <h3>Thông tin thanh toán</h3>
                <div class="detail-info">
                    <div class="table">
                        <label for="table_number">Bàn số</label>
                        <input type="number" id="table_number" name="table_number" min=1 required>
                    </div>
                    <div class="number_cus">
                        <label for="number_cus">Số điện thoại</label>
                        <input type="number" id="number_cus" name="customer_phone" min=1 required>
                    </div>
                </div>
                <div class="note">
                    <label for="note">Ghi chú</label>
                    <textarea id="note" cols="30" rows="3" name="note"></textarea>
                </div>

            </div>
            <div class="table_product">
                <h4>Sản phẩm thanh toán</h4>

                <ul>
                    <?php
                    $total = 0;
                    if (isset($_SESSION['cart'])) {
                        // Sử dụng tham chiếu &$product trong vòng lặp foreach để cập nhật trực tiếp giá trị mảng $_SESSION['cart']
                        foreach ($_SESSION['cart'] as $key => &$product) {
                            // lấy giá trị iquantity từ session và cập nhật vào $product['quantity']
                            if (isset($_POST['iquantity'])) {
                                $iquantityArray = json_decode($_POST['iquantity'], true);
                                if (isset($iquantityArray[$key])) {
                                    $product['quantity'] = $iquantityArray[$key];
                                }
                            }
                            $total += ($product['price'] * $product['quantity']);
                            echo '
                            <li>
                                <div>
                                    <h5>' . $product['product_name'] . '</h5>
                                    <small>Số lượng: ' . $product['quantity'] . '</small>
                                </div>
                                <span>' . number_format($product['price'] * $product['quantity']) . '<sup>đ</sup></span>
                            </li>
                            ';
                        }
                    }
                    ?>
                    <li>
                        <h3>Tổng cộng</h3>
                        <strong><?php echo number_format($total); ?><sup>đ</sup></strong>
                    </li>
                </ul>
            </div>
        </div>
        <?php
        $iquantity = isset($_POST['iquantity']) ? $_POST['iquantity'] : '';
        $total = isset($total) ? $total : '';

        echo '<input type="hidden" name="iquantity" value="' . $iquantity . '">';
        echo '<input type="hidden" name="gtotal" value="' . $total . '">';
        ?>
        <button type="submit" name="submit_payment" class="btn">TIẾN HÀNH THANH TOÁN</button>
    </form>

</section>