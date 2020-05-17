

<?php
session_start();

  
 $email = $_POST['email'];
 $firstname = $_POST['firstname'];
 $lastname = $_POST['lastname'];
 $telephone = $_POST['telephone'];
 $password = $_POST['password'];
 $rptPassword = $_POST['password-repeat'];

if (!empty($email) || !empty($firstname) || !empty($lastname) || !empty($telephone) || !empty($password) || !empty($rptPassword)) {
    $servername = "localhost";
    $username = "root";
    $dbPassword = "";
    $dbname = "webassignment";
    
    $conn = new mysqli($servername, $username, $dbPassword, $dbname); 

    if (mysqli_connect_error()) {

        die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
    } else {

       
       if(strcmp($password,$rptPassword) == 0  ) {
            $INSERT = "INSERT INTO user (Email, UsrPassword, Firstname, Surname, Telephone) values(?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($INSERT);
            //Need to map the data type of the database s = string , i = integer
            $stmt->bind_param("ssssi", $email, $password, $firstname, $lastname, $telephone);
            $stmt->execute();
            
            
            $_SESSION['result'] = '<script>alert("Record inserted in database") </script>';

          
            $stmt->close();
            $conn->close();
            header('Location: register.php');
            exit;

        } else {
            $_SESSION['result'] = '<script>alert("Passwords do not match") </script>';
            header('Location: register.php');
            exit;
        }

    }
} else {
    $_SESSION['result'] = '<script> alert("All fields are required") </script>'; 
    header('Location: register.php');
    exit;
}
    ?>