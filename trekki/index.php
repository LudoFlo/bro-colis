<?php include 'inc/init.inc.php';
$erreur = "";
if(isset($_POST['inscription']) AND $_POST['inscription'] == "Inscrivez-vous"){
    var_dump($_POST);
    extract($_POST);
    //echo $email; //= echo $_POST['email'];
    
    //vérification de l'email
        if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            $erreur.= '<div class="alert alert-danger">Le format de l\'email est incorrect</div> ';
        }
    //insertion dans la bdd    
    if(empty($erreur)){ //si aucune erreur, on fait un insert des données
        $requeteInsert = $pdo->prepare('INSERT INTO user_landing_1 (id_user, email, date_inscription) VALUES (
                    :id_user,
                    :email,
                    :date_inscription)'); // ce systeme de référence avec la méthode prepare() est sécurisé et performante
        $requeteInsert->bindValue('id_user',$_POST['id_user'],PDO::PARAM_INT);
        $requeteInsert->bindValue('email',$_POST['email'],PDO::PARAM_STR);
        $requeteInsert->bindValue('date_inscription',date('y-m-d h:i:s'),PDO::PARAM_STR); 
        //bindValue() attend trois arguments : la référence, la saisie de l'utilisateur, le type de formatage à effectuer sur la saisie (STR / INT)

        $requeteInsert->execute();

        header('location:index.php?inscription=ok');


    }else{
            $content.= '<div class="alert alert-danger">Votre inscription a bien été envoyé</div> ';
            unset($_POST); //je vide le contenu de $_POST // unset() => vider le contenu d'un array
        }
}

    
$champEmail = (isset($_POST['email']) ? $_POST['email'] : null);

$content .= $erreur

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5FJ29J3');</script>
    <!-- End Google Tag Manager -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Trekki</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">

    <script src="https://www.gstatic.com/firebasejs/5.0.4/firebase.js"></script>
    <script>
        // Initialize Firebase
        var config = {
            apiKey: "AIzaSyADQKLb6BrfjyJPBBwBIdEoihLx6S0mqfA",
            authDomain: "bro-colis.firebaseapp.com",
            databaseURL: "https://bro-colis.firebaseio.com",
            projectId: "bro-colis",
            storageBucket: "",
            messagingSenderId: "381638920763"
        };
        firebase.initializeApp(config);
    </script>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FJ29J3"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    
    <!-- ECRAN 1 -->
    <div style="height: 100vh">
        <div class="flex-center flex-column left">
            <a href="index.html">
                <img src="#" alt="logo" />
            </a>
            <h1>La solution pour s'évader sans bouger</h1>
            <p>La plate-forme s'écurisée pour les amoureux du grand air qui permet de s'évader de chez soi sans difficulté.</p>
            <br><br>
            <p>Inscrivez-vous et faites partis la commnunauté</p>
            <form class="form-row" action="" method="post">
                <label for="emailInput"></label>
                    <input id="emailInput" type="text" name="email" placeholder="Adresse mail" value="<?= $champEmail?>" />
                    <input name="inscription" class="send" type="submit" value="Inscrivez-vous" />
            </form>
        </div>
        <div class="flex-center flex-column right">
            <img id="fil" src="img/mockup-smartwatch.png"alt="mockup montre">
        </div>
    </div>


    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>

</body>

</html>