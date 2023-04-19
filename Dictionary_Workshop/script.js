function addvocab() {
    alert("++Vocab")
}
function backToMain() {
    modal.style.display = "none"
}
async function getAllData() {
    let data = await fetch("http://localhost:3000/Dictionary_Workshop/Rest.php")
    let dataJson = await data.json()
    console.log(dataJson)
    let html = `<table style="width: 100%" border="1">
                    <thead>
                        <tr>
                            <td colspan="5" class="tdhi"><h1>Dictionary</h1></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <button id="myBtn" onclick="">+vocab</button>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <input type="text"> <button>ค้นหา</button>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <td class="trcen">ID</td>
                    <td class="trcen">VOCAB</td>
                    <td class="trcen">TYPE</td>
                    <td class="trcen" colspan="2">MEAN</td>
                </tr>`
    dataJson.forEach((item) => {
        html += `
        <tr>
            <td>${item.DIC_ID}</td>
            <td>${item.VOCAB}</td>
            <td>${item.TYPE_CODE}</td>
            <td>
                ${item.MEAN}
            </td>
            <td>
                <button class="btn btn-warning" onclick="updateData(${item.id})">Update</button>
            </td>
        </tr>
        `
    })
    html += `</tbody></table>`
    document.getElementById("table-data").innerHTML = html
}
async function addvocab() {
    let vocab = document.getElementById("vocab").value
    let type = document.getElementById("type").value
    let mean = document.getElementById("mean").value
    let data = await fetch("http://localhost:3000/Dictionary_Workshop/Rest.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            vocab: vocab,
            type: type,
            mean: mean,
        }),
    })
    let dataJson = await data.json()
    console.log(dataJson)
    getAllData()
}
async function updateVocaByid(id){
    let data = await fetch(`http://localhost:3000/Dictionary_Workshop/Rest.php?id=${id}`)
    let dataJson = await data.json()
    console.log(dataJson)
    document.getElementById("id_update").value = dataJson[0].id
    document.getElementById("vocab_update").value = dataJson[0].vocab
    document.getElementById("type_update").value = dataJson[0].type
    document.getElementById("mean_update").value = dataJson[0].mean
    modal_update.style.display = "block"
}
async function updateVocab() {
    let id = document.getElementById("id_update").value
    let vocab = document.getElementById("vocab_update").value
    let type = document.getElementById("type_update").value
    let mean = document.getElementById("mean_update").value
    let data = await fetch(`http://localhost:3000/Dictionary_Workshop/Rest.php?id=${id}`, {
        method: "PUT",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            vocab: vocab,
            type: type,
            mean: mean,
        }),
    })
    let dataJson = await data.json()
    console.log(dataJson)
    getAllData()
    modal_update.style.display = "none"
}
async function getVocabByID(word){
    let data = await fetch(`http://localhost:3000/Dictionary_Workshop/Rest.php?word=${word}`)
    let dataJson = await data.json()
    console.log(dataJson)
    let html = `<table style="width: 100%" border="1">
                    <thead>
                        <tr>
                            <td colspan="5" class="tdhi"><h1>Dictionary</h1></td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <button id="myBtn" onclick="">+vocab</button>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5">
                                <input type="text"> <button>ค้นหา</button>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <td class="trcen">ID</td>
                    <td class="trcen">VOCAB</td>
                    <td class="trcen">TYPE</td>
                    <td class="trcen" colspan="2">MEAN</td>
                </tr>`
    dataJson.forEach((item) => {
        html += `
        <tr>
            <td>${item.DIC_ID}</td>
            <td>${item.VOCAB}</td>
            <td>${item.TYPE_CODE}</td>
            <td>
                ${item.MEAN}
            </td>
            <td>
                <button class="btn btn-warning" onclick="updateData(${item.id})">Update</button>
            </td>
        </tr>
        `
    })
    html += `</tbody></table>`
    document.getElementById("table-data").innerHTML = html
}
async function deleteVocabByID(id){
    let data = await fetch(`http://localhost:3000/Dictionary_Workshop/Rest.php?id=${id}`,{
        method: "DELETE",
        headers: { "Content-Type": "application/json" },
    })
    let dataJson = await data.json()
    console.log(dataJson)
    getAllData()
}
// Get the modal
var modal = document.getElementById("myModal")
// var modal_update = document.getElementById("Modal-update")
// Get the button that opens the modal
var btn = document.getElementById("myBtn")

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0]
// var span_update = document.getElementById("close_update")
// When the user clicks the button, open the modal
btn.onclick = function () {
    modal.style.display = "block"
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    modal.style.display = "none"
}
// span_update.onclick = function () {
//     modal_update.style.display = "none"
// }
// When the user clicks anywhere outside of the modal, close it
// window.onclick = function (event) {
//     if (event.target == modal) {
//         modal.style.display = "none"
//     }
// }
// window.onclick = function (event) {
//     if (event.target == modal_update) {
//         modal_update.style.display = "none"
//     }
// }
