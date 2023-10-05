// Identifiants de connexion (à déplacer dans un fichier séparé pour la sécurité)
const users = [
    { username: 'admin', password: 'motdepasse123' },
    // Ajoutez d'autres identifiants ici si nécessaire
];

// Fonction pour vérifier les identifiants et rediriger
function handleConnexion() {
    const usernameInput = document.getElementById('username').value;
    const passwordInput = document.getElementById('password').value;

    // Vérifie si les identifiants sont valides
    const isValidUser = users.some(user => {
        return user.username === usernameInput && user.password === passwordInput;
    });

    if (isValidUser) {
        // Redirige vers la page admin si les identifiants sont valides
        window.location.href = 'admin.html';
    } else {
        // Affiche un message d'erreur si les identifiants ne sont pas valides
        alert('Identifiants incorrects. Veuillez réessayer.');
    }
}

// Écouteur d'événement sur le bouton de connexion
const btnConnexion = document.getElementById('btn-connexion');
btnConnexion.addEventListener('click', handleConnexion);
