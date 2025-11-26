<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>Add Game</title>
</head>
<body>
    <?php include 'component/navbar.php'?>
    <main class="container">
    <h1>Ajouter un jeu vidéo</h1>
    <form action="" method="post">
        <fieldset>
            <label>
                <input type="text" name="title" placeholder="Saisir le titre du jeu vidéo">
            </label>
            <label>
                <input type="text" name="type" placeholder="Saisir le type du jeu vidéo">
            </label>
            <label>Saisir la date de sortie
                <input type="datetime-local" name="publish_at" aria-label="Choix de la date de sortie">
            </label>
            <select aria-label="Sélectionner une console de jeu" name="consoles[]" id="">
                <option disabled>
                    Séléctionner une console de jeu vidéo...
                </option>
                <?php foreach ($console["id"] as $console) :?>
                    <option value="<?= $console["id"] ?>"><?= $console["name"] ?></option>
                    
                <?php endforeach ?>
            </select>
        </fieldset>
        <input type="submit" value="Ajouter" name="submit">
    </form>
    </main>
</body>
</html>