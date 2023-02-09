async function exec() {
    let d1 = document.getElementById("txt1").value
    let d2 = document.getElementById("txt2").value

    let url =
        "http://localhost:3000/restful/phpget.php?data1=" + d1 + "&data2=" + d2

    try {
        const response = await fetch(url, {
            method: "GET",
            headers: { "Content-Type": "application/json" },
        })
        if (!response.ok) {
            const message = "Error with Status code {response.status}"
            throw new Error(message)
        }
        const data = await response.text()
        document.getElementById("div1").innerHTML = `<strong>${data}</strong>`
        console.log(data)
    } catch (error) {
        console.log(error)
    }
}

async function exec_opt() {
    let d1 = document.getElementById("txt1").value
    let d2 = document.getElementById("txt2").value
    let getmethod = document
        .querySelector('input[name="opt1"]:checked')
        .value.toUpperCase()
    let url = "http://localhost:3000/restful/phpget.php"
    try {
        const response = await fetch(url, {
            method: getmethod,
            headers: { "Content-Type": "application/json" },
        })
        if (!response.ok) {
            const message = "Error with Status code {response.status}"
            throw new Error(message)
        }
        const data = await response.text()
        document.getElementById("div1").innerHTML = `<strong>${data}</strong>`
        console.log(data)
    } catch (error) {
        console.log(error)
    }
}
