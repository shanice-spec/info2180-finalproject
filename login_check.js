var email = document.getElementById("email");
var password = document.getElementById("password");
var btn = document.getElementById("login");

var xhr = new XMLHttpRequest();

btn.addEventListener("click", () =>{
    //Do a get request to the login php file
    //If password and email is in database, the return is 'success'
    //If 'success', do a get request to the dashboard file
    //replace the body of the index file with the dashboard file
    $.get("login.php?email="+email.value+"&password="+password.value, function(responseText){
        console.log("hello");
        if(responseText=="success"){
            console.log("hi");
            $.get("allcontacts.php", function(responseText){
                $("body").html(responseText);
            });

        }else{
            alert("Invalid Credentials");
        }
    });
});