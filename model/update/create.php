<?php

use PhpOffice\PhpSpreadsheet\Reader\Csv;

require_once '../../path.php';
require_once MODEL_PATH . "operations.php";
include_once('../vendor/autoload.php');
include_once('../../vendor/autoload.php');
include_once '../../meeting/create_meeting.php';

$action = (isset($_GET['action']) && $_GET['action'] != '') ? security('action', 'GET') : '';



if (!csrf_verify(security('csrf_token'))) render_warning(admin_url);
unset($_POST['csrf_token']);



foreach ($_GET as $key => $val) {
    $conn = connect();
    $_GET[$key] = mysqli_real_escape_string($conn, $_GET[$key]);
}
foreach ($_POST as $key => $val) {
    $conn = connect();
    if (!is_array($_POST[$key])) {
        $_POST[$key] = mysqli_real_escape_string($conn, $_POST[$key]);
    }
}


switch ($action) {
    case 'admin_login':
        get_user_login();
        break;
    case 'user_login':
        get_login();
        break;

    case 'admin':
        post_admin();
        break;
    case 'register':
        post_user();
        break;
    case 'product':
        post_product();
        break;
    case 'prod':
        post_prod();
        break;
    case 'user':
        post_client();
        break;
    case 'password':
        post_password();
        break;
    case 'admin_password':
        post_admin_password();
        break;
    case 'writer':
        post_writer();
        break;
    case 'benefit':
        post_benefit();
        break;
    case 'policy':
        post_policy();
        break;
    case 'banner':
        post_banner();
        break;
    case 'test':
        post_test();
        break;
    case 'simple':
        post_simple($_GET['table'], $_GET['url']);
        break;
}


function post_simple($table, $url)
{
    global $arr;
    global $error;
    global $success;

    $return_url = admin_url . $url;


    for_loop();


    $param = '';
    if (isset($_SESSION['edit'])) {
        $param = "?id=" . encrypt($_SESSION['edit']);
    }

    if (!empty($error)) {
        $url = $return_url . $param;
        error_checker($url);
    }

    if (isset($_SESSION['edit'])) {
        $id = $_SESSION['edit'];
        unset($_SESSION['edit']);

        if (!build_sql_edit($table, $arr, $id, $table . '_id')) {
            $error[$table] = 149;
            error_checker($return_url);
        }

        $success[$table] = 221;
        render_success($return_url);
    }

    $id = $arr[$table . '_id'] = create_id($table, $table . '_id');

    if (!build_sql_insert($table, $arr)) {
        $error[$table] = 150;
        error_checker($return_url);
    }

    $success[$table] = 220;
    render_success($return_url);
}


function post_writer()
{
    global $arr;
    global $error;
    global $success;

    $return_url = admin_url . "view_writers";

    if (!empty($_FILES['writer_image']['name']))     $arr['writer_image']     = upload('writer_image');

    for_loop();



    if (isset($_SESSION['edit'])) {
        $id = $_SESSION['edit'];
        unset($_SESSION['edit']);

        if (!empty($arr['writer_image']))    delete_file('writer_image', 'writer', 'writer_id');


        if (!build_sql_edit('writer', $arr, $id, 'writer_id')) {
            $error['view_writers'] = 153;
            error_checker($return_url);
        }

        $success['view_writers'] = 224;
        render_success($return_url);
    }

    $arr['writer_id'] = create_id('writer', 'writer_id');
    if (!build_sql_insert('writer', $arr)) {
        header("Location: $return_url?error=Details not updated!");
        exit;
    }

    header("Location: $return_url?success=Details updated successfully");
}


function post_banner()
{
    global $arr;
    global $error;
    global $success;
    $return_url = admin_url . "view_banners";

    if (!empty($_FILES['banner_poster']['name']))    $arr['banner_poster']   = upload('banner_poster');

    for_loop();

    if (!empty($error)) {
        error_checker($return_url);
    }


    if (isset($_SESSION['edit'])) {
        $id = $_SESSION['edit'];
        unset($_SESSION['edit']);

        if (!empty($arr['banner_poster']))   delete_file('banner_poster', 'banner', 'banner_id', $id);

        if (!build_sql_edit('banner', $arr, $id, 'banner_id')) {
            $error['banner'] = 132;
            error_checker($return_url);
        }

        $success['banner'] = 206;
        render_success($return_url);
    }

    $arr['banner_id'] = create_id('banner', 'banner_id');

    if (!build_sql_insert('banner', $arr)) {
        $error['banner'] = 134;
        error_checker($return_url);
    }

    $success['banner'] = 205;
    render_success($return_url);
}



