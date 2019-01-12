//window.alert();
function validateForm() {
//    window.alert();
//    window.alert();
    
    var x = document.forms["myForm"]["name"].value;
    var y = document.forms["myForm"]["branch_select"].value;
    var z = document.forms["myForm"]["student_select"].value;
    
    
    if (x == "" || y== '0' || z == "") 
    {
        if( x == ""){
        document.getElementById("group_name").innerHTML="Please enter name!";
        }
        if (y == '0'){
//       
        document.getElementById("group_branch").innerHTML="Please select branch!";
       
        }
        if (z == "")
        {
                document.getElementById("group_student").innerHTML="Please select Student!";
        }
        
        
        
//        window.alert("hi");
        return false;
    }
    
    
    
}
