<?php
include "config.php";

if(isset($_POST['changepasswordBtn'], $_POST['token'])){
    if(validation_token($_POST['token'])) {
        $_form_errors = array();
        $required_fields = array('currentpassword','newpassword','confirmpassword');
        $_form_errors = array_merge($form_errors, check_empty_fields($required_fields));
        $fields_to_check_length = array('new_password' => 8, 'confirm_password' =>8);
        $form_errors = array_merge($form_errors, check_min_length($fields_to_check_length));


        if(empty($form_errors)){
            $currentpassword = $_POST['currentpassword'];
            $password1 = $_POST['newpassword'];
            $password2 = $_POST['confirmpassword'];

            if ($password1 != $password2) {
                $result = flashMessage("New password and confirm password does not match");
            }else{
                try{

                        $sql = "select password FROM users Where id = :id";
                        $statement = $db->prepare($sqlquery);
                        $statement->execute(array(':id' =>$id));
                        if ($row = $statement->fetch(){
                            $password_from_db = row['password'];
                        }else{
                                
                        signout();
                        })
                }catch (PDOException $ex){
                    $result=flashMessage("An error occured:" .$ex->getMessage());
                }
            }
                # code...
            }
            else{
                if(count($form_errors)==1){
                    $result = flashMessage("There was 1 errror in the form<br>");
                }else{
                    $result = flashMessage("There were " .count($form_errors). "errors in the form<br>");
                }
            }
        }else{
            $result = "<script type='text/javascript'>
            swal('Error','This request originates from an unknown source,'error');
            </scipt>";
        }
    }


?>