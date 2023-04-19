import "./sqlite3.js"

let db // declare the db variable in the global scope

function initdb() {
    window.sqlite3InitModule().then(function (sqlite3) {
        console.log("init sqlite success")
        db = new sqlite3.oo1.JsStorageDb("local")
        try {
            db.exec([
                "create table if not exists user(name,pass);",
                "insert into user(name,pass) values('rapee','qwer')",
            ])
            console.log("Table created successfully or already exists")
        } catch (error) {
            console.log(error)
        }
    })
}

function add_user() {
    //   db.exec({
    //     sql: "select * from user",
    //     rowMode: "object",
    //     callback: function (row) {
    //       console.log(row)
    //     },
    //   })
    console.log("add")
}

initdb()
