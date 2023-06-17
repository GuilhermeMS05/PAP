//Card Funcionamento
function mostrarCard() {
    var card = document.getElementById("card-caixa");
    var botao = document.getElementById("botao");
    var darkenBg = document.getElementById("darken-bg");
    card.classList.toggle("d-none");
    card.classList.toggle("show");
    darkenBg.classList.toggle("show");
}
document.getElementById("fechar-card").addEventListener("click", function () {
    var card = document.getElementById("card-caixa");
    card.classList.add("d-none");
    document.getElementById("darken-bg").classList.remove("show");
});

//Card Tempo de Espera
function mostrarCardTP() {
    var card = document.getElementById("card-caixaTP");
    var botao = document.getElementById("botaoTP");
    var darkenBg = document.getElementById("darken-bgTP");
    card.classList.toggle("d-none");
    card.classList.toggle("show");
    darkenBg.classList.toggle("show");
}
document.getElementById("fechar-cardTP").addEventListener("click", function () {
    var card = document.getElementById("card-caixaTP");
    card.classList.add("d-none");
    document.getElementById("darken-bgTP").classList.remove("show");
});