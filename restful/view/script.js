async function exec_ins() {
    const postData = {
        isbn: document.getElementById("isbn").value,
        bookname: document.getElementById("bookname").value,
        booktype: document.getElementById("booktype").value,
        author: document.getElementById("autor").value,
        price: document.getElementById("price").value
    }
    const url = "http://localhost:3000/restful/controller/book/v1/rest.php"
    try {
        const response = await fetch(url, {
            method: "POST",
            headder:{"Content-Type": "application/json"},
            body: JSON.stringify(postData)
        })
        if (!response.ok) {
            const message = `Error with Status code ${response.status}`
            throw new Error(message)
        }
        const data = await response.json()
        document.getElementById().innerHTML = `<strong>${data}</strong>`
        console.log(data)
    } catch (error) {
        console.log(`Error : ${error}`)
    }
}