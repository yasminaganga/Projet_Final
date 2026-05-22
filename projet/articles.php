
<?php
require 'connexion.php';
// include 'config/connection.php';
include 'connection.php';
try {
    $sql = "SELECT id, titre, contenu, image FROM articles";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $articles = $stmt->fetchAll(2);
}catch(PDOException $e){
 die("KAYN MOCHKIL F CONNEXION:" . $e->getMessage());
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MindCare - Articles</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- NAVBAR -->
    <div class="navbar">
        <a href="home.php" class="logo">
            <span class="logo-icon"></span> MindCare
        </a>

        <ul class="menu_list">
             <li><a href="home.php" class="active">Home</a></li>
            <li><a href="articles.php" class="active">Articles</a></li>
            <li><a href="storys.php">Stories</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>

        <div class="nav-auth">
            <a href="login.php" class="btn-login">Login</a>
        </div>
    </div>
<main class="articles">
    <?php if (!empty($articles)):?>
        <?php foreach ($articles as $article):?>
            <img src="image/<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['titre']); ?>">
                    
                    <div class="article-content">
                       
                        <h3><?php echo htmlspecialchars($article['titre']); ?></h3>
                        
                        
                        <p><?php echo htmlspecialchars($article['contenu']); ?></p>
                        <a href="detailsarticle.php?id=<?php echo $article['id']; ?>" class="read-more-btn">Read More →</a>
        </div>
    </div>
                    </div>
                </div>
            <?php endforeach; ?>
         
        <?php else: ?>
               <?php endif; ?>
            </main>
   
    <!-- ARTICLES -->
    <!-- <main class="articles-container">
        <h2 class="section-title">Articles</h2>

        <div class="articles-grid">

            <article>
                <a href="article.php?id=1">
                    <img src="IMG/.png" alt="Insomnia article">
                    <h3>Insomnia</h3>
                </a>
            </article>

            <article>
                <a href="article.php?id=2">
                    <img src="IMG/.png" alt="Anxiety article">
                    <h3>Anxiety</h3>
                </a>
            </article>

            <article>
                <a href="article.php?id=3">
                    <img src="IMG/.png" alt="Loneliness article">
                    <h3>Loneliness</h3>
                </a>
            </article>

            <article>
                <a href="article.php?id=4">
                    <img src="IMG/" alt="Overthinking article">
                    <h3>Overthinking</h3>
                </a>
            </article>

            <article>
                <a href="article.php?id=5">
                    <img src="IMG/.png" alt="OCD article">
                    <h3>Obsessive-Compulsive Disorder</h3>
                </a>
            </article>

            <article>
                <a href="article.php?id=6">
                    <img src="IMG/.png" alt="Self acceptance article">
                    <h3>Self-acceptance</h3>
                </a>
            </article>

        </div>
    </main> -->

    <!-- FOOTER -->
    <footer>
        <p>© 2026 MindCare - Tous droits réservés.</p>
    </footer>

</body>
</html>
