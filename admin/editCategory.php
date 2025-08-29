<?php
require_once "dbconnect.php";

if ($_SERVER['REQUEST_METHOD'] == "GET" && $_GET['val'] == 'del') {
    try {
        $id = $_GET['id'];

        //delete products under this category
        $sql1 = "DELETE FROM product WHERE category = ?";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->execute([$id]);

        //delete the category
        $sql2 = "DELETE FROM category WHERE id = ?";
        $stmt2 = $conn->prepare($sql2);
        $status = $stmt2->execute([$id]);

        if ($status) {
            header("Location:viewInfo.php?show=categories");
            exit();
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
