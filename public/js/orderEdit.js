const yes = document.getElementById('t1');
const no = document.getElementById('t2');

const box = document.getElementById('clientName-box');
const input = document.getElementById('clientName');

/**
 * Will check if yes or no is chosen from the radio buttons and will
 * change the form of edit order accordingly if client name is needed or not
 */
function isCheckedEdit() {
    if (yes.checked) {
        box.style.display = 'block';
        input.setAttribute('required', '');
    } else{
        box.style.display = 'none';
        input.removeAttribute('required');
        input.value = null;
    }
}
