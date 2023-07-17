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
      <label for="medicName">Zone à remplir :</label>
      <select name="medicName" id="medicName">
        <?php foreach ($medicNames as $medicName): ?>
            <option value="<?= htmlspecialchars($medicName) ?>"><?= htmlspecialchars($medicName) ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div>
      <input type="checkbox" id="validate" name="validate" value="validate">
      <label for="validate">Valider</label>
    </div>
    <div>
      <input type="checkbox" id="cancel" name="cancel" value="cancel">
      <label for="cancel">Annuler</label>
    </div>
    <div>
      <input type="submit" value="Envoyer">
    </div>
  </form>
</body>
</html>
