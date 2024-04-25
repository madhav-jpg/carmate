window.onload = function() {
  var btn= document.getElementById("signup");
  btn.disabled=true;
}
function agreed(checkboxElem) {
  if (checkboxElem.checked==true) 
  {
  		btn.disabled=true;
  } 
  else 
  {
    	btn.disabled=true;
  }
}