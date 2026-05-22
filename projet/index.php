<?php  
require 'connexion.php';
session_start();

if(isset($_POST['Continue'])){
     $nom =($_POST ['nom']);
    
     $email =($_POST['email']);
     $password =($_POST['password']);

$_SESSION['name']= $nom ;
    $_SESSION['password']= $password ;

    try {
         
            $stmt = $pdo->prepare("INSERT INTO users (nom, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$nom, $email , $password]);

            header("Location: index.php");
            exit;
        } catch (PDOException $e) {
            die("Erreur lors de l'enregistrement : " . $e->getMessage());
        }
    }
     

 
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MindCare</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <div class="navbar">
        <a href="index.php" class="logo">
            <span class="logo-icon"></span> MindCare
        </a>
        <ul class="menu_list">
            <li><a href="index.php">Home</a></li>
            <li><a href="articles.php">Articles</a></li>
            <li><a href="storys.php">storys</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <div class="nav-auth">
            <a href="login.php" class="btn-login">Login</a>
        </div>
    </div>

    <div class="auth-container">
        <span class="step-tag">1. Login / Register</span>
        <h3>Create Account</h3>
        <p class="desc">Join our community and take care...</p>
        
        <form action="index.php" method="GET"> <div class="input-group">
                <input type="text" name='name' placeholder="Enter your name" required>
            </div>
            <div class="input-group">
                <input type="email"  name='email'  placeholder="Enter your email" required>
            </div>
            <div class="input-group">
                <input type="password" name='password' placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn-submit" name= 'Continue'>Continue</button>
        </form>
        
        <p class="login-link">Already have an account? <a href="login.php">Login</a></p>
    </div>

    <footer>
        <p>© 2026 MindCare - Tous droits réservés.</p>
    </footer> 
</body>
</html>