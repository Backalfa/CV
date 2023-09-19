function validar_contacto(){

    if(validar_nome() == true && validar_apelido() == true && validar_telemovel() == true && validar_email() == true && validar_data() == true){
    console.log(validar_nome());
    console.log(validar_apelido());
    console.log(validar_telemovel());
    console.log(validar_email());
    console.log(validar_data());
    alert("Formulário enviado com Sucesso!");

    }
}

function validar_nome(){
    let nome = document.querySelector("#nome").value;
    let name_pattern = /^[a-z\d_]{3,15}$/i;
    var ok_name = name_pattern.exec(nome);
    if (ok_name || nome.length == 0){
        return true;
    }else{
        window.alert('O Nome não é Válido')
    }
}
function validar_apelido(){
    let apelido = document.querySelector("#apelido").value;
    let apelido_pattern = /^[a-z\d_]{2,15}$/i;
    var ok_apelido = apelido_pattern.exec(apelido);
    if (ok_apelido || apelido.length == 0){
        return true;
    }else{
        window.alert('O Apelido não é Válido');
    }
}
function validar_email(){
    let email = document.querySelector("#email").value;
    let email_pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var ok_email = email_pattern.exec(email);
    if (ok_email || email.length == 0){
        return true;
    }else{
        window.alert('O Email não é Válido');
    }
}
function validar_telemovel(){
    let telemovelValue = document.querySelector("#telemovel").value;
    let telemovel_pattern = /^[0-9]{9,9}$/;
    var ok_telemovel = telemovel_pattern.exec(telemovelValue);
    if (ok_telemovel){
        return true;
    }else{
        window.alert('O Telemóvel não é Válido');
    }
}
function validar_data(){
    let date = document.getElementById("datatime").value;

// Date format: YYYY-MM-DD
    var datePattern = /^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/;

    // Check if the date string format is a match
    var matchArray = date.match(datePattern);
    if (matchArray == null) {
        return false;
    }

    // Remove any non digit characters
    var dateString = date.replace(/\D/g, ''); 

    // Parse integer values from the date string
    var year = parseInt(dateString.substr(0, 4));
    var month = parseInt(dateString.substr(4, 2));
    var day = parseInt(dateString.substr(6, 2));
   
    // Define the number of days per month
    var daysInMonth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

    // Leap years
    if (year % 400 == 0 || (year % 100 != 0 && year % 4 == 0)) {
        daysInMonth[1] = 29;
    }

    if (month < 1 || month > 12 || day < 1 || day > daysInMonth[month - 1]) {
        return false;
    }
    return true;
}