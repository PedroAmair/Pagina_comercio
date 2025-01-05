const key = 'oldValue';

if(localStorage.getItem(key) === null) {
    localStorage.setItem('oldValue', 0);
}

document.addEventListener("DOMContentLoaded", function() {
    effect(); 
});

function effect() {
    const element = document.querySelector('#cartShops');
    let oldValue = localStorage.getItem('oldValue');

    if(element.textContent != oldValue) {
        element.classList.add('animate-[ping_1s_ease-in-out]');
        localStorage.setItem('oldValue', element.textContent);
    }else {
        element.classList.remove('animate-[ping_1s_ease-in-out]');
    }
}