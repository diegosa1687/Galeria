var input = document.getElementById('image'), span = document.getElementById('file-name');

input.addEventListener('change', (event) => {
    // é necessário dividir o array pois o seu retorno é C:\fakepath\fileName
    let fileName = (event.target.value).split('\\')
    // pegamos agora o 'fileName' em ['C:', 'fakepath', 'fileName']
    span.innerHTML = fileName[fileName.length - 1]
    console.log(fileName)
});