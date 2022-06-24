const checkbox = document.getElementById('type_checkbox');
const box = document.getElementById('clientName-box');
const input = document.getElementById('clientName');

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
