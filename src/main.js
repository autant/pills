document.addEventListener('DOMContentLoaded', function() {
    // Supposons que vous ayez obtenu ces valeurs d'une certaine manière
    var userId = "ID_utilisateur"; // Remplacez par l'ID réel de l'utilisateur
    var medicId = "ID_medicament"; // Remplacez par l'ID réel du médicament

    // Lorsque le bouton 'Ajouter au tableau' est cliqué
    document.getElementById('addMedic').addEventListener('click', function() {
        var selectedMedic = document.getElementById('medicName').value;
        if (selectedMedic) {
            // Ajouter le médicament sélectionné au tableau
            var tbody = document.getElementById('selectedMedics').getElementsByTagName('tbody')[0];
            var row = tbody.insertRow();

            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);

            cell1.textContent = selectedMedic;

            var takenButton = document.createElement('button');
            takenButton.textContent = 'Pris';
            takenButton.addEventListener('click', function() {
                // Marquer la ligne comme grisée
                row.classList.add('taken');

                // Délai de 20 secondes avant de dégriser la ligne
                setTimeout(function() {
                    row.classList.remove('taken');
                }, 20000);  // 20000 millisecondes = 20 secondes

                // Envoi d'une requête AJAX pour valider un médicament dans le tableau de l'utilisateur
                validateMedicInTable(userId, medicId);
            });
            cell2.appendChild(takenButton);

            // Envoi d'une requête AJAX pour ajouter un médicament au tableau de l'utilisateur
            addMedicToTable(userId, medicId);
        }
    });
});

// Envoi d'une requête AJAX pour ajouter un médicament au tableau de l'utilisateur
function addMedicToTable(userId, medicId) {
    fetch('addMedic.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ userId: userId, medicId: medicId }),
    });
}

// Envoi d'une requête AJAX pour valider un médicament dans le tableau de l'utilisateur
function validateMedicInTable(userId, medicId) {
    fetch('validateMedic.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ userId: userId, medicId: medicId }),
    });
}
