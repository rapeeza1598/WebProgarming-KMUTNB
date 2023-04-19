const form = document.querySelector("form")

form.addEventListener("submit", async (event) => {
    event.preventDefault()

    const username = form.elements["username"].value
    const password = form.elements["password"].value
    console.log(JSON.stringify({ username, password }))
    const response = await fetch("login.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ username, password }),
    })

    const data = await response.json()

    if (data.success) {
        window.location.href = "dashboard.html"
    } else {
        alert("Invalid username or password")
    }
})
