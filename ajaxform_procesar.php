<?php 
    $email_check = '';
    $return_arr = array();

    if(filter_var($_POST['email_ajax'], FILTER_VALIDATE_EMAIL) || filter_var($_POST['email_post'], FILTER_VALIDATE_EMAIL)) {
       $email_check = 'ok';
    }
    else {
        $email_check = 'ko';
    }


    $return_arr["validar"] = $email_check;

    if (isset($_POST['email_ajax'])){
        $return_arr["name"] = $_POST['name_ajax'];
        $return_arr["email"] = $_POST['email_ajax'];
    } else {
        $return_arr["name"] = $_POST['name_post'];
        $return_arr["email"] = $_POST['email_post'];

    }

    echo json_encode($return_arr);

 ?>