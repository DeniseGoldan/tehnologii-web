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