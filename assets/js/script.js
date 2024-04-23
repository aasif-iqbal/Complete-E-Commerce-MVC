
function toggle(){
    var sideNav_menu = document.getElementById('sideNav_menu');
    // alert(sideNav_menu.id);
    let x = sideNav_menu;
    if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    // sideNav_menu.style='none';
}