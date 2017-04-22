function houseOrApartmentCheck() {
    if (document.getElementById('apartmentCheck').checked) {
        document.getElementById('nrOfFloors').style.display='none';
        document.getElementById('floorNumber').style.display='inline';
    }
    if (document.getElementById('houseCheck').checked) {
        document.getElementById('floorNumber').style.display='none';
        document.getElementById('nrOfFloors').style.display='inline';
    }
}
window.onload=function () {
    document.getElementById("nrOfFloors").classList.remove("hidden");
    houseOrApartmentCheck();
}

// forceNumeric() plug-in implementation
jQuery.fn.forceNumeric = function () {

    return this.each(function () {
        $(this).keydown(function (e) {
            var key = e.which || e.keyCode;

            if (!e.shiftKey && !e.altKey && !e.ctrlKey &&
                // numbers
                key >= 48 && key <= 57 ||
                // Numeric keypad
                key >= 96 && key <= 105 ||
                // comma, period and minus, . on keypad
                key == 190 || key == 188 || key == 109 || key == 110 ||
                // Backspace and Tab and Enter
                key == 8 || key == 9 || key == 13 ||
                // Home and End
                key == 35 || key == 36 ||
                // left and right arrows
                key == 37 || key == 39 ||
                // Del and Ins
                key == 46 || key == 45)
                return true;

            return false;
        });
    });
}
    $(document).ready(function () {
        $(".numberInput").forceNumeric();
        $("nrOfRooms").forceNumeric();
        $("propertyPrice").forceNumeric();
        $("propertySurface").forceNumeric();
        $("floorNumber").forceNumeric();
        $("nrOfFloors").forceNumeric();
    });

