<?php require_once 'header.php'; 
//var_dump($medicNames);
?>


  <h1>PiLLS</h1>
  
  <!-- formulaire ajouté -->
  <form action="./src/traitement.php" method="post">
  <div>
    <label for="medicName">Médicament :</label>
    <select name="medicName" id="medicName">
      <?php foreach ($medicNames as $medicName): ?>
          <option value="<?= htmlspecialchars($medicName) ?>"><?= htmlspecialchars($medicName) ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div>
    <input type="button" id="addMedic" value="Ajouter au tableau">
  </div>
</form>


  <!-- Ajout du conteneur du tableau -->
  <div>
  <table id="selectedMedics">
    <tbody>
        <?php foreach ($medics as $medic): ?>
        <tr>
            <td><?= $medic['name'] ?></td>
            <td><?= $medic['taken'] ? 'Pris' : 'Non pris' ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
  </table>
  </div>
 

  <script src="./src/main.js"></script>

  <?php require_once 'footer.php'; ?>
