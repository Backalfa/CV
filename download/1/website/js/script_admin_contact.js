function createInterface() {

    // Variáveis necessárias
    let header_admin = document.querySelector("#header_admin");
    let content_value_admin = document.querySelector("#content_value_admin");
    let hidden = document.querySelector(".not_admin");
    header_admin.classList.add("col-7");
    content_value_admin.classList.add("col-5");

    // Esconder o formulário caso seja admin
    hidden.classList.add("hidden");

}
