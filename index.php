<?php

require_once('../model/database.php');
require_once('../model/product_db.php');
require_once('../model/fields.php');
require_once('../model/validate.php');







function validate_add_action()
{
    // Create a new instance of Validate
    $validate = new Validate();

    // Define an array of field names
    $fieldNames = ['code', 'name', 'version', 'release_date'];

    // Loop through each field name
    foreach ($fieldNames as $fieldName) {
        // Filter the input for the current field
        $filteredValue = filter_input(INPUT_POST, $fieldName);

        // Add the field to the Validate instance
        $validate->getFields()->addField($fieldName, $filteredValue);

        // Validate the field
        $validatedField = $validate->text($fieldName, $filteredValue);

        // If the field has an error, include the error page and return
        if ($validatedField->hasError()) {
            include("../errors/error.php");
            $error = "Product add failed. Please try again. Error at field: $fieldName";
            return;
        }
    }

    // If all fields are valid, try to add the product
    try {
        add_product(
            $validate->getFields()->getField('code')->getValue(),
            $validate->getFields()->getField('name')->getValue(),
            $validate->getFields()->getField('version')->getValue(),
            $validate->getFields()->getField('release_date')->getValue()
        );

        // If the product was added successfully, include the product list and show an alert
        include("product_list.php");
        echo "<script>alert(`Product added Successfully!`)</script>";
    } catch (PDOException $pdo_error) {
        // If there was a database error, include the error page
        $error = "Product add failed. Database error. Please try again";
        include("../errors/error.php");
    } catch(TypeError $type_error) {
        // If there was a type error, include the error page
        $error = "Product add failed. . Please try again";
        include("../errors/error.php");
    }
}


function validate_delete_action()
{
    $product_code = filter_input(INPUT_POST, 'productCode');

    try {
        delete_product($product_code);
                    echo "<script>alert(`Product deleted Successfully!`)</script>";

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