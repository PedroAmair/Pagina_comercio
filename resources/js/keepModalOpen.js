document.addEventListener('DOMContentLoaded', function () {
     visualizarModal();
});

function visualizarModal() {
    const modal = document.querySelector('#select-modal')
    const dropdown = document.querySelector('.accordion')
    const value = dropdown.dataset.number;
    const selectedDropdown = document.querySelector(`#accordion-color-body-${value}`);
    const errorDiv = document.querySelector('#errorRate')

    if (modal && modal.dataset.hasErrors === "true") {
        selectedDropdown.classList.remove('hidden');
        errorDiv.classList.remove('hidden');
    }
}