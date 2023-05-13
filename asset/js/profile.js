
const closeDiv = (idx) => {
    let element;
    console.log(idx);
    if (idx == 1) {
        element = document.querySelector('.changeinfo');
    }
    else if (idx==0){
        element = document.querySelector('.changepass');
    }
    else {
        element = document.querySelector('.deactive');
    }
    element.style.display = 'None';
}

const showCP = () => {
    const element = document.querySelector('.changepass');
    element.style.display = '';
}

const showInfo = () => {
    const element = document.querySelector('.changeinfo');
    element.style.display = '';
}

const showDA = () => {
    const element = document.querySelector('.deactive');
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

function rememberme(checkbox, name) {
    const checked = checkbox.checked;
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            // console.log(this.responseText);
        }
    };
    let url = "client/model/Remember.php";
    if (checked) {
        url += `?name=${name}`;
    }
    xhttp.open("GET", url, true);
    xhttp.send();
}
