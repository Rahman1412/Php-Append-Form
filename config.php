<?php 
session_start();

$conn = mysqli_connect("localhost","root","","php_13");
// if($conn){
//     echo"Hello";
// }
if(isset($_POST['insert'])){
    $email = $_POST['email'];
    $phone = $_POST['phone_no'];

        $form_data = array();
        foreach($email as $key => $value){
            if($value !="" && $phone[$key] !=""){
                $form_data[]=array(
                    "email" => $value,
                    "phone_no" => $phone[$key]
                );
            }
        }

        if(empty($form_data)){
            $message = '<div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Error!</strong> Empty Value.    
                    </div>';
            $_SESSION['success'] = $message;
        }else{
            $form_values = serialize($form_data);
            $sql = "INSERT INTO `users`(`form_data`)VALUES('$form_values')";
            $ins = mysqli_query($conn,$sql);
            if($ins){
                $message = '<div class="alert alert-success alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Success!</strong> Data inserted successfully.    
                            </div>';
                $_SESSION['success'] = $message;
            }
        }
}

?>
