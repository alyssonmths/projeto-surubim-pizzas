document.getElementById('open_btn').addEventListener('click', function () {
    document.getElementById('sidebar').classList.toggle('open-sidebar')
})

function identificarBotao() {
    let url = window.location.pathname
    url = url.split('/')
    url = url[2]
    document.getElementById(url).classList.add('active')
}