//Beginning of Side Bar Items
var home = document.getElementById("home");
var user = document.getElementById("user");
var logout = document.getElementById("logout");
var contact = document.getElementById("addcontact");
var contactbtn= document.getElementById("new_contact_create");
//End of Side Bar items

//Beginning of filter items headings

var all = document.getElementById("all-filter");
var support = document.getElementById("support-filter");
var sales = document.getElementById("sales-filter");
var assigned_con = document.getElementById("assigned-filter")
//End of filter items

//Beginning of filter rows 
var all_issues = $(".all");
//End of filter rows

//Beginning of hyperlinks
var views = document.getElementsByClassName("views");
var views_id = document.getElementsByClassName("views_id");
//End of hyperlinks

//Variables for contact
var title = document.getElementById("add-contact-title");
var con_fname = document.getElementById("add-contact-fname");
var con_lname = document.getElementById("add-contact-lname");
var email= document.getElementById("add-contact-email");
var phone = document.getElementById("add-contact-telephone");
var company = document.getElementById("add-contact-company");
var type = document.getElementById("con-type");
var con_assign= document.getElementById("con-assigned");
var createContact = document.getElementById("conSubmit");



//Beginning of create user
var fname = document.getElementById("add-user-fname");
var lname = document.getElementById("add-user-lname");
var Useremail = document.getElementById("add-user-email");
var Userpassword = document.getElementById("add-user-password");
var role = document.getElementById("role");
var createUser = document.getElementById("addSubmit");
var createNewUser = document.getElementById("new_user_create");
//End of create user




//Check if hyperlink for issue is clicked
if(views){
    for(let i = 0; i < views.length; i++){
        views[i].addEventListener("click", () =>{
            $.get("viewcontact.php?conid="+views_id[i].value, function(responseText){
                $("body").html(responseText);
            });
        });
    }
}
//End of hyperlink check




//Check if filter by all is clicked
if(all){
    all.addEventListener("click", ()=>{
        support.classList.remove("active");
        assigned_con.classList.remove("active");
        all.classList.add("active");
        sales.classList.remove("active")
        all_issues.each(function(i){
            $(this).show();
        });
    
    });
}
//End of all check

//Check if filter by support is clicked
if(support){
    support.addEventListener("click", ()=>{
        support.classList.add("active");
        assigned_con.classList.remove("active");
        all.classList.remove("active");
        sales.classList.remove("active");
    
        all_issues.each(function(i){
            if($(this).hasClass("Support")){
                $(this).show();
            }
            else{
                $(this).hide();
            }
        });
    
    });
}

//Check if filter by assigned is clicked
if(assigned_con){
    assigned_con.addEventListener("click", ()=>{
        support.classList.remove("active");
        assigned_con.classList.add("active");
        all.classList.remove("active");
        sales.classList.remove("active");
    
        all_issues.each(function(i){
            if($(this).hasClass("assigned")){
                $(this).show();
            }
            else{
                $(this).hide();
            }
        });
    });
}




if(sales){
    sales.addEventListener("click", ()=>{
        support.classList.remove("active");
        assigned_con.classList.remove("active");
        all.classList.remove("active");
        sales.classList.add("active");
    
        all_issues.each(function(i){
            if($(this).hasClass("Sales-Leads")){
                $(this).show();
            }
            else{
                $(this).hide();
            }
        });
    });
}

//Check if home side bar item is clicked
if(home){
    home.addEventListener("click", ()=>{
        $.get("allcontacts.php", function(responseText){
            $("body").html(responseText);
        });
    });
}
//End of home side bar check

//Check if user side bar item is click
if(user){
    user.addEventListener("click", ()=>{
        $.get("viewusers.php", function(responseText){
            $("body").html(responseText);
        });
    });
}
//End of user side bar item check

//Check if contact side bar item is clicked
if(contact){
    contact.addEventListener("click", ()=>{
        $.get("createcontact.php", function(responseText){
            $("body").html(responseText);
        });
    });
}

if(contactbtn){
    contactbtn.addEventListener("click", ()=>{
        $.get("createcontact.php", function(responseText){
            $("body").html(responseText);
        });
    });
}

//Check if logout is clicked
if(logout){
    logout.addEventListener("click", ()=>{
        $.get("logout.php", function(responseText){
            $.get("index.php", function(responseText){
                $("body").html(responseText);
            });
        });
    });
}
//End of logout check

//Check if create user is click
if(createNewUser){
    createNewUser.addEventListener("click", ()=>{
        $.get("adduser.php", function(responseText){
            $("body").html(responseText);
        });
    });
}


//Check if the button to create a new contact is clicked
if(createContact){
    createContact.addEventListener("click", ()=>{
        //Check if form is filled out
        if(title.value != "" && con_fname.value != "" && con_lname.value != ""  && email.value != "" && phone.value != "" && con_assign.options[con_assign.selectedIndex].value != ""  ){
            $.get("submitContact.php?title="+title.value+"&fname="+con_fname.value+"&lname="+con_lname.value+"&email="+email.value+"&telephone="+phone.value+"&company="+company.value+"&type="+type.options[type.selectedIndex].value+"&user="+con_assign.options[con_assign.selectedIndex].value, function(responseText){
                
                eval(responseText);
                title.value="";
                con_fname.value = "" ;
                con_lname.value="";
                email.value= ""; 
                phone.value= ""; 
                
            });
        }else{
            alert("Invalid data entered with form fields.");
        }
    });
}

//Check if the button to create a new user is clicked
if(createUser){
    createUser.addEventListener("click", ()=>{
        email_reg = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        
        if(fname.value != "" && lname.value != "" && role.value !="" && email_reg.test(Useremail.value) && /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/.test(Userpassword.value)){
            $.get("submitUser.php?fname="+fname.value+"&lname="+lname.value+"&email="+Useremail.value+"&password="+Userpassword.value+"&role="+role.options[role.selectedIndex].text, function(responseText){
                eval(responseText);
                fname.value="";
                lname.value="";
                Useremail.value="";
                Userpassword.value="";
                
            });
        }else{
            alert("Invalid data entered with form fields.");
        }
    });
}