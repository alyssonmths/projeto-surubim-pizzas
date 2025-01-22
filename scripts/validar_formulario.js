document.getElementById('form').addEventListener('submit', function(event) {

    // Remove alertas antigos, se existirem
    const existingAlerts = document.querySelectorAll('.alert');
    existingAlerts.forEach(alert => alert.remove());

    event.preventDefault(); // Evita o envio do formulário até que a validação seja concluída

    // Obtém os valores dos campos
    const nome = document.getElementById('nome').value;
    const valor = document.getElementById('valor').value;
    const imagem = document.getElementById('file').value;
    const categoria = document.getElementById('categoria').value;

    // Cria uma variável para armazenar mensagens de erro
    let erros = [];

    // Valida o campo Nome
    if (nome.trim() === '') {
        erros.push('O nome é obrigatório.');
    }

    console.log(typeof(valor));
    if (valor < 0 || valor == '') {
        erros.push('Digite um valor válido');
    }

    if (imagem === '') {
        erros.push('Insira uma imagem');
    }
    
    if (categoria === '') {
        erros.push('Selecione a categoria!');
    }

    // Exibe mensagens de erro ou envia o formulário
    if (erros.length > 0) {
        erros.forEach(element => {
            // criação do ícone de alert
            let icone = document.createElement('i')
            icone.className = 'bi bi-exclamation-triangle-fill me-2'
            // criação da div de alerta
            let divAlerta = document.createElement('div');
            divAlerta.appendChild(icone);
            divAlerta.className = 'alert alert-danger text-center';
            divAlerta.style.width = '250px';
            divAlerta.innerHTML += element;
            document.body.appendChild(divAlerta);
        });
    } else {
        this.submit();
    }
});
