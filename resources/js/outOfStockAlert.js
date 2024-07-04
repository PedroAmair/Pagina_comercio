document.addEventListener("DOMContentLoaded", function() {
    initiate(); 
});

function initiate() {
    outOfStock();
}

function outOfStock() {
    const outOfStock = document.querySelector('#outOfStock');
    if(outOfStock) {
        setTimeout(() => {
            outOfStock.classList.add("hidden");
        }, 10000)
    }
}