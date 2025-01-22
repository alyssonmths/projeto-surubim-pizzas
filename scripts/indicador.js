function aplicarIndicador(url) {
    url = url.slice(1)
    let elemento = document.getElementById(url)
    elemento.classList.add('active')
}

aplicarIndicador(window.location.pathname)

function aplicarIndicadorCategoria(url) {
    let parametro = url.replace('?categoria=', '')
    let categoria = document.getElementById(parametro)
    categoria.className = 'active'
}