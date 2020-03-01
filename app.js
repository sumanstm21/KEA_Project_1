async function sendMail(){
    // console.log(event)
    var oForm = document.querySelector('#frmEmail')
    console.log(oForm)
    var jConnection = await fetch('send-email.php',{
        "method":"POST", 
        "body": new FormData(oForm)
    })
    var sData = await jConnection.text()
    console.log(sData)

    var jConnectionSms = await fetch('api-buy.php',{
        "method":"POST", 
        "body": new FormData(oForm)
    })
    var sDataSms = await jConnectionSms.text()
    console.log(sDataSms)
}