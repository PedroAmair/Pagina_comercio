import 'flowbite';

const leftArrow = document.querySelector('#leftArrow');
const rightArrow = document.querySelector('#rightArrow');
const slider = document.querySelector('#slider');
const leftArrowOf = document.querySelector('#leftArrowOf');
const rightArrowOf = document.querySelector('#rightArrowOf');
const sliderOf = document.querySelector('#sliderOf');

leftArrow.addEventListener('click', () => {
    slider.scrollLeft -= 500 
});

rightArrow.addEventListener('click', () => {
    slider.scrollLeft += 500 
});

leftArrowOf.addEventListener('click', () => {
    sliderOf.scrollLeft -= 500 
});

rightArrowOf.addEventListener('click', () => {
    sliderOf.scrollLeft += 500 
});