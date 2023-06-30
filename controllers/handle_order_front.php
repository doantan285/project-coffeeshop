<?php
class HandleOrderFE
{
    public static function cancelOrder()
    {
        $order_id = $_GET['order_id'];

        $sql = "SELECT status FROM order_customer WHERE order_id = $order_id";
        $result = DB::connect()->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $status = $row['status'];

            if ($status === 'unconfirmed') {
                // Thực hiện hủy đơn hàng
                $delete_sql = "DELETE FROM order_customer WHERE order_id = $order_id";
                $delete_result = DB::connect()->query($delete_sql);

                if ($delete_result) {
                    unset($_SESSION['cart']);
                    echo '<script>alert("Bạn đã hủy đơn!");</script>';
                    echo '<script>window.location.href = "http://localhost/coffee_shop/#coffee";</script>';
                }
            } elseif ($status === 'confirmed') {
                echo '<script>alert("Đơn hàng không thể hủy vì đã được xác nhận!");</script>';
                echo '<script>window.location.href = "http://localhost/coffee_shop/invoice/invoice.php?order_id=' . $order_id . '";</script>';
            }
        }
    }

    public static function orderAgain()
    {
        unset($_SESSION['cart']);
        header('Location:http://localhost/coffee_shop/#coffee');
    }
}


