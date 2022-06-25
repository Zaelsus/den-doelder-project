console.log('javascript is working lol')

document.getElementById('selection').onchange = function() {
    let selectionValue = this.value
    document.getElementById('errors').className = 'invisibleSelection'
    document.getElementById('productionTimes').className = 'invisibleSelection'
    document.getElementById('transitionTimes').className = 'invisibleSelection'
    document.getElementById('hourlyReports').className = 'invisibleSelection'
    document.getElementById(selectionValue).className = ''

}
