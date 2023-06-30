var xhr = new XMLHttpRequest();
var xhr = new XMLHttpRequest();
xhr.onreadystatechange = function() {
    console.log(xhr.responseText);
    if (xhr.readyState === 4 && xhr.status === 200) {
        var dados = JSON.parse(xhr.responseText);
        var data = [];

        // Percorrer os dados e extrair os valores desejados
        for (var i = 0; i < dados.length; i++) {
            var dia = dados[i].dia_atual; // Altere 'nome' para o nome do valor que você deseja selecionar
            data.push(dia);
        }

        // Use os valores desejados em JavaScript
        console.log(data);
    }
};
xhr.open("GET", "../Includes/faturacao-api.php", true);
xhr.send();