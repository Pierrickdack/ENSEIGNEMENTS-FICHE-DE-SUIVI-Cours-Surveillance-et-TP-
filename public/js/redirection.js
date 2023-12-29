// Fonction pour faire défiler vers le haut de la page
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// Afficher/masquer le bouton de retour en haut en fonction du défilement
window.onscroll = function () {
    showBackToTopButton();
};

function showBackToTopButton() {
    var button = document.querySelector('.back-to-top');
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        button.style.display = 'block';
    } else {
        button.style.display = 'none';
    }
}

function navigate(page) {
    window.location.href = page;
}

// Fonction pour changer dynamiquement le mot
function changeWord() {
    var dynamicWord = document.getElementById('dynamic-word');
    var words = ['Enseignements', 'Surveillances', 'Travaux Pratiques'];
    var index = 0;

    setInterval(function() {
        dynamicWord.innerHTML = words[index];
        index = (index + 1) % words.length;
    }, 3000);
}

// Appeler la fonction après le chargement de la page
window.onload = function() {
    changeWord();
};

function scrollToCardContainer() {
    document.getElementById('card-container').scrollIntoView({ behavior: 'smooth' });
}