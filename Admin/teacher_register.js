//window.alert();
function validateForm() {
//    window.alert();
//    window.alert();
    
    var x = document.forms["myForm"]["name"].value;
    var y = document.forms["myForm"]["email"].value;
    var z = document.forms["myForm"]["password"].value;
    var w = document.forms["myForm"]["branch"].value;
    
    if (x == "" || y== "" || z == "" || w== '0') 
    {
        if( x == ""){
        document.getElementById("teacher_name").innerHTML="Please enter name!";
        }
        if (y == ""){
//       
        document.getElementById("teacher_email").innerHTML="Please enter email!";
       
        }
        if (z == "")
        {
                document.getElementById("teacher_password").innerHTML="Please enter password!";
        }
        if(w == '0')
        {
            document.getElementById("teacher_branch").innerHTML="Please select branch!";
        }
        
        
        
//        window.alert("hi");
        return false;
    }
    
    
    
}
