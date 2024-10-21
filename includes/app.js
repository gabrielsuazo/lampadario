function turnCandleOn(candelaId) {
    let displayImage = document.getElementById(candelaId);
    if (displayImage.src.match('../images/candela_apagada.png')) {
        
        var xhr = new XMLHttpRequest();
        
        xhr.open("POST", "includes/actionhandler.inc.php", true);


        let idValue = candelaId.replace(/\D/g, '');
        let dataToSend = JSON.stringify({id: idValue});
        xhr.send(dataToSend);

    }
    location.reload(true);
}