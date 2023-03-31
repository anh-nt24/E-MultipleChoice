document.querySelector('.view-answer').addEventListener('click', () => {
    const review = document.querySelector('.review');
    review.style.display = 'block';
});

document.querySelector('.home').addEventListener('click', () => {
    window.location.replace(`App.php?action=home`);
})

function replay(id) {
    window.location.replace(`App.php?action=quiz&token=${window.btoa(id)}`);
}

