function trocarFotoPizza() {
    let select = document.getElementById('select').value
    let imgPizza = document.getElementById('imagem-pizza')
    imgPizza.src = `images/Pizza/${select}.png`
    imgPizza.className = 'pizza-animation'

    setTimeout(() => {
        imgPizza.classList.remove('pizza-animation')
    }, 1000);
}