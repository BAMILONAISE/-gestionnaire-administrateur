<!-- app/views/user/dashboard.php -->


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Tableau de Bord</h1>
        <p>Bienvenue, <?php echo $_SESSION['username']; ?>!</p>
        <p>Votre email est: <?php echo $_SESSION['email']; ?>!</p>

        <a href=" index.php?profile" class="btn btn-primary">Voir mon profil</a>
        <a href="index.php?logout" class="btn btn-danger">Se déconnecter</a>
        <a href="index.php?update" class="btn btn-warning btn-sm">Modifier</a>
    </div>
</body>
</html>





