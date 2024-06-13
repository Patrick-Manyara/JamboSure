<?php
require_once '../../path.php';
require_once "create.php";
$conn = connect();
$id = security('product_id');
    $sql = "delete from prod_benefit where prod_id = '$id'";
    insert_delete_edit($sql);
    foreach ($_POST['benefit_id'] as $key => $val) {
        $arr2['prod_benefit_id'] = create_id('prod_benefit', 'prod_benefit_id');
        $arr2['benefit_id'] = mysqli_real_escape_string($conn, $val);
        $arr2['prod_id'] = $id;
        build_sql_insert("prod_benefit", $arr2);
    }
header("location:../../dashboard/prod_details.php?id=".encrypt($id));