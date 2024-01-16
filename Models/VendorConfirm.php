<?php
class VendorConfirm {
    function DeleteUserOrder($id) {
        $db = new Connect();
        $query = "DELETE FROM orders WHERE id = $id";
        $result = $db->exec($query);
        return $result;
    }

    function UpdateUserOrder($id, $status) {
        $db = new Connect();
        $query = "UPDATE orders SET status = $status where id = $id";
        $result = $db->exec($query);
        return $result;
    }

    function ListUserOrderConfirm() {
        $db = new Connect();
        $select = "SELECT * FROM orders WHERE status = 1";
        $result = $db->getList($select);
        return $result;
    }
}