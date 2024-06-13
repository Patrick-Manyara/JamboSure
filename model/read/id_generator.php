<?php

function create_id($table, $id)
{
    $date_today = date('Ymd');

    $table_prifix = array(
        'admin'             => 'ADM' . $date_today,
        'banner'            => 'BNR' . $date_today,
        'benefit'           => 'BEN' . $date_today,
        'category'          => 'CAT' . $date_today,
        'claim'             => 'CLM' . $date_today,
        'inquiry'           => 'INQ' . $date_today,
        'invoice'           => 'INV' . $date_today,
        'levy'              => 'LEV' . $date_today,
        'user'              => 'USR' . $date_today,
        'policy'            => 'PLC' . $date_today,
        'product'           => 'PRO' . $date_today,
        'subcategory'       => 'SUB' . $date_today,
        'value_class'       => 'VAL' . $date_today,
        'vehicle'           => 'CAR' . $date_today,
        'writer'            => 'WRT' . $date_today
    );

    $random_str = $table_prifix[$table] . rand_str();

    $get_id     = get_ids($table, $id, $random_str);

    while ($get_id == true) {
        $random_str = $table_prifix[$table] . rand_str();
        $get_id     = get_ids($table, $id, $random_str);
    }
    return $random_str;
}

function get_ids($table, $id, $random_str)
{
    $sql = "
        SELECT 
            $id 
        FROM 
            `$table`
    ";
    
    $result = select_rows($sql);
    
    foreach ($result as $existing_id) {
        $id_exists = false;
        
        if ($existing_id[$id] == $random_str) {
            $id_exists = true;
            break;
        }
    }
    
    return $id_exists;
}