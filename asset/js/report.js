setInterval(() => {
    const reason = document.querySelector('.reason').value;
    const submit = document.querySelector('.submit');
    if (reason.length > 255) {
        document.querySelector('.reason-label').innerHTML = 'Reason <span style="color: red; font-size: 13px"><i>(Text must be less than 255 length)</i></span>'
        submit.style.pointerEvents = 'none';
        
    }
    else {
        document.querySelector('.reason-label').innerHTML = 'Reason';
        submit.style.pointerEvents = 'auto';
    }
}, 1000);

const showSucess = () => {
    $('.alert-success').show();
    setTimeout(() => {
        $('.alert-success').hide();
        window.location.href = "http://localhost/Quiz/?action=home";
    }, 1000);

}