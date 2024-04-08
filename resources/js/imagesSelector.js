document.addEventListener("DOMContentLoaded", function() {
    imagesSelector(); 
});

function imagesSelector() {
    const main = document.querySelector('.main');
    const thumbnails = document.querySelectorAll('.thumbnail');

    thumbnails.forEach( thumb => {
        const active = document.querySelector('.active');
        thumb.addEventListener("click",  function() {
            active.classList.remove('active');
            this.classList.add('active');
            main.src = this.src;
        })
    })
}
