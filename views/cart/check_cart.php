<section class="check-cart">
    <div class="detail-cart">
        <h1 class="heading"> My <span>Cart</span></h1>

        <div class="box-container">
            <table cellspacing="0">
                <tr>
                    <th style="width:15%" class="pro-img">Ảnh</th>
                    <th style="width:15%">Tên</th>
                    <th style="width:10%">Giá</th>
                    <th style="width:10%">Số lượng</th>
                    <th style="width:10%">Tổng cộng</th>
                    <th style="width:5%"></th>
                </tr>
                <?php
                if (!empty($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $key => $value) {
                        echo '
                        <tr>
                            <td><img class="pro-img" src="' . dir_admin_url . '/'  . $value['product_img'] . '"></td>
                            <td>' . $value['product_name'] . '</td>
                            <td>' . $value['price'] . '<input type="hidden" class="iprice" value="' . $value['price'] . '"></td>
                            <td class="control-quantity">
                                <button class="fa-solid fa-minus"></button>
                                <input class="iquantity" onchange="subTotal()" type="number" value="' . $value['quantity'] . '" min="1">
                                <button class="fa-solid fa-plus"></button>
                            </td>
                            <td class="itotal"></td>
                            <td>
                                <form action="admin_cf/controllers/handle_cart.php" method="POST">
                                    <button class="fa-solid fa-trash" onclick="return confirm(\'Bạn muốn xóa ' . $value['product_name'] . '?\');" type="submit" name="remove_item"></button>
                                    <input type="hidden" name="product_name" value="' . $value['product_name'] . '">
                                </form>
                            </td>
                        </tr>    
                        ';
                    }
                } else {
                    echo '<td colspan="6"><h1>Giỏ hàng trống!</h1></td>';
                }
                ?>
            </table>
            <div class="grand-total">
                <h4>Tổng số tiền:</h4>
                <h5 id="gtotal"></h5>
                <form action="http://localhost/coffee_shop/index.php?page=payment" id="paymentForm" method="POST">
                    <input type="hidden" name="iquantity" id="iquantityInput">
                    <input type="hidden" name="gtotal" id="gtotalInput">

                    <?php if (!empty($_SESSION['cart'])) { ?>
                        <button type="submit" class="btn">Thanh toán</button>
                    <?php } else { ?>
                        <button type="submit" class="btn" disabled>Thanh toán</button>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>

</section>