function goToSwipe(){
    location.replace("./swipe_page.php");
}
window.onload= async function(){
    setTimeout(()=>{
        document.getElementById('backToSwipe').innerHTML='<button onclick="goToSwipe()"><img src="../img/red-cards.png" alt="swipe-cards"></button>';
        document.getElementById('backToDashboard').innerHTML='<button onclick="app.backToDashboard()"><img src="../img/ic_arrow_back.svg" alt="back-arrow"></button>';
    },5000)
    
    
}