function post_benefit()
{
    global $arr;
    global $error;
    global $success;

    $conn = connect();
    $return_url = admin_url . 'view_benefits';


    $arr['benefit_name']       = mysqli_real_escape_string($conn, $_POST['benefit_name']);
    $arr['benefit_free']       = mysqli_real_escape_string($conn, $_POST['benefit_free']);
    $arr['benefit_limit']       = mysqli_real_escape_string($conn, $_POST['benefit_limit']);



    if (isset($_POST['benefit_price'])  && $_POST['benefit_price'] !== '') {
        $arr['benefit_price'] = mysqli_real_escape_string($conn, $_POST['benefit_price']);
    } else {
        $arr['benefit_price'] = 0;
    }

    if (isset($_POST['benefit_rate'])  && $_POST['benefit_rate'] !== '') {
        $arr['benefit_rate'] = mysqli_real_escape_string($conn, $_POST['benefit_rate']);
    } else {
        $arr['benefit_rate'] = 0;
    }

    if (isset($_SESSION['edit'])) {
        $id = $_SESSION['edit'];
        unset($_SESSION['edit']);


        if (!build_sql_edit('benefit', $arr, $id, 'benefit_id')) {
            $error['view_benefits'] = 153;
            error_checker($return_url);
        }

        $success['view_benefits'] = 224;
        render_success($return_url);
    }

    $arr['benefit_id']         = create_id('benefit', 'benefit_id');
    $arr['benefit_code']        = security('benefit_code');
    build_sql_insert("benefit", $arr);


    $success[$table] = 220;
    render_success($return_url);
}


function post_policy()
{
    global $arr;
    global $error;
    global $success;

    // $return_url = admin_url . "view_writers";
    $return_url = base_url . "info.php";

    // cout($_POST);


    $arr['policy_id'] = create_id('policy', 'policy_id');
    // $arr['user_id'] = '0jog3yIUCGA';
    $arr['device_id'] = $_COOKIE['device'];

    $arr['policy_code']     = 'JAMBO-' . generateRandomString('6');

    $arr['policy_make'] = security('make');
    $arr['policy_model'] = security('model');

    $arr['policy_year'] = security('year');

    $arr['cover_duration'] = security('cover_duration');

    if ($_POST['prod_category'] == 'third_party') {
        $arr['policy_value'] = '0';
        $arr['first_price'] = '0';
    } else {
        $arr['policy_value'] = security('value');
        $arr['first_price'] = security('price');
    }




    $arr['product_id'] = security('product_id');


    if (isset($_POST['benefits']) && is_array($_POST['benefits'])) {
        $benefitsString = implode(',', $_POST['benefits']);
    }

    $arr['policy_benefits'] = $benefitsString;

    $arr['prod_type'] = security('prod_type');
    $arr['prod_category'] = security('prod_category');

    if (!build_sql_insert('policy', $arr)) {
        $error['view_policies'] = 154;
        error_checker($return_url);
    }

    // $subject    = APP_NAME . ' Account Creation';
    // $name       = APP_NAME;
    // $body       = '<p style="font-family:Poppins, sans-serif;"> ';
    // $body       .= 'Hello, <b> ' . $arr['user_name'] . ' </b> <br>';
    // $body       .= 'Your account has been successfully created.';
    // $body       .= '<br>';
    // $body       .= 'You may log in to your account in the future with these credentials';
    // $body       .= '<br>';
    // $body       .= '<b>EMAIL:</b> ' . $arr['user_email'] . ' <br>';
    // $body       .= '<br>';
    // $body       .= '<b>PASSWORD:</b> ' . security('user_password') . ' <br>';
    // $body       .= '<br>';


    // email($arr['user_email'], $subject, $name, $body);

    $success['view_users'] = 220;
    render_success($return_url);
}


