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
        var cell3 = row.insertCell(2);
  
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
        });
        cell2.appendChild(takenButton);
  
        var removeButton = document.createElement('button');
        removeButton.textContent = 'Supprimer';
        removeButton.addEventListener('click', function() {
          // Supprimer la ligne du tableau
          tbody.removeChild(row);
        });
        cell3.appendChild(removeButton);
      }
    });
  });
  