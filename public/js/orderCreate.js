const checkbox = document.getElementById('type_checkbox');
const box = document.getElementById('clientName-box');
const input = document.getElementById('clientName');

/**
 * Will check if the checkbox is checked if so the client name field will appear
 * and be required else will be hidden
 */
function isChecked() {
    if (checkbox.checked) {
        box.style.display = 'block';
        checkbox.value=1;
        input.setAttribute('required', '');
    } else {
        box.style.display = 'none';
        checkbox.value=0;
        input.removeAttribute('required');
    }
}
