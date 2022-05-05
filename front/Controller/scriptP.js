function minDtate() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd;
    }
    if (mm < 10) {
        mm = '0' + mm;
    }
    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("DateF").setAttribute("min", today);
}

function GetSelect() {
    var select = document.getElementById("selectP");
    var display = select.options[select.selectedIndex].text;
    document.getElementById("Nom").value = display;
}

function Equation() {
    var Prix = document.getElementById("PrixA").value - (document.getElementById("PrixA").value * document.getElementById("Remise").value / 100);
    document.getElementById("PrixN").setAttribute("value", Prix);
}

function Validation() {
    var Id = document.getElementById('Id').value;
    var IMG = document.getElementById('IMG').value;
    var Nom = document.getElementById('Nom').value;
    var DateD = document.getElementById('DateD').value;
    var DateF = document.getElementById('DateF').value;
    var PrixA = document.getElementById('PrixA').value;
    var Remise = document.getElementById('Remise').value;

    if (Id != '' || IMG != '' || Nom != '' || DateD != '' || DateF != '' || PrixA != '' || Remise != '') {
        document.getElementById('IdP').innerHTML = "";
        document.getElementById('IMGP').innerHTML = "";
        document.getElementById('NomP').innerHTML = "";
        document.getElementById('DateDP').innerHTML = "";
        document.getElementById('DateFP').innerHTML = "";
        document.getElementById('PrixAP').innerHTML = "";
        document.getElementById('RemiseP').innerHTML = "";
    }
    var verif = -1;
    if (Id == '' || Id == null) {
        document.getElementById('IdP').innerHTML = "ID is required";
        verif = 0;
        return false;
    } else verif = 1;
    if (isNaN(Id)) {
        document.getElementById('IdP').innerHTML = "Only digits are allowed";
        verif = 0;
        return false;
    } else verif = 1;
    if (IMG == '' || IMG == null) {
        document.getElementById('IMGP').innerHTML = "Image is required";
        verif = 0;
        return false;
    } else verif = 1;
    if (Nom == '' || Nom == null) {
        document.getElementById('NomP').innerHTML = "Nom is required";
        verif = 0;
        return false;
    } else verif = 1;
    if (!isNaN(Nom)) {
        document.getElementById('NomP').innerHTML = "Only characters are allowed";
        verif = 0;
        return false;
    } else verif = 1;
    if (DateD == '' || DateD == null) {
        document.getElementById('DateDP').innerHTML = "Date debut is required";
        verif = 0;
        return false;
    } else verif = 1;
    if (DateF == '' || DateF == null) {
        document.getElementById('DateFP').innerHTML = "Date fin is required";
        verif = 0;
        return false;
    } else verif = 1;
    if (PrixA == '' || PrixA == null) {
        document.getElementById('PrixAP').innerHTML = "Ancien prix is required";
        verif = 0;
        return false;
    } else verif = 1;
    if (Remise == '' || Remise == null) {
        document.getElementById('RemiseP').innerHTML = "Remise is required";
        verif = 0;
        return false;
    } else verif = 1;




    if (verif == 1) {
        alert("Promotion ajouté avec succès!");
        return true;
    }
}