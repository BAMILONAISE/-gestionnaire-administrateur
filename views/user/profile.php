<!-- app/views/user/profile.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Profil</h1>
        <p>Nom d'utilisateur: <?php echo $user['username']; ?></p>
        <p>Email: <?php echo $user['email']; ?></p>
        <a href="index.php?dashboard" class="btn btn-primary">Retour au tableau de bord</a>
    </div>
</body>
</html>