<?php
# inizializzazione della sessione
session_start();
# inclusione del file di funzione
include __DIR__ . 'user.php';
# istanza della classe
$obj = new User();
# identificativo univoco dell'utente
$id= $_SESSION['id'];
# chiamata al metodo per la verifica della sessione
if (!$obj->verifySession())
{
  #redirect in caso di sessione non verificata
  @header("location:index.php");
}
# controllo sul valore di input per il logout
if (isset($_GET['val']) && ($_GET['val'] == 'fine_sessione')) 
{
  # chiamata al metodo per il logout
  $obj->esc();
  # redirezione alla pagina di login
  @header("location:index.php");
}

  include __DIR__ . '/layout/header.php';

?>


<main>
    <body>
    <div id="container">
    <div id="header"><a href="<?php echo $_SERVER['PHP_SELF']; ?>?val=fine_sessione" title="Logout">Esci</a></div>
    <div id="main-body">
    <h1>Benvenuto nell'area riservata <?php $obj->mostra_utente($id); ?></h1>
    </div>
    <div id="footer">© MrWebmaster.it</div>
    </div>
</main>
<?php
    include __DIR__ . '/layout/footer.php';
?>