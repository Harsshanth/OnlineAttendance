// Verification of User name and password

function validate() 
{
    

    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    
    if (username==""||password==""){
        alert("Username or Password are empty");
        return false;
    }
    
}

//  Navigation
function leaveForm(){
    window.location.href="leaveForm.php";
    return false;
}

//  Navigation
function exitTo(){
    window.location.href="attendance.html";
    return false;
}



  
  