function post_user()
{
    global $arr;
    global $error;
    global $success;

    if (isset($_GET['payment'])) {
        $return_url = base_url . 'info?payment';
    } else {
        $return_url = base_url;
    }

    if (security('confirm_password') != security('user_password')) {
        $error['user'] = 163;
        error_checker($return_url);
    }

    unset($_POST['confirm_password']);
    
    // for_loop();
    
     $arr  = array(
        'user_email'        => security('user_email'),
        'user_name'         => security('user_name'),
        'user_gender'         => security('user_gender'),
        'user_kra'         => security('user_kra'),
        'user_phone'         => security('user_phone'),
        'user_dob'         => security('user_dob'),
    );
    
     if (!empty($_FILES['national']['name'])) $arr['user_passport']   = upload_docs('national');


    $user_id = $arr['user_id']   = create_id('user', 'user_id');
    $arr['user_password']   = password_hashing_hybrid_maker_checker(security('user_password'));

    if (!build_sql_insert('user', $arr)) {
        $error['user'] = 139;
        error_checker($return_url);
    }


    $name       = APP_NAME;
    $subject    = APP_NAME . " Sign Up";


    $body       = '<p style="font-family:Poppins, sans-serif; ">Welcome to ' . APP_NAME . ' ' . $arr['user_name'] . '  <br>';
    $body       .= 'We are so happy you have signed up.  <br>';
    $body       .= '<br><br>You may log in to your account <a href="' . base_url . '" style="cursor:pointer;"><b> BY CLICKING HERE </b></a>';
    $body       .= '</p>';
    $body       .= '<p style="font-family:Poppins, sans-serif; ">Yours,<br> JamboSure Management</p>';

    $body2      = '<p style="font-family:Poppins, sans-serif; ">A new user has signed up to ' . APP_NAME . ' with the details: <br> <b>USERNAME: </b> ' . $arr['user_name'] . ' <br>';
    $body2      .= ' <b>EMAIL: </b> ' . $arr['user_email'] . ' <br> ';
    $body2      .= '</p>';

    email($arr['user_email'], $subject, $name, $body);
    
    
    $session_login  = array(
        'user_login'        => true,
        'user_email'        => $arr['user_email'],
        'user_name'         => $arr['user_name'],
        'user_id'           => $arr['user_id'],
        'success'           => array('login' => 204)
    );

    session_assignment($session_login);





    $success['user'] = 203;
    render_success($return_url);
}


function post_client()
{
    global $arr;
    global $error;
    global $success;
    $return_url = admin_url . "view_users";

    if (!empty($_FILES['user_image']['name']))    $arr['user_image']   = upload('user_image');

    for_loop();

    if (!empty($error)) {
        error_checker($return_url);
    }


    if (isset($_SESSION['edit'])) {
        $id = $_SESSION['edit'];
        unset($_SESSION['edit']);

        if (!empty($arr['user_image']))   delete_file('user_image',   'user', 'user_id');

        if (!build_sql_edit('user', $arr, $id, 'user_id')) {
            $error['view_users'] = 153;
            error_checker($return_url);
        }

        $success['view_users'] = 224;
        render_success($return_url);
    }

    $arr['user_id'] = create_id('user', 'user_id');
    $arr['user_password']   = password_hashing_hybrid_maker_checker($arr['user_password']);

    if (!build_sql_insert('user', $arr)) {
        $error['view_users'] = 154;
        error_checker($return_url);
    }

    $subject    = APP_NAME . ' Account Creation';
    $name       = APP_NAME;
    $body       = '<p style="font-family:Poppins, sans-serif;"> ';
    $body       .= 'Hello, <b> ' . $arr['user_name'] . ' </b> <br>';
    $body       .= 'Your account has been successfully created.';
    $body       .= '<br>';
    $body       .= 'You may log in to your account in the future with these credentials';
    $body       .= '<br>';
    $body       .= '<b>EMAIL:</b> ' . $arr['user_email'] . ' <br>';
    $body       .= '<br>';
    $body       .= '<b>PASSWORD:</b> ' . security('user_password') . ' <br>';
    $body       .= '<br>';


    email($arr['user_email'], $subject, $name, $body);

    $success['view_users'] = 220;
    render_success($return_url);
}




