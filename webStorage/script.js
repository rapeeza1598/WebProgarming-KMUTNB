let data = [
    {
        "id": 1234,
        "name": "rapee",
        "qty": 10,
    },
]
localStorage.setItem("name",JSON.stringify(data))
let info = JSON.parse(localStorage.getItem("name"))

var text = ''
text += (localStorage.data?"Exit":"Remover")+"\n"
info.forEach(element => {
    text += element.id + " " + element.name + " " + element.qty + "\n"
});

localStorage.removeItem("name")
text += (localStorage.data?"Exit":"Remover")+"\n"
alert(text)
