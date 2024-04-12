<?php

require('../model/database.php');
require('../model/product_db.php');







function validate_add_action()
{
    $post_fields_empty =   (empty($_POST['code'])) || (empty($_POST['name'])) || (empty($_POST['version'])) || (empty($_POST['release_date']));


    if ($post_fields_empty) {
        $error =  "invalid productdata. check all fields and try again";

        include("./errors/error.php");
    } else {
        $code = filter_input(INPUT_POST, "code");
        $name = filter_input(INPUT_POST, "name");
        $version = filter_input(INPUT_POST, "version");
        $release_date = filter_input(INPUT_POST, "release_date");

        try {
            add_product($code, $name, $version, $release_date);
        } catch (PDOException $e) {
            $error = "product add failed. Please try again";
            include("./errors/error.php");
        }
    }
}


function validate_delete_action()
{
    $product_code = filter_input(INPUT_POST, 'productCode');

    try {
        delete_product($product_code);
        echo "Item deleted successfully!";
        include('product_list.php');
    } catch (PDOException $e) {

        $error = "product was not deleted properly, please try again.";
        include("./errors/error.php");
    }
}

function validate_show_add_form()
{

    $filter_code = filter_input(INPUT_POST, "code");
    include("./views/product_add.php");
}

function validate_list_products($action)
{
}

print_r($_POST);
$action = $_POST['action'];

switch ($action) {

    case 'add_product':
        validate_add_action();
        break;



    case 'delete_product':
        validate_delete_action();
        break;



    default:
        $error = "under construction";
        include("./errors/error.php");
}



//also validates code name and version. 
//validate and santitize


function santize_field($field)
{ // is going to santize the input i.e. take away any unwanted characters from input

}

#function filter_action() { //filters the post action to see if anything was posted
#
#    $action = filter_input(INPUT_POST, 'action');
#    if ($action === NULL) {
#        $action = filter_input(INPUT_GET, 'action');
#        if ($action === NULL) {
#            $action = 'under_construction';
#        }
#    }
#
#    if ($action == 'under_construction') {
#        include('../under_construction.php');
#    }
#
#}
