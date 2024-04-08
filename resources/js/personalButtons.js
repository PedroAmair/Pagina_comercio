let activeDiv = 1;

document.addEventListener("DOMContentLoaded", function() {
    initiate(); 
});

function initiate() {
    showSection();
    buttons();
    showChangePasswordSection();
    inhabilitateExecution();
    disableOptions();
}

function showSection() {
    const previousSection = document.querySelector('.displayed');
    if(previousSection) {
        previousSection.classList.remove('displayed');
        previousSection.classList.add('hidden');

    }

    const section = document.querySelector(`#activeDiv${activeDiv}`);
    section.classList.remove('hidden');
    section.classList.add('displayed');

    //Remove bg class to previous button
    const previousButton = document.querySelector('.bg-gray-300');
    if(previousButton) {
        previousButton.classList.remove('bg-gray-300');
    }
    //Highlight actual button
    const button = document.querySelector(`[data-activeDiv="${activeDiv}"]`);
    button.classList.add('bg-gray-300');
}

function buttons() {
    const buttons = document.querySelectorAll('#buttons button');
    buttons.forEach( button => {
        button.addEventListener("click", function(e) {
            activeDiv = parseInt(e.target.dataset.activediv);
            showSection();
        })
    })
}

function showChangePasswordSection() {
    const passwordCheckbox = document.querySelector('#changePassword');
    const changePasswordDivs = document.querySelectorAll('#changePasswordSection');
    if(passwordCheckbox.checked){
        changePasswordDivs.forEach( divs => {
            divs.classList.toggle('hidden');
        })
    }
    passwordCheckbox.addEventListener("click", function() {
        changePasswordDivs.forEach( divs => {
            divs.classList.toggle('hidden');
        })
        
    })
    
}

function inhabilitateExecution() {
    const inhabilitate = document.querySelector('.inhabilitate');
    if(inhabilitate.disabled) {
        inhabilitate.classList.remove('bg-sky-600');
        inhabilitate.classList.remove('hover:bg-sky-700');
        inhabilitate.classList.add('bg-gray-300');
        inhabilitate.classList.remove('cursor-pointer');
        inhabilitate.classList.add('pointer-events-none');
        inhabilitate.classList.add('cursor-default');
    }
}