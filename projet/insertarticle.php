<?php
require 'connexion.php';
if(isset($_POST['ok'])){
   $titre =($_POST['titre']);
  $image =($_POST['image']);
 $contenu =($_POST['contenu']);
  $auteur =($_POST['auteur']);
  if (!empty($titre) && !empty($image) && !empty($contenu) && !empty($auteur)){
   try{
    $sql = "INSERT INTO articles (titre, image, contenu, auteur) VALUES(:titre, :image, :contenu, :auteur)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'titre' =>$titre,
        'image' =>$image,
        'contenu' =>$contenu,
        'auteur' =>$auteur
    ]);
    header("Location: articles.php");
            exit();
   }catch(PDOException $e){
    die("kayn chi ralt: " . $e->getMessage());
   }
  }else{
    echo "3AMR JAMI3 L5ANAT";
  }
}
?>