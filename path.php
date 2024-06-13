<?php
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', 1);

$http_host  = "https://$_SERVER[HTTP_HOST]";
$php_self   = explode(".", $_SERVER['PHP_SELF'])[0];
$http_model = "https://$_SERVER[HTTP_HOST]/model/update/create?action=";
$http_delete = "https://$_SERVER[HTTP_HOST]/model/delete/index?";

define('admin_uri', $http_host . "/dashboard");
define('admin_url', $http_host . "/dashboard/");

define('model_url', $http_model);

define('base_url', "https://jambosure.com/");
define('base_uri', "https://jambosure.com");

define('creator_uri', "https://hello.angacinemas.com/");
define('delete_url', "$http_delete");


define('cookie_domain', "$_SERVER[HTTP_HOST]");

define('ROOT_PATH', realpath(dirname(__FILE__)) . '/');
define('MODEL_PATH', realpath(dirname(__FILE__)) . '/model/');

define('TARGET_DIR', "/home/jambosure/public_html/uploads/");
// define('LOG_DIR', $http_host . "/log/");


define('file_url', 'https://jambosure.com/uploads/images/');
define('logo_url', $http_host . "/dashboard/assets/img/logos/logo.png");

// LOCAL
// $http_host  = "https://$_SERVER[HTTP_HOST]";
// $php_self   = explode(".", $_SERVER['PHP_SELF'])[0];
// $http_model = "https://$_SERVER[HTTP_HOST]/jambosure/model/update/create?action=";
// $http_delete = "https://$_SERVER[HTTP_HOST]/jambosure/model/delete/index?";

// define('admin_uri', $http_host . "/jambosure");
// define('admin_url', $http_host . "/jambosure/");
// define('model_url', $http_model);
// define('base_uri', "https://localhost/jambosure/");
// define('base_url', "https://localhost/jambosure");

// define('creator_uri', "https://vesencomputing.com/");
// define('delete_url', "$http_delete");

// define('cookie_domain', "$_SERVER[HTTP_HOST]");

// define('ROOT_PATH', realpath(dirname(__FILE__)) . '/');
// define('MODEL_PATH', realpath(dirname(__FILE__)) . '/model/');

// define('TARGET_DIR', 'C:/xampp/htdocs/jambo/uploads/');
// define('LOG_DIR', 'C:/xampp/htdocs/jambo/log/');


// define('file_url', "$http_host/jambo/uploads/images/");
// define('logo_url', $http_host . "/jambo/assets/img/logos/logo.png");
