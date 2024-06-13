<?php
require_once '../../path.php';
require_once "create.php";
$conn = connect();
// cout($_POST);
$id = security('product_id');
    $sql = "delete from value_class where prod_id = '$id'";
        insert_delete_edit($sql);
     $valueClasses = $_POST['value_classes']; // Assuming value_classes is an array of value classes

    foreach ($valueClasses as $valueClass) {
        $valueClassData = array(
            'value_class_id' => create_id('value_class', 'value_class_id'),
            'prod_id' => $id,
            'value_class_min_range' => mysqli_real_escape_string($conn, strtolower(str_replace(',', '', $valueClass['minrange']))),
            'value_class_max_range' => mysqli_real_escape_string($conn, strtolower(str_replace(',', '', $valueClass['maxrange']))),
            'value_class_rate' => mysqli_real_escape_string($conn, $valueClass['rate']),
            'value_class_price' => mysqli_real_escape_string($conn, $valueClass['price'])
        );

        build_sql_insert("value_class", $valueClassData);
    }
    
    header("location:../../dashboard/prod_details.php?id=".encrypt($id));