<?php
require 'connexion.php';
session_start();
// include 'config/connection.php';
if ( isset($_POST['ook'])){

  $nom = htmlspecialchars($_POST['story_title']); 
    $email = htmlspecialchars($_POST['story_email']);
    $message = htmlspecialchars($_POST['story_content']);

    
// if(isset ($_SESSION['name'])){
    
if (!empty($message)) {
        try {

         
            $stmt = $pdo->prepare("INSERT INTO stories (nom, email, message) VALUES (?, ?, ?)");
            $stmt->execute([$nom, $email, $message]);
            
          
            header("Location: contact.php");
            exit;
        } catch (PDOException $e) {
            die("Erreur lors de l'enregistrement : " . $e->getMessage());
        }
    }
}

    
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        <a href="home.php" class="logo">
            <span class="logo-icon"></span> MindCare
        </a>
        <ul class="menu_list">
            <li><a href="home.php">Home</a></li>
            <li><a href="articles.php">Articles</a></li>
            <li><a href="storys.php" class="active">storys</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <div class="nav-auth">
            <a href="login.php" class="btn-login">Login</a>
        </div>
    </div>

    <main class="main-wrapper">
        <div class="story-container">
            <h2>Share Your Story</h2>
            
            <form action="storys.php" method="POST">
                <div class="form-group-inline">
                    <input type="text" name="story_title" placeholder="Your Name or Title" class="form-control">
                    <input type="email" name="story_email" placeholder="Your Email" class="form-control">
                </div>
                <div style="margin-bottom: 15px;">
                    <textarea name="story_content" placeholder="Write your story here..." rows="5" class="form-control" required></textarea>
                </div>
                <button type="submit" name="ook" class="btn-submit">Send Your Story</button>
            </form>
        </div>
    </main>

    <footer>
        <p>© 2026 MindCare - Tous droits réservés.</p>
    </footer>
</body>
</html>