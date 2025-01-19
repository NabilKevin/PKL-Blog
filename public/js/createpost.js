const title = document.querySelector('#title')
const slug = document.querySelector('#slug')

title.addEventListener('change', async e => {
    const response = await axios.get('/admin/create/slug?title=' + title.value)
    const data = response.data
    slug.value = data.slug
})

const quill = new Quill("#editor", {
    theme: "snow",
  });


const editor = document.querySelector('#editor')
const body = document.querySelector('#body')

editor.addEventListener('input', e => {
    body.value = editor.innerHTML
})
