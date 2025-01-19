const quill = new Quill("#editor", {
    theme: "snow",
});

const editor = document.querySelector('#editor')
const body = document.querySelector('#body')

editor.addEventListener('input', e => {
    body.value = editor.innerHTML
})
