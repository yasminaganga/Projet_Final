<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindCare - Add New Article</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="navbar">
        <a href="home.php" class="logo">
            <span class="logo-icon"></span> MindCare
        </a>
        <ul class="menu_list">
            <li><a href="home.php">Home</a></li>
            <li><a href="articles.php" class="active">Articles</a></li>
            <li><a href="storys.php">Stories</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </div>

    <main class="form-container">
        <h2>ADD A NEW ARTICLE</h2>
        
        <form action="insertarticle.php" method="post"> 

            <div class="form_ajouture">
                <label for="titre">titre Article :</label>
                <input type="text" id="titre" name="titre" required>
            </div>

            <div class="form_ajouture">
                <label for="image">image URL :</label>
                <input type="text" id="image" name="image" required>
            </div>

            <div class="form_ajouture">
                <label for="auteur">Author Name :</label>
                <input type="text" id="auteur" name="author" style="display:none;"> <input type="text" id="auteur" name="auteur" required>
            </div>

            <div class="form_ajouture">
                <label for="contenu">Article Content :</label>
                <textarea name="contenu" id="contenu" required></textarea>
            </div>

            <button type="submit" class="btn-submit" name="ok">Publish Article</button>

        </form> </main>

</body>
</html>