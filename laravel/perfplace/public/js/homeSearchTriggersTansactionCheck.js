$(document).ready(function () {
    if(window.location.href.indexOf("buyButton=Buy") > -1) {
       document.getElementById("buyCheck").checked = true;
    }
    if(window.location.href.indexOf("rentButton=Rent") > -1) {
       document.getElementById("rentCheck").checked = true;
    }
});