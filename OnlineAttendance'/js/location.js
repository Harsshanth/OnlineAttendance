// navigator.geolocation.getCurrentPosition() returns the latitude and longitude of user location
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }
function currentLocation(){


    navigator.geolocation.getCurrentPosition(
        successCallback,
        errorCallback_highAccuracy,
        {maximumAge:600000, timeout:5000, enableHighAccuracy: true}
    
    ); 
}

// errorCallback_highAccuracy() --> if accuracy is low , make  enableHighAccuracy: false

function errorCallback_highAccuracy(error) {
    if (error.code == error.TIMEOUT)
    {
        // Attempt to get GPS loc timed out after 5 seconds, 
        // try low accuracy location
        console.log("low Accuracy");
        navigator.geolocation.getCurrentPosition(
                successCallback, 
                errorCallback_lowAccuracy,
                {maximumAge:600000, timeout:10000, enableHighAccuracy: false});
        return;
    }
    
    
    if (error.code == 1)
        alert( "PERMISSION_DENIED");
    else if (error.code == 2)
        alert ("POSITION_UNAVAILABLE");
    
}

// Error in getting the location  

function errorCallback_lowAccuracy(error) {
    
    if (error.code == 1)
        alert( "PERMISSION_DENIED");
    else if (error.code == 2)
        alert( "POSITION_UNAVAILABLE");
    else if (error.code == 3)
        alert( "TIMEOUT");
    
    
    
}

// Function to get successfull location

// userName=kanaga@123
// {userName: kanaga@123}

function successCallback(position) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;

    console.log(latitude);
    console.log(longitude);

    if(latitude>=11.00 &&  latitude < 12){
        if(longitude>=78 && longitude<79) {
        fetch("/apiAttedance.php?userName="+getCookie("user_name")).then (res => res.json())
          .then(res => {
              if (res.status === false) {
                  alert("error");
                  return;
              }
              console.log(res);
              alert("Attedance has been marked");
          }).catch(console.log);
        }
        else
        alert("Please be inside the organisation location");
    }
    else 
    alert("Please be inside the organisation location");
    
    
}
       