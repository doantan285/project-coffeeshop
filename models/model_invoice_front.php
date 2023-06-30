<?php
class InvoiceModel
{
    public static function showDetailInvoice()
    {
        $order_id = $_GET['order_id'];

        $sql = "SELECT order_id, table_number, products_ordered, order_time, note, customer_phone, total_payment
                        FROM order_customer
                        WHERE order_id = '$order_id'";

        $result = DB::connect()->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $order_id = $row['order_id'];
                $tableNumber = $row['table_number'];
                $productsOrdered = $row['products_ordered'];
                $orderTime = $row['order_time'];
                $note = $row['note'];
                $customerPhone = $row['customer_phone'];
                $totalPayment = $row['total_payment'];

                // In ra thông tin
                echo '<p class="invoice-body_text"><span>Bàn số: </span>' . $tableNumber . '</p>
                    <p class="invoice-body_text"><span>Sản phẩm đã gọi: </span>' . $productsOrdered . '</p>
                    <p class="invoice-body_text"><span>Thời gian gọi: </span>' . $orderTime . '</p>
                    <p class="invoice-body_text"><span>Ghi chú: </span>' . $note . '</p>
                    <p class="invoice-body_text"><span>Số điện thoại: </span>' . $customerPhone . '</p>
                    <p class="invoice-body_text"><span>Tổng thanh toán: </span>' . number_format($totalPayment) . '<sup>đ</sup></p>
                ';
            }
        }
    }
}
