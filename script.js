document.getElementById("contactForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Empêche le rechargement de la page

    const formData = new FormData(this);

    fetch("/send-message", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById("responseMessage").innerText = "Message envoyé ! Merci de nous avoir contactés.";
    })
    .catch(error => {
        document.getElementById("responseMessage").innerText = "Erreur lors de l'envoi. Veuillez réessayer.";
    });
});