const tableBody = document.querySelector('.table-group-divider');
const input = document.querySelector('#search');

input.addEventListener('input', async e => {
    const response = await axios.get('/search?s=' + e.target.value)
    const data = response.data.posts
    tableBody.innerHTML = "";
    data.forEach((d, i) => {
        tableBody.innerHTML += `
            <tr>
                <th scope="row">${i+1}</th>
                <td>${d.title}</td>
                <td>${d.author}</td>
                <td>
                    <div class="buttons d-flex gap-2">
                        <a href="/admin/edit/${d.slug}" class="btn btn-warning text-white fw-semibold">Edit</a>
                        <form action="/admin/delete/${d.slug}" method="post">
                            <button type="submit" onclick="return confirm('Are you sure want to delete this post?')" class="btn btn-danger text-white fw-semibold">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        `
    })
})
