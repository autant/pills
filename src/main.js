document.addEventListener('DOMContentLoaded', function() {
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
        var removeButton = document.createElement('button');
        removeButton.textContent = 'Supprimer';
        removeButton.addEventListener('click', function() {
          // Supprimer la ligne du tableau
          tbody.removeChild(row);
        });
        cell2.appendChild(removeButton);
      }
    });
  });
  