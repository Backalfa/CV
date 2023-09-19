/* ========== VALIDAR DADOS ========== */
function validarNomeBorder(){
    nome = document.querySelector("#nome");
    if (nome.value.length < 3) {
        swapcor ('nome', 'red');
    } else {
        swapcor ( 'nome', 'green');
    }
}
function validarApelidoBorder(){
    apelido = document.querySelector("#apelido");
    if (apelido.value.length < 2) {
        swapcor ('apelido', 'red');
    } else {
        swapcor ( 'apelido', 'green');
    }
}
function validarTelemovelBorder(){
    let telemovelValue = document.querySelector("#telemovel").value;
    let telemovel_pattern = /^[0-9]{9,9}$/;
    var ok_telemovel = telemovel_pattern.exec(telemovelValue);
    if (ok_telemovel){
        document.getElementById("telemovel").style.border = '2px solid green';
    }else{
        document.getElementById("telemovel").style.border = '2px solid red';
    }
}
function swapcor (nomeIn , cor){
    if (cor == 'red'){
        document.getElementById(nomeIn).style.border = '2px solid red';
    } else {
        document.getElementById(nomeIn).style.border = '2px solid green';
    }
}
/* ========== ORÇAMENTO ========== */
function TotalPrice(){
    
    let quem_somos = document.getElementById("quemsomos").checked;
    let onde_estamos = document.getElementById("ondeestamos").checked;
    let fotos = document.getElementById("fotos").checked;
    let eComerce = document.getElementById("eComerce").checked;
    let gestao_interna = document.getElementById("gestaointerna").checked;
    let noticias = document.getElementById("noticias").checked;
    let redes_sociais = document.getElementById("redessociais").checked;

    if (quem_somos == true){quem_somos = 400};
    if (onde_estamos == true){onde_estamos = 400};
    if (fotos == true){fotos = 400};
    if (eComerce == true){eComerce = 400};
    if (gestao_interna == true){gestao_interna = 400};
    if (noticias == true){noticias = 400};
    if (redes_sociais == true){redes_sociais = 400};

    let total = parseInt(quem_somos + onde_estamos + fotos + eComerce + gestao_interna + noticias + redes_sociais);
    console.log(total);


    let meses = parseInt(document.getElementById("prazo_meses").value);
    let webbox = parseInt(document.querySelector("#paginaweb").value);
    let boxinput = document.querySelector("#pricebox");
    let desconto1 = 1.05;
    let desconto2 = 1.10;
    let desconto3 = 1.15;
    let desconto4 = 1.20;

    if(meses === 1){
        let price = parseInt(webbox + total);
        let preco = parseInt(price / desconto1);
        boxinput.value = parseInt(preco);
    }
    if(meses === 2){
        let price = parseInt(webbox + total);
        let preco = parseInt(price / desconto2);
        boxinput.value = parseInt(preco);
    }
    if(meses === 3){
        let price = parseInt(webbox + total);
        let preco = parseInt(price / desconto3);
        boxinput.value = parseInt(preco);
    }
    if(meses === 4){
        let price = parseInt(webbox + total);
        let preco = parseInt(price / desconto4);
        boxinput.value = parseInt(preco);
    }
    if(meses >= 5){
        alert('Pedidos igual ou superior a 5 meses deverá contactar diretamente.');
        boxinput.value = '';
    }
}

function formulario(){
    let bordername = document.getElementById("nome").style.border;
    let borderapelido = document.getElementById("apelido").style.border;
    let bordertelemovel = document.getElementById("telemovel").style.border;

    let green = "green";
    let teste_dados = false;

    if(bordername.includes(green) && borderapelido.includes(green) && bordertelemovel.includes(green)){
        console.log("Ok");
        teste_dados = true;
    }else{
        console.log("Not Ok");
    }

    let pricebox = document.querySelector("#pricebox").value;

    if(teste_dados && pricebox != 0){
        console.log("Teste Final Ok");
        alert("Formulário enviado com Sucesso!");
    }else{
        console.log("Teste Final Not Ok");
        alert("Terá de preencher todo o formulário para Enviar");
    }
}