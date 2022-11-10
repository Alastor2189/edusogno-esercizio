<?php
include_once __DIR__ . 'user.php';
$obj = new User();
# chiamata al metodo per la verifica della sessione
if ($obj->verifySession())
{
  #redirect in caso di esito negativo
  @header("location:area_riservata.php");
}
# chiamata al metodo per la registrazione
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  $registered = $obj->register(htmlentities($_POST['nome'], ENT_QUOTES), htmlentities($_POST['nome'], ENT_QUOTES), htmlentities($_POST['password'], ENT_QUOTES), htmlentities($_POST['email'], ENT_QUOTES));
  # controllo sull'esito del metodo
  if ($registrato) {
    # notifica in caso di esito positivo
    echo 'Registrazione effettuata con successo <a href="autenticazione.php">ora puoi loggarti</a>.';
  }else{
    # notifica in caso di esito negativo
    echo 'Registrazione non effettuata correttamente.';
  }
}
# form per l'iscrizione
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
    <div> <h2> </h2></div>
    <div class="container-form">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="input">
                    <label for="nome">Inserisci il nome</label>
                    <input type="text" placeholder="xxxxxx" id="nome" name="nome">
                </div>
                <div class="input">
                    <label for="cognome">Inserisci il cognome</label>
                    <input type="cognome" name="cognome" id="cognome" placeholder="xxxxxx">
                </div>
                <div class="input">
                    <label for="email">Inserisci l'e-mail</label>
                    <input type="mail" placeholder="example@gmail.com" id="email" name="email">
                </div>
                <div class="input">
                    <label for="password">Inserisci la password</label>
                    <input type="password" name="password" id="password" placeholder="">
                </div>
                <div class="actions">
                    <button type="submit" name="registrati">REGISTRATI</button>
                </div>

                <label><a href="login.php" title="Login">Sei già registrato? Fai qui il Login</a></label>
            </form>
    </main>
</body>
</html>