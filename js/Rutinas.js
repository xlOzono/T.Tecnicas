function openTab(routineName) {
    var i;
    var x = document.getElementsByClassName("wrapper");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
    }
    document.getElementById(routineName).style.display = "block";  
  }