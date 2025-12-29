<?php
require 'db.php';

try {
    $stmt = $pdo->query("SELECT * FROM actualite ORDER BY date_publication DESC");
    $mes_articles = $stmt->fetchAll();
} catch (Exception $e) {
    die("Erreur : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nos Actualités | FAGE</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* PETIT CORRECTIF POUR ÊTRE SÛR QUE LE TEXTE EST LISIBLE */
        .card { background: white; border: 1px solid #eee; }
        .card h3 { color: #333; }
        .card p { color: #666; }
    </style>
</head>
<body>

  <nav class="navbar">
      <div class="nav-container">
          <a href="index.html" class="nav-logo">
              <img src="https://ageparis.org/agepwebcontent/uploads/2013/01/fage-blanc-logo-min.png" alt="Logo FAGE">
          </a>

          <button id="menu-btn" class="hamburger"><span></span><span></span><span></span></button>

          <ul class="nav-links">
              <li><a href="index.html">Accueil</a></li>
              <li><a href="Fage.html">La FAGE</a></li>
              <li><a href="actualites.php">Actualités</a></li>
              <li><a href="Droit.html">Nos Droits</a></li>
              <li><a href="formationFage.html">Formation</a></li>
              <li><a href="guideElu.html">Le Guide</a></li>
              <li><a href="scolariteEtudiant.html">Scolarité</a></li>
              <li><a href="Civique.html">Civique</a></li>
          </ul>
      </div>

      <ul id="mobile-menu" class="mobile-menu">
          <li><a href="index.html">Accueil</a></li>
          <li><a href="Fage.html">La FAGE</a></li>
          <li><a href="actualites.php">Actualités</a></li> <li><a href="Droit.html">Nos Droits</a></li>
          <li><a href="formationFage.html">Formation</a></li>
          <li><a href="guideElu.html">Le Guide</a></li>
          <li><a href="scolariteEtudiant.html">Scolarité</a></li>
          <li><a href="Civique.html">Civique</a></li>
      </ul>
  </nav>

    <main class="container" style="padding-top:100px;">
        <h1 style="text-align:center; margin-bottom:2rem; color:var(--primary-blue);">Toutes les actualités</h1>

        <?php if (count($mes_articles) == 0): ?>
            <p style="text-align:center;">Aucun article pour le moment.</p>
        <?php endif; ?>

        <div class="grid-3">
            <?php foreach($mes_articles as $art): ?>
                <article class="card">

                    <?php if(!empty($art['image_url'])): ?>
                        <img src="<?php echo htmlspecialchars($art['image_url']); ?>" style="width:100%; height:200px; object-fit:cover;">
                    <?php endif; ?>

                    <h3><?php echo htmlspecialchars($art['titre']); ?></h3>
                    <p>Publié le <?php echo date("d/m/Y", strtotime($art['date_publication'])); ?></p>

                    <a href="read.php?id=<?php echo $art['id_actu']; ?>"
                       class="btn-lire-suite"
                       style="display:inline-block; margin-top:10px; padding:8px 15px; background-color:#3b82f6; color:white; text-decoration:none; border-radius:5px;">
                       Lire la suite &rarr;
                    </a>

                </article>
            <?php endforeach; ?>
        </div>
    </main>

<footer>
    <div class="footer-grid">

        <div class="footer-col">
            <h3>La FAGE</h3>
            <ul>
                <li><a href="Fage.html">Qui sommes-nous ?</a></li>
                <li><a href="Fage.html">L'équipe nationale</a></li>
                <li><a href="Fage.html">Nos membres</a></li>
            </ul>
        </div>

        <div class="footer-col">
            <h3>Nos Droits</h3>
            <ul>
                <li><a href="Droit.html">Défense des droits</a></li>
                <li><a href="Droit.html">FAQ</a></li>
                <li><a href="Droit.html">Gouvernance</a></li>
            </ul>
        </div>

        <div class="footer-col">
            <h3>Formations</h3>
            <ul>
                <li><a href="formationFage.html">Catalogue complet</a></li>
                <li><a href="guideElu.html">Guide de l'élu</a></li>
                <li><a href="Civique.html">Formation Civique</a></li> </ul>
        </div>

        <div class="footer-col">
            <h3>Vie Étudiante</h3>
            <ul>
                <li><a href="scolariteEtudiant.html">Scolarité & Précarité</a></li> <li><a href="read.php">Coût de la rentrée</a></li> </ul>
        </div>

        <div class="footer-col">
            <h3>Contact</h3>
            <ul>
                <li><a href="mailto:contact@fage.org">contact@fage.org</a></li>
                <li>01.40.33.70.70</li>
                <li>79 rue Périer, Montrouge</li>
            </ul>
        </div>

        <div class="footer-col" style="display:flex; align-items:center;">
            <a href="NewLetter.php" class="btn btn-white" style="color:var(--primary-blue)">Newsletter</a>
        </div>

    </div>
</footer>
</body>
</html>
