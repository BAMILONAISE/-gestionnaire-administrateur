<!-- app/Views/user/edit.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'utilisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    <div class="container">
        <h1>Modifier l'utilisateur</h1>
        <form method="POST" action="index.php?update ">
            <div class="mb-3">
                <label for="username" class="form-label">Nom d'utilisateur</label>
                <input type="text" class="form-control" id="username" name="username" value=<?=$_SESSION['username']?> >
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value=<?=$_SESSION['email']?>>
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Rôle</label>
                <select name="role" id="role"   class=" form-control" value=<?=$_SESSION['role_id']?> >
                    <option value="1">Administrateur</option>
                    <option value="2">Client</option>
                </select>
            </div>

            <!-- <div class="mb-3">
                <label for="status" class="form-label">Statut</label>
                <select class="form-control" id="status" name="status">
                    <option value="active" >Actif</option>
                    <option value="inactive" >Inactif</option>
                </select>
            </div> -->
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
</body>
</html>