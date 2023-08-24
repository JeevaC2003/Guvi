<?php 
session_start();
include("config.php");
if(isset($_POST['save_reg']))
{
	$name = mysqli_real_escape_string($db, $_POST['uname']);
    $mail = mysqli_real_escape_string($db, $_POST['mail']);
    $pass = mysqli_real_escape_string($db, $_POST['pass']);
	
    if($name == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }
	
    $query = "INSERT INTO user (uname,mail,pass) VALUES('$name','$mail','$pass')";
    $query_run = mysqli_query($db, $query);

       if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Details Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Details Not Updated'
        ];
        echo json_encode($res);
        return;
    }
	
}  
?>