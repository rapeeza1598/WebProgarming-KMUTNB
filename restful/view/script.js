const API_URL = "http://localhost:3000/restful/controller/book/v1/rest.php"
let bookidInput = null
let isbnInput = null
let booknameInput = null
let booktypeInput = null
let authorInput = null
let priceInput = null
let showOutput = null

// Get the modal
var modal = document.getElementById("myModal")
var modal_update = document.getElementById("Modal-update")
// Get the button that opens the modal
var btn = document.getElementById("myBtn")

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0]
var span_update = document.getElementById("close_update")
// When the user clicks the button, open the modal
btn.onclick = function () {
    modal.style.display = "block"
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    modal.style.display = "none"
}
span_update.onclick = function () {
    modal_update.style.display = "none"
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none"
    }
}
window.onclick = function (event) {
    if (event.target == modal_update) {
        modal_update.style.display = "none"
    }
}

async function addBook() {
    isbnInput = document.getElementById("isbn")
    booknameInput = document.getElementById("bookname")
    booktypeInput = document.getElementById("booktype")
    authorInput = document.getElementById("author")
    priceInput = document.getElementById("price")
    showOutput = document.getElementById("showOutput")
    const postData = {
        isbn: isbnInput.value,
        bookname: booknameInput.value,
        booktype: booktypeInput.value,
        author: authorInput.value,
        price: priceInput.value,
    }
    console.log(postData)
    try {
        const response = await fetch(API_URL, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(postData),
        })
        const data = await response.json()
        // document.getElementById(
        //     "showOutput"
        // ).innerHTML = `<strong>${data}</strong>`
        console.log(data)
        const tableBody = document.getElementById("tablebody")
        // const newRow = `<tr><td></td><td>${isbnInput.value}</td><td>${booknameInput.value}</td><td>${booktypeInput.value}</td><td>${authorInput.value}</td><td>${priceInput.value}</td><td></td><td><button onclick="updateDataBtn()">update</button></td><td><button onclick="deleteData()">delete</button></td></tr>`
        // tableBody.innerHTML += newRow
        getAllData()
        alert("Insert Success")
    } catch (error) {
        console.log(`Error : ${error}`)
    }
    modal.style.display = "none"
    isbnInput.value = null
    booknameInput.value = null
    booktypeInput.value = null
    authorInput.value = null
    priceInput.value = null
    showOutput.value = null
}

async function getAllData() {
    const spinner = document.getElementById("spinner")
    spinner ? spinner.removeAttribute("hidden") : null
    let text = `<table border="1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ISBN</th>
                            <th>BookName</th>
                            <th>BookType</th>
                            <th>Author</th>
                            <th>Price</th>
                            <th>Date Edit</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody id="tablebody">`
    let requestOptions = {
        method: "GET",
        headers: { "Content-Type": "application/json" },
    }
    fetch(API_URL, requestOptions)
        .then((response) => response.json())
        .then((result) => {
            console.log(result)
            for (let index = 0; index < result.length; index++) {
                text += `<tr><td>${index + 1}</td><td id="isbn${
                    result[index].bookid
                }">${result[index].isbn}</td><td id="bookname${
                    result[index].bookid
                }">${result[index].bookname}</td><td id="booktype${
                    result[index].bookid
                }">${result[index].booktype}</td><td id="author${
                    result[index].bookid
                }">${result[index].author}</td><td id="price${
                    result[index].bookid
                }">${result[index].price}</td><td>${
                    result[index].createdate
                }</td><td><button onclick="updateDataBtn(${
                    result[index].bookid
                })">update</button></td><td><button onclick="deleteData(${
                    result[index].bookid
                })">delete</button></td></tr>`
            }
            text += `</tbody></table>`
            document.getElementById("showOutput").innerHTML = text
            spinner ? spinner.setAttribute("hidden", "") : null
        })
        .catch((error) => alert(error))
}

function updateDataBtn(id) {
    bookidInput = document.getElementById("bookid_update")
    isbnInput = document.getElementById("isbn_update")
    booknameInput = document.getElementById("bookname_update")
    booktypeInput = document.getElementById("booktype_update")
    authorInput = document.getElementById("author_update")
    priceInput = document.getElementById("price_update")

    bookidInput.value = id
    isbnInput.value = document.getElementById(`isbn${id}`).innerHTML
    booknameInput.value = document.getElementById(`bookname${id}`).innerHTML
    booktypeInput.value = document.getElementById(`booktype${id}`).innerHTML
    authorInput.value = document.getElementById(`author${id}`).innerHTML
    priceInput.value = document.getElementById(`price${id}`).innerHTML
    modal_update.style.display = "block"
}
async function updateData() {
    bookidInput = document.getElementById("bookid_update")
    isbnInput = document.getElementById("isbn_update")
    booknameInput = document.getElementById("bookname_update")
    booktypeInput = document.getElementById("booktype_update")
    authorInput = document.getElementById("author_update")
    priceInput = document.getElementById("price_update")
    // console.log(bookidInput.value)
    const updateData = {
        bookid: bookidInput.value,
        isbn: isbnInput.value,
        bookname: booknameInput.value,
        booktype: booktypeInput.value,
        author: authorInput.value,
        price: priceInput.value,
    }
    console.log(updateData)
    try {
        const response = await fetch(API_URL, {
            method: "PUT",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(updateData),
        })
        const data = await response.json()
        console.log(data)
        modal_update.style.display = "none"
        getAllData()
        alert("Update Success")
    } catch (error) {
        console.log(`Error : ${error}`)
    }
}
async function deleteData(id) {
    if (confirm(`You Delete ${id}`)) {
        const deleteData = {
            bookid: id,
        }
        console.log(deleteData)
        try {
            const response = await fetch(API_URL, {
                method: "DELETE",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(deleteData),
            })
            const data = await response.json()
            console.log(data)
            getAllData()
            alert("Delete Success")
        } catch (error) {
            console.log(`Error : ${error}`)
            alert("Delete Unsuccess")
        }
    }
}
