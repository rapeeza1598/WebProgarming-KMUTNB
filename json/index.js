var tDate = "2023-09-22"
var date = new Date()
var unixTimeStamp = Math.floor(date.getTime() / 1000)
console.log(unixTimeStamp)

let unix_timestamp = unixTimeStamp
var date = new Date(unix_timestamp * 1000)
console.log(date.getDay())
