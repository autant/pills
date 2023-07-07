<?php
// views/todo.php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Pills</title>
</head>
<body>
  <h1>Pills</h1>
  
  <form method="post" action="index.php?action=logout">
  <button type="submit" name="logout">Déconnexion</button>
  </form>

  <ul>
    <?php foreach($todos as $todo): ?>
      <li><?= $todo['name']; ?></li>
    <?php endforeach; ?>
  </ul>
</body>
</html>
