<?php

require 'connexion.php';


$stmt = $pdo->query("SELECT * FROM stories ORDER BY id DESC");
$all_stories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MindCare - Share & Community</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="navbar">
        <a href="home.php" class="logo">
            <span class="logo-icon"></span> MindCare
        </a>
        <ul class="menu_list">
            <li><a href="home.php">Home</a></li>
             <li><a href="storys.php">Stories</a></li>
            <li><a href="articles.php">Articles</a></li>
            <li><a href="contact.php" class="active">contact</a></li>
        </ul>
        <div class="nav-auth">
            <a href="login.php" class="btn-login">Login</a>
        </div>
    </div>

    <main class="main-wrapper">
        <div class="stories-feed">
            <h3 class="feed-title">Community Stories</h3>
            
            <?php if (empty($all_stories)): ?>
                <p class="no-stories">Aucune story partagée pour le moment.</p>
            <?php else: ?>
                <?php foreach ($all_stories as $story): ?>
                    <div class="story-card">
                        <h4 class="story-author">
                            <?php echo htmlspecialchars($story['nom'] ?: 'Anonyme'); ?>
                        </h4>
                        
                        <p class="story-message">
                            <?php echo nl2br(htmlspecialchars($story['message'])); ?>
                        </p>
                        
                        <!-- <div class="story-action">
                            <a href="detailsstory.php?id=<?php echo $story['id']; ?>" class="btn-thread">
                                Voir le Thread & Répondre →
                            </a>
                        </div> -->
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </main>

    <footer>
        <p>© 2026 MindCare - Tous droits réservés.</p>
    </footer>
</body>
</html>