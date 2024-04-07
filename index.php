<?php /*
    Within the index.php file, validate the data the user enters
on the Add Product page to be sure that the user enters
product code, name, version and release date. If this data
isn’t provided, display an Error page that indicates that a
required field was not entered.
o Check action for list_products – import product_list
 Call get_products method from products_db
located in the model folder
o Check action for delete_product
 Filter input for product_code
 Call delete_product method
 Define the header
o Check action for show_add_form
 Import product_add.php
o Check action for add_product
 Filter input for code, name, version, release date
 Validate the input for empty-- "Invalid product
data. Check all fields and try again."
 Import /errors/error.php
 If valid, call add_product method
 Define the header
*/
 require('./models/database.php');
 require('./models/product_db.php');

print_r($_POST); //displays the _post superglobal variable when it has been populated
print_r($_POST['action']);

function validate_string($code) { //validates the code that was in the switch statement

}

//also validates code name and version. 


function validate_field($field) { //validates each of the individual fields to see if each of the fields are valid return true or false, based on each field using switch

    switch($field) {
        case 'code':
            return 

        case 'name':

        case 'version':
        
        case 'release_date':
        
    }
}

function santize_field($field) { // is going to santize the input i.e. take away any unwanted characters from input
    
}

function filter_action() { //filters the post action to see if anything was posted

    $action = filter_input(INPUT_POST, 'action');
    if ($action === NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action === NULL) {
            $action = 'under_construction';
        }
    }

    if ($action == 'under_construction') {
        include('../under_construction.php');
    }

}

filter_action();



?>