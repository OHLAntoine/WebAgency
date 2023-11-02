<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>DocumentWebAgency</title>
        <link rel="stylesheet" href="./style.css" />
    </head>
    <body>
        <section>
            <?php 
            if (!empty($_POST)) {
                $message = buildContactMessage();
                writeContactFile($message);
                ?>
                <h1>Merci d'avoir pris contact avez nous !</h1>
                <p><?php echo $message; ?></p>
                </br>
                </br>
                <a href="./index.html">Revenir vers la page précédente</a>
            <?php
            } else {
                ?>
                <h1>Erreur dans la récupération de votre message, veuillez ré-essayer plus tard</h1>
                </br>
                </br>
                <a href="./index.html">Revenir vers la page précédente</a>
                <?php
            }
            ?>
        </section>
    </body>
</html>

<?php
function writeContactFile($message)
{
    $file = 'contact.txt';

    if (!is_file($file)) {
        $current = '';
    } else {
        $current = file_get_contents($file);
    }

    $current .= $message;
    $current .= PHP_EOL;

    file_put_contents($file, $current);
}

function buildContactMessage()
{
    $message = 'Date de création : ' . date('d/m/y H:i:s') . '<br/>' . PHP_EOL;

    if (isset($_POST['name'])) {
        $message .= 'Nom : ' . $_POST['name'] . "<br/>" . PHP_EOL;
    }

    if (isset($_POST['email'])) {
        $message .= 'Email : ' . $_POST['email'] . "<br/>" . PHP_EOL;
    }

    if (isset($_POST['sujet'])) {
        $message .= 'Sujet : ' . $_POST['sujet'] . "<br/>" . PHP_EOL;
    }

    if (isset($_POST['message'])) {
        $message .= 'Message : ' . $_POST['message'] . "<br/>" . PHP_EOL;
    }

    return $message;
}

?>