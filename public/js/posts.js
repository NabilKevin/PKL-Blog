const article = document.querySelector('.articles');
const input = document.querySelector('#search');

input.addEventListener('input', async e => {
    const response = await axios.get('/search?s=' + e.target.value)
    const data = response.data.posts
    article.innerHTML = "";
    data.forEach(d => {
        article.innerHTML += `
            <article class="mb-3 border-bottom pb-3">
                <h3><a href="/post/${d.slug}" class="text-decoration-none">${d.title}</a></h3>

                <p class="my-1">By: <strong>${d.author}</strong></p>

                <p class="my-2">${d.excerpt}...</p>

                <a href="/post/${d.slug}" class="text-decoration-none">Read more...</a>
            </article>
        `
    })
})
