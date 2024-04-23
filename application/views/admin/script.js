
function hide_show(){

    var hide_show_id = document.getElementById('hide_show_id');
    //alert(hide_show_id);
    
    // var x = document.getElementById("myDIV");
  if (hide_show_id.style.display === "none") {
    hide_show_id.style.display = "block";
  } else {
    hide_show_id.style.display = "none";
  }
}

