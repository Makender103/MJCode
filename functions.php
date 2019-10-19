<?php

function verification(){
    <?php
include_once'Includes/header.php';
$Count_NameErr = $Count_emailErr = $CountMessErr = 0;

if (isset($_POST['Send'])) {

    $name = trim(addslashes($_POST['name']));
    $email = trim(addslashes($_POST['email']));
    $message = trim(addslashes($_POST['message']));
    $service = (trim(addslashes($_POST['service'])))? trim(addslashes($_POST['service'])):'B';
	$date = date("Y-m-d h:i:s");

	$MJcode = new MJcode($name, $email, $message, $service, $clock);

    if (empty($name)) {
        $NameErr = 'Please enter your name';
        $Count_NameErr++;
    } else if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $NameErr = 'Only letters and white space allowed';
        $Count_NameErr++;
    }

    if (empty($email)) {
        $emailErr = 'Please Enter your email';
        $Count_emailErr++;
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = 'Invalid email format';
        $Count_emailErr++;
    }

    if(empty($message)) {
        $messErr = 'Please write your message';
        $CountMessErr++;
    }

    if($CountMessErr == 0 && $Count_emailErr == 0 && $Count_NameErr == 0){
        if ($MJcode->insertContact()) {
        	$mes = "<div class='alert alert-success' role='alert' id='Status_mes'>
  							Foda-se!
					</div>";
        }
        else{
        	$mes = "<div class='alert alert-danger' role='alert'>
  						Sent failed!
					</div>";
			$mes.= mysqli_error($connect);
        }
    }

}