function post_prod()
{
    global $arr;
    global $error;
    global $success;
    $return_url = admin_url . 'view_prods';


    $conn = connect();
    // cout($_POST);
    //prod DATA
    $prod_id = create_id('prod', 'prod_id');
    $arr['prod_id']         = $prod_id;
    // $arr['prod_code']       = security('prod_code');
    $arr['writer_id']       = security('writer_id');
    $arr['prod_name']       = security('prod_name');
    $arr['prod_type']       = security('prod_type');
    $arr['prod_category']   = security('prod_category');
    $arr['prod_price_type'] = 'rate';
    $arr['levy_rate']       = security('levy_rate');
    $arr['levy_rate'] = is_numeric($arr['levy_rate']) ? number_format($arr['levy_rate'], 2) : '0.00';


    if (isset($_POST['prod_tonne_one_fee']) && $_POST['prod_tonne_one_fee'] !== '') {
        $arr['prod_tonne_one_fee'] = mysqli_real_escape_string($conn, $_POST['prod_tonne_one_fee']);
    } else {
        unset($_POST['prod_tonne_one_fee']);
    }
    if (isset($_POST['prod_tonne_two_fee']) && $_POST['prod_tonne_two_fee'] !== '') {
        $arr['prod_tonne_two_fee'] = mysqli_real_escape_string($conn, $_POST['prod_tonne_two_fee']);
    } else {
        unset($_POST['prod_tonne_two_fee']);
    }
    if (isset($_POST['prod_tonne_three_fee']) && $_POST['prod_tonne_three_fee'] !== '') {
        $arr['prod_tonne_three_fee'] = mysqli_real_escape_string($conn, $_POST['prod_tonne_three_fee']);
    } else {
        unset($_POST['prod_tonne_three_fee']);
    }




        if (isset($_POST['prod_tonne_one_fee_12']) && $_POST['prod_tonne_one_fee_12'] !== '') {
        $arr['prod_tonne_one_fee_12'] = mysqli_real_escape_string($conn, $_POST['prod_tonne_one_fee_12']);
    } else {
        unset($_POST['prod_tonne_one_fee_12']);
    }
    if (isset($_POST['prod_tonne_two_fee_12']) && $_POST['prod_tonne_two_fee_12'] !== '') {
        $arr['prod_tonne_two_fee_12'] = mysqli_real_escape_string($conn, $_POST['prod_tonne_two_fee_12']);
    } else {
        unset($_POST['prod_tonne_two_fee_12']);
    }
    if (isset($_POST['prod_tonne_three_fee_12']) && $_POST['prod_tonne_three_fee_12'] !== '') {
        $arr['prod_tonne_three_fee_12'] = mysqli_real_escape_string($conn, $_POST['prod_tonne_three_fee_12']);
    } else {
        unset($_POST['prod_tonne_three_fee_12']);
    }


    if (isset($_POST['prod_general_cartiage_fee']) && $_POST['prod_general_cartiage_fee'] !== '') {
        $arr['prod_general_cartiage_fee'] = mysqli_real_escape_string($conn, $_POST['prod_general_cartiage_fee']);
    } else {
        unset($_POST['prod_general_cartiage_fee']);
    }
    if (isset($_POST['prod_own_goods_fee']) && $_POST['prod_own_goods_fee'] !== '') {
        $arr['prod_own_goods_fee'] = mysqli_real_escape_string($conn, $_POST['prod_own_goods_fee']);
    } else {
        unset($_POST['prod_own_goods_fee']);
    }


    if (isset($_POST['prod_one_fee']) && $_POST['prod_one_fee'] !== '') {
        $arr['prod_one_fee'] = mysqli_real_escape_string($conn, $_POST['prod_one_fee']);
    } else {
        unset($_POST['prod_one_fee']);
    }
    if (isset($_POST['prod_six_fee']) && $_POST['prod_six_fee'] !== '') {
        $arr['prod_six_fee'] = mysqli_real_escape_string($conn, $_POST['prod_six_fee']);
    } else {
        unset($_POST['prod_six_fee']);
    }
    if (isset($_POST['prod_twelve_fee']) && $_POST['prod_twelve_fee'] !== '') {
        $arr['prod_twelve_fee'] = mysqli_real_escape_string($conn, $_POST['prod_twelve_fee']);
    } else {
        unset($_POST['prod_twelve_fee']);
    }
    
    // echo json_encode($arr);
    // exit;

    build_sql_insert("prod", $arr);
    

    $valueClasses = $_POST['value_classes']; // Assuming value_classes is an array of value classes

    foreach ($valueClasses as $valueClass) {
        $valueClassData = array(
            'value_class_id' => create_id('value_class', 'value_class_id'),
            'prod_id' => $arr['prod_id'],
            'value_class_min_range' => mysqli_real_escape_string($conn, strtolower(str_replace(',', '', $valueClass['minrange']))),
            'value_class_max_range' => mysqli_real_escape_string($conn, strtolower(str_replace(',', '', $valueClass['maxrange']))),
            'value_class_rate' => mysqli_real_escape_string($conn, $valueClass['rate']),
            'value_class_price' => mysqli_real_escape_string($conn, $valueClass['price'])
        );

        build_sql_insert("value_class", $valueClassData);
    }

    //BENEFIT DATA
    // $id = security('product_id');
    $sql = "delete from prod_benefit where prod_id = '$prod_id'";
    insert_delete_edit($sql);
    foreach ($_POST['benefit_id'] as $key => $val) {
        $arr2['prod_benefit_id'] = create_id('prod_benefit', 'prod_benefit_id');
        $arr2['benefit_id'] = mysqli_real_escape_string($conn, $val);
        $arr2['prod_id'] = $prod_id;
        build_sql_insert("prod_benefit", $arr2);
    }



    $success['medication'] = 203;
    render_success($return_url);
}


