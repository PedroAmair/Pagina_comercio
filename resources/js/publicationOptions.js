document.addEventListener("DOMContentLoaded", function() {
    disableOptions(); 
});

function disableOptions() {
    const disabled = document.querySelectorAll('.disabled');
    if(disabled.disabled) {
        disabled.forEach( options => {
            options.classList.remove('cursor-pointer');
            options.classList.add('pointer-events-none');
            options.classList.add('cursor-default');
        })
    }
}