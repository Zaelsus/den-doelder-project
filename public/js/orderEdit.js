const yes = document.getElementById('t1');
const no = document.getElementById('t2');

const box = document.getElementById('clientName-box');
const input = document.getElementById('clientName');


console.log('box ' + box.style, 'input ' + input.attributes);

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
