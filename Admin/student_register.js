function validateForm() {
//    window.alert();
    var x = document.forms["myForm"]["name"].value;
    var y = document.forms["myForm"]["email"].value;
    var z = document.forms["myForm"]["password"].value;
    var w = document.forms["myForm"]["division_select"].value;
    var v = document.forms["myForm"]["branch_select"].value;
    
    if (x == "" || y== "" || z == "" || w== '0' || v=='0') {
        if( x == ""){
        document.getElementById("student_name").innerHTML="Please enter name!";
        }
        if (y == ""){
//       
        document.getElementById("student_email").innerHTML="Please enter email!";
       
        }
        if (z == "")
        {
                document.getElementById("student_password").innerHTML="Please enter password!";
        }
        
        
        if (w == "0")
        {
                document.getElementById("student_division").innerHTML="Please select division!";
        }
        
        if (v == "0")
        {
                document.getElementById("student_branch").innerHTML="Please select Branch!";
        }
        
        
        return false;
    }
    
    
    
}









//function check(){
//    
//    $var = document.getElementById("name").value;
//    document.getElementById("student_name").innerHTML="sanjay";
////    window.alert();
//    
//    if($var == "")
//        {
////            window.alert();
//            document.getElementById("student_name").innerHTML="Enter name";
//            
//        }
//}
//document.getElementById("register").onclick = function(){
//                check();
//                
//}