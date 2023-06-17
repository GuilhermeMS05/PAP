function mostrarInformacoes() {
    var menu = document.getElementById("menu");
    var informacoes = document.getElementById("informacoes");
    console.log(informacoes);
    // Oculta todas as informações
    var infos = informacoes.getElementsByClassName("info");
    for (var i = 0; i < infos.length; i++) {
        infos[i].style.display = "none";
    }

    // Exibe a informação selecionada ou todas as informações se "Selecione uma opção" for selecionado
    var opcaoSelecionada = menu.value;
    if (opcaoSelecionada === "") {
        // Exibe todas as informações
        for (var j = 0; j < infos.length; j++) {
            infos[j].style.display = "block";
        }
    } else {
        var infoSelecionada = document.getElementById(opcaoSelecionada);
        infoSelecionada.style.display = "block";
    }
}
mostrarInformacoes();