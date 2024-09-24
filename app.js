function turnCandleOn(candelaId) {
    let displayImage = document.getElementById(candelaId)
    if (displayImage.src.match('images/candela_apagada.png')) {
        displayImage.src = 'images/candela.png'
    }
}