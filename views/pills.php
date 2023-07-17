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
      <label for="textArea">Zone à remplir :</label>
      <input type="text" id="textArea" name="textArea" value="<?php echo htmlspecialchars($medicName); ?>">
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
