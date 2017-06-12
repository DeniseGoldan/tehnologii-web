function houseOrApartmentCheck() {
    if (document.getElementById('apartmentCheck').checked) {
        document.getElementById('numberOfFloors').style.display='none';
        document.getElementById('label_numberOfFloors').style.display='none';
        document.getElementById('floorNumber').style.display='inline';
        document.getElementById('label_floorNumber').style.display='inline';

    }
    if (document.getElementById('houseCheck').checked) {
        document.getElementById('floorNumber').style.display='none';
        document.getElementById('label_floorNumber').style.display='none';
        document.getElementById('numberOfFloors').style.display='inline';
        document.getElementById('label_numberOfFloors').style.display='inline';
    }
}
window.onload=function () {
    document.getElementById("numberOfFloors").classList.remove("hidden");
    document.getElementById('label_numberOfFloors').classList.remove("hidden");
    houseOrApartmentCheck();
}