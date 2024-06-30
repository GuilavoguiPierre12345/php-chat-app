<?php
session_start();
require_once('./config.php');
$conn = getConnextion();
$fname = htmlspecialchars($_POST['fname']);
$lname = htmlspecialchars($_POST['lname']);
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);

if (!empty($fname) && !empty($lname) && !empty($email) && 
    !empty($password)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // verification de doublon d'email
            $sql = "SELECT * FROM users WHERE email =:email";
            $stm = $conn -> prepare($sql);
            $stm -> execute([':email' => $email]);
            if ($stm -> rowCount() === 0) {
                if ($_FILES['image']) {
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode);
                    $extentions = ['jpeg', 'jpg', 'png'];
                    if (in_array( $img_ext,$extentions)) {
                        $time = time();
                        $new_img_name = $time . $img_name;
                        if(move_uploaded_file($tmp_name,"images/".$new_img_name)) {
                            $random_id = rand(time(), 10000000);
                            $status = 'active now';
                            
                            $sql2 = "INSERT INTO users(unique_id,fname,lname,email,password,img,status) 
                                    VALUES(:unique_id,:fname,:lname,:email,:password,:img,:status)";
                            $stm2 = $conn -> prepare($sql2);
                            $response = $stm2 -> execute([
                                ':unique_id' => $random_id,
                                ':fname' => $fname,
                                ':lname' => $lname,
                                ':email' => $email,
                                ':password' => $password,
                                ':img' => $new_img_name,
                                ':status' => $status
                            ]);
                            // recuperer l'utilisateur inserer
                            if ($response) {
                                $sql3 = "SELECT * FROM users WHERE email = :email";
                                $stm3 = $conn -> prepare($sql3);
                                $stm3 -> execute([':email' => $email]);
                                $user = $stm3 -> fetch(PDO::FETCH_OBJ);
                                $_SESSION['unique_id'] = $user->unique_id;
                                echo 'Success';
                            }
                        } 
                    }else {
                        echo 'Please select an image file - jpeg, jpg or png';
                    }
                } else {
                    echo 'Please select an image file';
                }
            } else {
                echo $email . ' is already exists';
            }
        }else {
            echo $email . ' this is not a valid email';
        }
} else {
    echo "All input fields are required";
}
