<?php      
    include('connection.php');  
    if(isset($_POST['loginBtn'])) {
    
        $username = $_POST['username'];  
        $password = $_POST['password'];  

        
        
            //to prevent from mysqli injection  
            $username = stripcslashes($username);  
            $password = stripcslashes($password);  
            $username = mysqli_real_escape_string($con, $username);  
            $password = mysqli_real_escape_string($con, $password);  
        
            $sql = "select * from employee where username = '$username' and password = '$password'";  
            $result = mysqli_query($con, $sql);  
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
            $count = mysqli_num_rows($result);  
            
            if($count == 1){  
                setcookie("user_name", $username, time() + (86400 * 30), "/");
                header("Location: attendance.html"); 
            }  
            else{  
            
            header("Location: index.html");
            } 
   } else {
       header("Location: index.html");
   }
        
?>
