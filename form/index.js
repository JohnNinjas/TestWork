const init = () => {
    switchInputs();
}
const switchInputs = () => {
    const options = document.querySelectorAll('option');

    options.forEach((elem) => {
        if (elem.selected) {
            $('.maleInput').attr('hidden', true);
            $('.femaleInput').attr('hidden', false);
        } else {
            $('.maleInput').attr('hidden', false);
            $('.femaleInput').attr('hidden', true);
        }
    });
}

const inputMale = document.querySelector('.maleInput');
const inputsFemale = document.querySelectorAll('.femaleInput');
const select = document.querySelector('select');

    select.addEventListener('change', () => {
        switchInputs();
    })

init();