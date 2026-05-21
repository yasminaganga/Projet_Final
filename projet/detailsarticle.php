<?php
require 'connexion.php';


if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    try {
        
        $sql = "SELECT id, titre, contenu, image, auteur FROM articles WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute(['id' => $id]);
  
        $article = $stmt->fetch(2);

 
        if (!$article) {
            die("This article does not exist!");
        }

    } catch (PDOException $e) {
        die("Error fetching article details: " . $e->getMessage());
    }
} else {
    
    die("Article ID is missing!");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindCare - <?php echo htmlspecialchars($article['titre']); ?></title>
</head>
<body>

    <div class="navbar">
        <a href="index.php" class="logo">
            <span class="logo-icon"></span> MindCare
        </a>
        <ul class="menu_list">
            <li><a href="index.php">Home</a></li>
            <li><a href="articles.php" class="active">Articles</a></li>
            <li><a href="storys.php">Stories</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </div>

    <main class="single-article-container">
        
        <div class="back-link">
            <a href="articles.php">← Back to Articles</a>
        </div>

        <article class="full-article">
            <h1 class="article-title"><?php echo htmlspecialchars($article['titre']); ?></h1>
            
            <div class="article-meta">
                <p>By <strong><?php echo htmlspecialchars($article['auteur']); ?></strong></p>
            </div>
            
            <div class="article-image">
                <img src="<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['titre']); ?>">
            </div>

            <div class="article-body">
                <p><?php echo nl2br(htmlspecialchars($article['contenu'])); ?></p>
            </div>
        </article>

    </main>

</body>
</html>