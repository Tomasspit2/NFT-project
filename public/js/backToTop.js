// Afficher ou masquer le bouton en fonction du défilement
window.addEventListener('scroll', function() {
    if (window.scrollY > 100) {
        document.getElementById('back-to-top').style.display = 'block';
    } else {
        document.getElementById('back-to-top').style.display = 'none';
    }
});

// Scroll vers le haut lorsque le bouton est cliqué
document.getElementById('back-to-top').addEventListener('click', function() {
    scrollToTop();
});

function scrollToTop() {
    if (document.body.scrollTop !== 0 || document.documentElement.scrollTop !== 0) {
        window.scrollBy(0, -2000);
        setTimeout(scrollToTop, 10);
    }
}