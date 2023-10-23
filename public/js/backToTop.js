// Show or hide the button when scrolling
window.addEventListener('scroll', function() {
    if (window.scrollY > 100) {
        document.getElementById('back-to-top').style.display = 'block';
    } else {
        document.getElementById('back-to-top').style.display = 'none';
    }
});