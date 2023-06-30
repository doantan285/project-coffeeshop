<div class="wrapper_invoice">
    <div class="invoice-header">
        <h1><i class="fa-solid fa-circle-check"></i> Cảm ơn bạn đã đặt hàng</h1>
    </div>

    <div class="invoice-body">
        <div class="invoice-body_top">
            <h3>Chi tiết hóa đơn</h3>
        </div>
        <div class="invoice-body_bot">
            <?php
            if (isset($_POST['order_again'])) {
                HandleOrderFE::orderAgain();
            }
            if (isset($_GET['order_id'])) {
                InvoiceModel::showDetailInvoice();
            }
            if (isset($_POST['btn-cancel'])) {
                HandleOrderFE::cancelOrder();
            }
            ?>
        </div>
    </div>

    <div class="invoice-footer">
        <form action="" method="post">
            <a href="http://localhost/coffee_shop/#coffee"><input type="submit" name="order_again" value="Tiếp Tục Order"></a>
        </form>
        <form action="" method="post">
            <input onclick="return confirm('Bạn muốn hủy đơn?')" type="submit" value="HỦY ĐƠN" id="btn-cancel" name="btn-cancel">
        </form>
    </div>
</div>