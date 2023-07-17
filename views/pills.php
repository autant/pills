<!DOCTYPE html>
<html>
<head>
  <title>Pills</title>
</head>
<body>
  <h1>nehm</h1>
  
  <!-- formulaire ajouté -->
  <form action="traitement.php" method="post">
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
    <thead>
      <tr>
        <th>Nom du médicament</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>
  </form>
</body>
</html>
