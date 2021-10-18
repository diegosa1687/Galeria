// se existir um elemento com id 'image' e um elemento com id 'input-file-name', ele entra dentro da condição
if((input = document.getElementById('image')) && (span = document.getElementById('input-file-name')) && (btn = document.getElementById('input-file-button')))
    input.addEventListener('change', (event) => {
        // é necessário dividir o array pois o seu retorno é C:\fakepath\fileName
        let fileName = (event.target.value).split('\\')
        // pegamos agora o 'fileName' em ['C:', 'fakepath', 'fileName']
        span.innerHTML = fileName[(fileName.length - 1)]
        // adicionar a classe .chosen ao botão
        btn.className += " chosen";
    })

// se na página existirem os botões login e cadastro, ele entrará dentro da condição
if((btnlogin = document.getElementById('btn-login')) && (btnregister = document.getElementById('btn-register'))) {
    btnlogin.addEventListener('click', () => {
        $('.nav-tabs a[href="#login"]').tab('show')
    })

    btnregister.addEventListener('click', () => {
        $('.nav-tabs a[href="#register"]').tab('show')
    })
}

$('.toast').toast('show');