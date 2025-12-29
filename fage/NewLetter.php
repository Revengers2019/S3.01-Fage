<?php
require 'db.php';

$message_succes = false; // Par défaut, on n'a pas encore réussi
$erreur = "";

// SI LE FORMULAIRE EST ENVOYÉ
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['email'])) {

    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $orga = htmlspecialchars($_POST['organisation']);

    // On vérifie l'email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        try {
            $sql = "INSERT INTO newsletter (nom, prenom, email, organisation, date_inscription) VALUES (?, ?, ?, ?, NOW())";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nom, $prenom, $email, $orga]);

            // C'EST GAGNÉ ! On passe la variable à TRUE pour changer l'affichage plus bas
            $message_succes = true;

        } catch (PDOException $e) {
            $erreur = "Cet email est déjà inscrit !";
        }
    } else {
        $erreur = "Format d'email invalide.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription Newsletter | FAGE</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .newsletter-card {
            background: white; padding: 40px; border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05); max-width: 700px; margin: 0 auto;
        }
        .form-row { display: flex; gap: 20px; margin-bottom: 20px; }
        .form-col { flex: 1; }
        label { display: block; font-weight: bold; margin-bottom: 8px; color: #333; }
        .required { color: #dc2626; }
        input[type="text"], input[type="email"] {
            width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 8px; font-size: 1rem;
        }
        .btn-submit {
            background-color: #5a73e8; color: white; width: 100%; padding: 15px; border: none;
            border-radius: 30px; font-weight: bold; font-size: 1.1rem; cursor: pointer; margin-top: 20px;
        }
        .btn-submit:hover { opacity: 0.9; }

        /* Style spécifique pour le message de succès */
        .success-box {
            text-align: center; padding: 50px 20px;
        }
        .success-icon { font-size: 4rem; margin-bottom: 20px; display: block; }
        .btn-home {
            display: inline-block; background: #10b981; color: white; padding: 12px 30px;
            border-radius: 30px; text-decoration: none; font-weight: bold; margin-top: 20px;
        }
    </style>
</head>
<body style="background-color: #f3f4f6;">

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

    <main class="container" style="padding-top: 100px; padding-bottom: 60px;">

        <div class="newsletter-card">

            <?php if($message_succes == true): ?>

                <div class="success-box">
                    <span class="success-icon">✅</span>
                    <h1 style="color: #065f46; margin-bottom: 15px;">Félicitations !</h1>
                    <p style="font-size: 1.1rem; color: #4b5563;">
                        Vous êtes bien inscrit(e) à la newsletter de la FAGE.<br>
                        Vous recevrez bientôt nos actualités.
                    </p>
                    <a href="index.html" class="btn-home">Retourner à l'accueil</a>
                </div>

            <?php else: ?>

                <h1 style="color: #111827; margin-bottom: 10px;">Inscription à la newsletter</h1>
                <p style="color: #6b7280; margin-bottom: 20px;">
                    Remplissez le formulaire ci-dessous pour rejoindre notre réseau.
                </p>

                <?php if($erreur): ?>
                    <div style="background:#fee2e2; color:#991b1b; padding:10px; border-radius:5px; margin-bottom:20px; text-align:center; font-weight:bold;">
                        ⚠️ <?php echo $erreur; ?>
                    </div>
                <?php endif; ?>

                <p style="color: #dc2626; font-size: 0.9rem; margin-bottom: 25px;">* Champs obligatoires.</p>

                <form action="" method="POST">

                    <div class="form-row">
                        <div class="form-col">
                            <label>Prénom <span class="required">*</span></label>
                            <input type="text" name="prenom" required>
                        </div>
                        <div class="form-col">
                            <label>Nom <span class="required">*</span></label>
                            <input type="text" name="nom" required>
                        </div>
                    </div>

                    <div class="form-col" style="margin-bottom: 20px;">
                        <label>Email <span class="required">*</span></label>
                        <input type="email" name="email" required>
                    </div>

                    <div class="form-col">
                        <label>Organisation</label>
                        <input type="text" name="organisation">
                    </div>

                    <button type="submit" class="btn-submit">S'inscrire</button>

                </form>

            <?php endif; ?>

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
