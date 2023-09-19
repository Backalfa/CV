function createInterface() {
    let header = document.querySelector("#header");
    let content_value = document.querySelector("#content_value");
    header.classList.add("col-9");
    content_value.classList.add("col-3");

    let classh1 = 'style="margin-top:100px;color:#FE0279;font-family:fontmain;text-align:center"';
    let classdescricao = 'style="margin-top:50px;color:#E820B4;font-family:fontmain;text-align:center"';
    let classimagem = 'style="color:#DA3FF8;font-family:fontmain;text-align:center"';

    $.ajax({
        url :'infoRead.txt',
        type :'GET',
        success :function(data){
            let objeto_json = eval(" (" + data + ")");
            var frase = "";
            if(1 == 1 ){
                frase = frase + "<h1 " + classh1 + ">" + objeto_json.geral[0].titulo + "</h1>";
                frase = frase + "<p " + classdescricao + ">" + objeto_json.geral[0].descricao + "</p>";
                frase = frase + "<p " + classimagem + ">" + objeto_json.geral[0].for + "</p>";
                frase = frase + "<p " + classimagem + ">" + objeto_json.geral[0].imagem + "</p>";
            }
            $("#content_value").html(frase);
        },
        error: function (xhr, status) {
            alert('Ocorreu um erro.');
        }
    });
}
function service1(){
    alert("teste");
}
function service2(){
    alert("teste");
}
function service3(){
    alert("teste");
}

