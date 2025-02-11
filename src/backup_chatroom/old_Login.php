<?php
require_once "includes/presets.php";
echo $header;
?>

<h1 id="titolo">Accedi alla Chat Room!</h1>

<section>
    <form name="signin" action="<?php echo $filename ?>" method="post">
        <label for="Password">Password:</label><br>
        <input type="password" id="Password" name="password" value="" placeholder="Inserisci la tua password">
        <br>

        <label for="Email">Email:</label><br>
        <input type="email" id="Email" name="email" value="" placeholder="Inserisci la tua email">
        <br>

        <br>
        <input type="submit" name="submit" value="Login">
    </form>
</section>

<?php
echo $footer;

if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST")
{
    require_once "includes/db_conn.php";
    $password = $_POST['password'];
    $email = $_POST['email'];

    $res = Login($password, $email);
    echo $res;
}