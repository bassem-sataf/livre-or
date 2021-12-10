<?php
session_start();
?>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Accueil</title>
<link rel="stylesheet" href="./elements/style1.css">

<body>
    <header>
    </header>
    
    <main>
        <div class="global">
            <a id="git" href="https://github.com/bassem-sataf/module-connexion">https://github.com/bassem-sataf/module-connexion</a>
        
        <?php
            if(isset($_SESSION['login'])){ ?>
                
                <h2>Bienvenue sur votre espace <br><?php echo strtoupper($_SESSION['login']); ?> </h2>
                <div class="connecte">
                    <div class="conn">
                        <section>
                            <a href='profil.php'>Votre Profil</a>
                        </section>
                        <section>
                            <a id="livre" href='livre-or.php'>Livre d'or</a>
                        </section>
                    </div>
                        <section class="deco">
                            <a id='deco' href='./elements/logout.php'>Se deconnecter</a>
                        </section>
                </div>
            
            <?php }
            
            else{ ?>
            
                <h1> LUIZA </h1>
                <h3> Bienvenue sur l'accueil du service après vente de LUIZA notre nouveau parfum. <br></h3>
                <h4> 
                    <i>Ce parfum a était distribuée sous formes d'échantillons testeur dans plusieures enseignes si vous avez fait partie des personnes qui ont pu 
                    tester notre produit merci de créer un compte et de nous donnez votre avis sur celui-çi.</i>
                </h4>
                <div class="deconnecte">
                    <section>
                        <p>Premiere visite ?</p>
                        <a href='inscription.php'>inscrivez-vous </a>
                    </section>
                    <section>
                        <p>Lire les avis :</p>
                        <a href='livre-or.php'>Livre d'or</a>
                    </section>
                    <section>
                        <p>Déjà inscrit ? alors</p>
                        <a href='connexion.php'>connectez-vous </a>
                    </section>
                </div>
    
    <?php } ?>

        </div>
    </main>

    <footer>
    </footer>
</body>