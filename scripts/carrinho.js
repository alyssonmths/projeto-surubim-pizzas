function exibirCarrinho(pag) {
    if (document.getElementById('conteudo')) {
        document.getElementById('conteudo').remove()
        document.getElementById('carrinho').style.display = 'none'
    }
    else {
        let xml = new XMLHttpRequest();
        xml.open('GET', 'assets/carrinho.php');
        xml.send();

        xml.onreadystatechange = function () {
            if (xml.readyState == 4 && xml.status == 200) {
                let carrinho = document.createElement('div')
                carrinho.id = 'conteudo'
                carrinho.innerHTML = xml.responseText
                if (pag == 'botao') {
                    document.getElementById('carrinho').appendChild(carrinho)
                    document.getElementById('carrinho').style.display = 'block'
                }
                else if (pag == 'finalizar_compra') {
                    document.getElementById('divCarrinho').appendChild(carrinho)
                }

                document.getElementById('botao-fechar').onclick = fecharCarrinho
            }
        }
    }
}

function fecharCarrinho() {
    document.getElementById('conteudo').remove()
    document.getElementById('carrinho').style.display = 'none'
}