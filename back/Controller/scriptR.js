function Validation() {
    var CIN = document.getElementById('Id').value;
    var Nom = document.getElementById('Nom').value;
    var Prenom = document.getElementById('Prenom').value;
    var TexteR = document.getElementById('TexteR').value;
    var Email = document.getElementById('Email').value;

    if (CIN != '' || Nom != '' || Prenom != '' || TexteR != '' || Email != '') {
        document.getElementById('CINT').innerHTML = "";
        document.getElementById('NomT').innerHTML = "";
        document.getElementById('PrenomT').innerHTML = "";
        document.getElementById('TexteRT').innerHTML = "";
        document.getElementById('EmailT').innerHTML = "";
    }
    var verif = -1;
    if (CIN == '' || CIN == null) {
        document.getElementById('CINT').innerHTML = "CIN is required";
        verif = 0;
        return false;
    } else verif = 1;
    if (isNaN(CIN)) {
        document.getElementById('CINT').innerHTML = "Only digits are allowed";
        verif = 0;
        return false;
    } else verif = 1;
    if (CIN.length < 8) {
        document.getElementById('CINT').innerHTML = "CIN must be longer";
        verif = 0;
        return false;
    } else verif = 1;
    if (Nom == '' || Nom == null) {
        document.getElementById('NomT').innerHTML = "Nom is required";
        verif = 0;
        return false;
    } else verif = 1;
    if (!isNaN(Nom)) {
        document.getElementById('NomT').innerHTML = "Only characters are allowed";
        verif = 0;
        return false;
    } else verif = 1;
    if (Prenom == '' || Prenom == null) {
        document.getElementById('PrenomT').innerHTML = "Prenom is required";
        verif = 0;
        return false;
    } else verif = 1;
    if (!isNaN(Prenom)) {
        document.getElementById('PrenomT').innerHTML = "Only characters are allowed";
        verif = 0;
        return false;
    } else verif = 1;
    if (TexteR == '' || TexteR == null) {
        document.getElementById('TexteRT').innerHTML = "Texte reclamation is required";
        verif = 0;
        return false;
    } else verif = 1;
    if (Email == '' || Email == null) {
        document.getElementById('EmailT').innerHTML = "Email is required";
        verif = 0;
        return false;
    } else verif = 1;
    if (Email.indexOf('@') <= 0) {
        document.getElementById('EmailT').innerHTML = "' @ ' Invalid Position";
        verif = 0;
        return false;
    } else verif = 1;

    if ((Email.charAt(Email.length - 4) != '.') && (Email.charAt(Email.length - 3) != '.')) {
        document.getElementById('EmailT').innerHTML = "' . ' Invalid Position";
        verif = 0;
        return false;
    } else verif = 1;

    if (verif == 1) {
        alert("Reclamation ajouté avec succès!");
        return true;
    }

}