function post_password()
{
    global $arr;
    global $error;
    global $success;
    $return_url = base_url . 'password';

    $current_password = security('current_password');
    $new_password = security('new_password');
    $confirm_password = security('confirm_password');

    // cout($_POST);

    $user = get_by_id('user', $_SESSION['user_id']);

    // if (password_hashing_hybrid_maker_checker($current_password, $user['user_password'])) {
    //     $error['user'] = 157;
    //     error_checker($return_url);
    // }

    // if (password_hashing_hybrid_maker_checker($new_password, $user['user_password'])) {
    //     $error['user'] = 156;
    //     error_checker($return_url);
    // }

    if ($new_password != $confirm_password) {
        $error['user'] = 145;
        error_checker($return_url);
    }

    $arr['user_password'] = password_hashing_hybrid_maker_checker($new_password);

    if (!build_sql_edit('user', $arr, $user['user_id'], 'user_id')) {
        $error['user'] = 160;
        error_checker($return_url);
    }

    $success['user'] = 226;
    render_success($return_url);
}


function post_admin_password()
{
    global $arr;
    global $error;
    global $success;
    $return_url = admin_url . 'password.php';

    $new_password = security('new_password');
    $confirm_password = security('confirm_password');

    // cout($_POST);

    $admin = get_by_id('admin', $_SESSION['admin_id']);

    if ($new_password != $confirm_password) {
        $error['admin'] = 145;
        error_checker($return_url);
    }

    $arr['admin_password'] = password_hashing_hybrid_maker_checker($new_password);

    if (!build_sql_edit('admin', $arr, $admin['admin_id'], 'admin_id')) {
        header("Location: $return_url?error=Details not updated!");
        exit;
    }

    header("Location: $return_url?success=Details updated successfully");
}

