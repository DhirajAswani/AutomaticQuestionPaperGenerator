////window.alert();
//function showModule(val){
//    window.alert();
//    if(val == 0){
//        return;
//    }
////    window.alert();
//    xhttp=new XMLHttpRequest();
//    xhttp.onreadystatechange = function(){
//        window.alert(val);
//        if(this.readystate == 4 && this.status == 200){
//            document.getElementById("module_select").innerHTML=this.responseText;
//        }
//    };
//    this.open("GET","selectmodule.php?q="+val);
//    this.send();
//}
//
function showModule(val){
        
        if(val == ""){
//            window.alert();
            return;
        }
          xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
//      window.alert();
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("module_select").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "module_select.php?q="+ val, true);
  xhttp.send();

    }


function showChapter(val){
//    window.alert();
//    if(val == ""){
//        return;
//    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
////      window.alert();
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("chapter_select").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "chapter_select.php?q="+ val, true);
  xhttp.send();

    }
























