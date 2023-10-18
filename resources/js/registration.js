//get elements from DOM
const formElement = document.querySelector('form[method="POST"]')
const inputName = document.querySelector('input[id="name"')
const inputLastName = document.querySelector('input[id="lastname"]')
const inputEmail = document.querySelector('input[id="email"]')
const inputPassword = document.querySelector('input[id="password"]')
const inputPasswordConfirm = document.querySelector('input[id="password-confirm"]')
const message = document.querySelector('.message')
const close = document.querySelector('input[id="close"]')
console.log(message)
//Add validation
formElement.addEventListener('submit', (e) => {
    if (inputName.value.length < 3 || inputName.value.length > 255) {
        e.preventDefault()
        showMessage()
        message.innerText = "Il nome deve contenere almeno 3 caratteri."
        console.log(message.value)
    }
    if (inputLastName.value.length < 3 || inputLastName.value.length > 255) {
        e.preventDefault()
        showMessage()
        message.innerText = "Il cognome deve contenere almeno 3 caratteri."
    }
    if (inputEmail.type != 'email') {
        e.preventDefault()
        showMessage()
        message.innerText = 'La mail deve essere valida.'
    }
    if (inputPassword.value.length < 8) {
        e.preventDefault()
        showMessage()
        message.innerText = 'La password deve contenere almeno 8 caratteri'
    }
    if(!containsUppercase(inputPassword.value)) {
        e.preventDefault()
        showMessage()
        message.innerText = 'La password deve contenere almeno una lettera maiuscola'
    }
})

close.addEventListener('click', () => {
    hideMessage()
})

//Functions
function hideMessage() {
    message.classList.add('d-none')
    close.classList.add('d-none')
}
function showMessage() {
    message.classList.remove('d-none')
    close.classList.remove('d-none')
}
function containsUppercase(str) {
    return /[A-Z]/.test(str);
}
function containsNumber(str) {
    return /[0-9]/.test(str);
}