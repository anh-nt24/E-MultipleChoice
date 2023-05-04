document.querySelector('.view-answer').addEventListener('click', () => {
    const review = document.querySelector('.review');
    review.style.display = 'block';
});

document.querySelector('.home').addEventListener('click', () => {
    window.location.replace(`?action=home`);
})

function replay(id) {
    window.location.replace(`?action=quiz&token=${window.btoa(id)}`);
}

function report(id) {
    window.location.replace(`?action=report&token=${window.btoa(id)}`);
}