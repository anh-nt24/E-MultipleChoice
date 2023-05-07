const closeCP = () => {
    const element = document.querySelector('.changepass');
    element.style.display = 'None';
}

const openCP = () => {
    const element = document.querySelector('.changepass');
    element.style.display = '';
}


const ableBtn = () => {
    document.querySelector("#save").disabled = false;
}

const saveChange = () => {
    const element = document.querySelector('.cfm-pass');
    element.style.display = '';
}

const showMsg = () => {
    const element = document.querySelector('#cfm-res');
    element.innerHTML = 'Password is incorrect'
}