function post_admin()
{
    global $arr;
    global $error;
    global $success;
    $return_url = admin_url . 'admin';
    $success_url = admin_url . 'view_admins';

    for_loop();

    if (!empty($error)) {
        $url = $return_url . (isset($_SESSION['edit']) ? "?id=" . encrypt($_SESSION['edit']) : '');
        error_checker($url);
    }

    if (isset($_SESSION['edit'])) {
        $id = $_SESSION['edit'];
        unset($_SESSION['edit']);

        if (!build_sql_edit('admin', $arr, $id, 'admin_id')) {
            $error['admin'] = 141;
            error_checker($return_url . '   ?id=' . encrypt($id));
        }

        $success['admin'] = 208;
        render_success($return_url . '?id=' .  encrypt($id));
    }


    $password               = generateRandomString();
    $arr['admin_password']  = password_hashing_hybrid_maker_checker($password);
    $arr['admin_id']        = create_id('admin', 'admin_id');
    $id                     = $arr['admin_id'];

    // cout($arr);

    if (!build_sql_insert('admin', $arr)) {
        $error['admin'] = 140;
        error_checker($return_url);
    }

    $email      = $arr['admin_email'];
    $subject    = 'JamboSure Admin Addition';
    $name       = 'JamboSure';
    $body       = '<p style="font-family:Poppins, sans-serif;"> ';
    $body       .= 'Hello, <b>' . $arr['admin_name'] . '</b> <br>';
    $body       .= 'You have been successfully onboarded as a <b>' . $name . '</b> admin.<br>';
    $body       .= 'Use <b>' . $password . '</b> as the password to log into the dashboard. <br> ';
    $body       .= '</p>';

    email($email, $subject, $name, $body);
    $success['admin'] = 207;
    render_success($success_url);
}


function post_inquiry()
{
    global $arr;
    global $error;
    global $success;
    $return_url = base_uri . 'contact?suc';

    for_loop();

    $arr['inquiry_id'] = create_id('inquiry', 'inquiry_id');

    if (!build_sql_insert('inquiry', $arr)) {
        $error['inquiry'] = 152;
        error_checker($return_url);
    }

    $email      = 'info@lunafrica.com';
    $subject    = APP_NAME . ' Inquiry';
    $name       = APP_NAME;
    $body       = '<p style="font-family:Poppins, sans-serif;"> ';
    $body       .= 'Hello, admin</b> <br>';
    $body       .= 'You have a new inquiry';
    $body       .= '<br>';
    $body       .= '<b>NAME:</b> ' . $arr['inquiry_name'] . ' <br>';
    $body       .= '<br>';
    $body       .= '<b>EMAIL:</b> ' . $arr['inquiry_email'] . ' <br>';
    $body       .= '<br>';
    $body       .= '<b>PHONE:</b> ' . $arr['inquiry_phone'] . ' <br>';
    $body       .= '<br>';
    $body       .= '<b>MESSAGE:</b> ' . $arr['inquiry_message'] . ' <br>';
    $body       .= '<br>';
    $body       .= 'Log in to your admin dashboard : <a href=" ' . admin_url . ' "> CLICK HERE </a> to respond to the request';


    email($email, $subject, $name, $body);
    $success['inquiry'] = 223;
    render_success($return_url);
}


function post_new_password()
{
    global $arr;
    global $error;
    global $success;
    $return_url = admin_url . 'profile';

    // 	$password = md5($_POST['password']);

    $arr['user_password']       = password_hashing_hybrid_maker_checker($_POST['user_password']);

    if (!build_sql_edit('user', $arr, $_SESSION['user_id'], 'user_id')) {
        $error['user'] = 153;
        error_checker($return_url . '?failed');
    }


    $subject    = APP_NAME . ' Password Change';
    $name       = APP_NAME;
    $body       = '<p style="font-family:Poppins, sans-serif;"> ';
    $body       .= 'Hello, <b> ' . $_SESSION['user_name'] . ' </b> <br>';
    $body       .= 'Your account\'s password has been successfully changed.';
    $body       .= '<br>';
    $body       .= 'You may log in to your account in the future with these new credentials';
    $body       .= '<br>';
    $body       .= '<b>EMAIL:</b> ' . $_SESSION['user_email'] . ' <br>';
    $body       .= '<br>';
    $body       .= '<b>PASSWORD:</b> ' . $_POST['user_password'] . ' <br>';
    $body       .= '<br>';


    email($_SESSION['user_email'], $subject, $name, $body);

    $success['user'] = 224;
    render_success($return_url);
}





function delete_file($image, $table, $id_name, $default_path = 'images')
{
    $id_value = $_SESSION['edit'];

    $sql = "select $image from $table where $id_name = '$id_value'";
    $row = select_rows($sql)[0];

    return unlink(TARGET_DIR  . $default_path . '/' . $row[$image]);
}

function for_loop()
{
    global $arr;

    foreach ($_POST as $key => $value) {
        $arr[$key] = security($key);
    }
}



