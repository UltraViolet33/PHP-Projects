<?php
session_start();
$name = '';
$firstname = '';
$email = '';
$message = '';

if (isset($_POST['name'])) {
    $name = $_POST['name'];
}
if (isset($_POST['firstname'])) {
    $firstname = $_POST['firstname'];
}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
}
if (isset($_POST['message'])) {
    $message = $_POST['message'];
}

function validateData()
{
    $mail = $_POST['email'];
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['msg'] = "Veuillez entrez une adresse email valide !";
        return;
    }

    $_SESSION['msg'] = "Je vous remercie pour votre message, je vous répondrai sous les plus brefs délais !";
}

if (!empty($_POST['firstname']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
    validateData();
} else {
    $_SESSION['msg']=  "Veuillez remplir tous les champs !";
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio Ulysse Valdenaire</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!----------------------------------------- HEADER NAV ----------------------------------------->
    <header class="nav-menu">
        <label for="nav-toggle" class="nav-toggle-label"></label>
    </header>
    <input type="checkbox" id="nav-toggle" class="nav-toggle">
    <ul id="menu-topo">
        <li class="nav-item hover"><a href="#profil">Profil</a></li>
        <li class="hide">•</li>
        <li class="nav-item hover"><a href="#formations">Formations</a></li>
        <li class="hide">•</li>
        <li class="nav-item hover"><a href="#experiences">Expériences</a></li>
        <li class="hide">•</li>
        <li class="nav-item hover"><a href="#info">Compétences informatiques</a></li>
        <li class="hide">•</li>
        <li class="nav-item hover"><a href="#qualities">Qualités</a></li>
        <li class="hide">•</li>
        <li class="nav-item hover"><a href="#contact">Contact</a></li>
    </ul>
    <div class="title">
        <h1 class="name" id="profil">Ulysse Valdenaire</h1>
        <h2>Objectif : Développeur Web</h2>
    </div>
    <!----------------------------------------- SECTION PROFIL ----------------------------------------->
    <section>
        <h3> Mon profil</h3>
        <p>Etant passionné d'informatique, je me suis formé en autodidacte à la création de pages web et au
            développement
            de petits jeux vidéo. J'ai ensuite décidé d'en faire mon métier et j'ai participé à la formation
            "Préparation aux métiers du numérique" où j'ai pu revoir les bases de l'informatique et également réaliser
            un stage de découverte de développement web. Je suis actuellment en formation "Développeur web et web
            mobile"
            à la CCI du Cher. Je recherche un stage de deux mois pour mettre en pratique mes compétences.</p>
        <p>Je vous invite à consulter mon portofolio ou mes comptes LinkedIn et GitHub pour vous rendre compte de
            mes compétences.</p>
        <div class="flex logo">
            <div>
                <a href="https://github.com/UltraViolet33"><img class="link imgGithub" src="images/github.png" title="Lien vers mon compte GitHub"></a>
                <p id="reposGithub">Projets en ligne sur GitHub : </p>
            </div>
            <a href="#" class="link" title="Lien vers mon portofolio">Mon portofolio</a>
            <a href="https://www.linkedin.com/in/ulysse-valdenaire-6667bb208/"> <img class="link" src="images/linkedin.png" title="Lien vers mon compte LinkedIn"></a>
        </div>
    </section>
    <hr>
    <!----------------------------------------- SECTION FORMATIONS EXPERIENCES ----------------------------------------->
    <section class="flex_experiences" id="formations">
        <div class="bloc" id="formations">
            <h3>Formations</h3>
            <h4>Formation professionnelle (Avril-Juillet 2021) :</h4>
            <ul>
                <li>Préparation aux métiers du numérique (CCI du Cher)</li>
            </ul>
            <h4>Certificats en ligne sur OpenClassrooms : (2021)</h4>
            <ul>
                <li>Apprenez à créer votre site web avec HTML5 et CSS3</li>
                <li>Apprenez à programmer avec JavaScript</li>
                <li>Ecrivez du JavaScript pour le web</li>
                <li>Débutez avec React</li>
                <li>Concevez votre site web avec PHP et MySQL</li>
                <li>Adoptez une architecture MVC en PHP</li>
                <li>Programmez en orienté objet PHP</li>
            </ul>
        </div>
        <div class="bloc" id="experiences">
            <h3>Expériences</h3>
            <ul>
                <li>Bénévolat dans une épicerie solidaire (2019)</li><br>
                <li>Stage de découverte du développement web d'une durée d'un mois.<br>
                    Mise en pratique des mises en page CSS. Découverte du framework Cordova avec le langage JavaScript
                    et début du développement
                    d'une application de bureau.</li><br>
            </ul>
            <h3>Quelques projets</h3>
            <div class="divProjects">
                <img class="projects link" src="images/order summary.png">
                <img class="projects link" src="images/qcm informatique.png">
            </div>
        </div>
    </section>
    <hr>
    <!----------------------------------------- SECTION COMPETENCES----------------------------------------->
    <section class="flex_competences">
        <div id="info">
            <h3>Langages informatiques</h3>
            <div class="flex_langages">
                <ul class="listCode">
                    <li class="flex-langages">
                        <div class="align-self-center"><img src="images/html.png"></div>
                        <div class="align-self-center">HTML/CSS</div>
                        <div class="pie" style="--p:40;--c:darkblue;--b:10px"> 60%</div>
                    </li>
                    <li class="flex-langages">
                        <div class="align-self-center"><img src="images/js2.png"></div>
                        <div class="align-self-center">JavaScript</div>
                        <div class="pie" style="--p:40;--c:darkblue;--b:10px"> 60%</div>
                    </li>
                    <li class="flex-langages">
                        <div class="align-self-center"><img src="images/php.png"></div>
                        <div class="align-self-center">PHP</div>
                        <div class="pie" style="--p:40;--c:darkblue;--b:10px"> 60%</div>
                    </li>
                    <li class="flex-langages">
                        <div class="align-self-center"><img src="images/bdd.png"></div>
                        <div class="align-self-center">SQL</div>
                        <div class="pie" style="--p:40;--c:darkblue;--b:10px"> 60%</div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="listQualités" id="qualities">
            <h3>Qualités</h3>
            <ul>
                <li>Capacité d'adaptation</li>
                <li>Autonomie</li>
                <li>Perséverance</li>
                <li>Envie d'apprendre</li>
            </ul>
        </div>
    </section>
    <!----------------------------------------- SECTION FORMULAIRE----------------------------------------->
    <section id="contact">
        <h3>Me contacter</h3>
        <form action="" method="POST" id="form">
            <input type="text" name="firstname" placeholder="Votre prénom" value="<?= $firstname ?>">
            <input type="text" name="name" placeholder="Votre nom" value="<?= $name ?>">
            <input type="mail" name="email" placeholder="Votre adresse mail" value="<?= $email ?>">
            <textarea name="message"><?= $message; ?></textarea>
            <div class="wrapper">
                <button type="submit" name="submit" class="submitBtn">Envoyer</button>
                <button type="reset" class="resetBtn submitBtn">Reset</button>
            </div>
        </form>
        <?php if (isset($_SESSION['error'])) : ?>
            <p class="center"><?= $_SESSION['msg'] ?></p>
            <?php $_SESSION['msg'] = ""; ?>
        <?php endif; ?>
    </section>
    <!----------------------------------------- FOOTER----------------------------------------->
    <footer>
        <div class="flex-center">
            <a href="https://github.com/UltraViolet33" title="Lien vers mon compte GitHub"><img src="images/github.png"></a>
            <a href="https://www.linkedin.com/in/ulysse-valdenaire-6667bb208/" title="Lien vers mon compte LinkedIn"><img src="images/linkedin.png"></a>
        </div>
        <p class="textCopyright">© Copyright Ulysse Valdenaire, Tous droits réservés
        </p>
    </footer>
    <script src="script.js"></script>
</body>

</html>