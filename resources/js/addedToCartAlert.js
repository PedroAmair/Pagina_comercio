document.addEventListener("DOMContentLoaded", function() {
    initiate(); 
});

function initiate() {
    addedToCartAlert();
}

function addedToCartAlert() {
    const divCartAlert = document.querySelector('#addedToCartDiv');
    if(divCartAlert) {
        setTimeout(() => {
            divCartAlert.classList.add("hidden");
        }, 2500)
    }
}
