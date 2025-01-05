document.addEventListener("DOMContentLoaded", function() {
    initiate(); 
});

function initiate() {
    addedToCartAlert();
}

function addedToCartAlert() {
    const divCartAlert = document.querySelector('#alert-border-3');
    if(divCartAlert) {
        setTimeout(() => {
            divCartAlert.classList.add("hidden");
        }, 5000)
    }
}
