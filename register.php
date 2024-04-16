<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Pazaudētās mantas</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body id = "RegisterBackground">
    <div id="Register1Box">
        <?php
        if (isset($_POST["submit"])) {
            $vārds = $_POST["vārds"];
            $uzvārds = $_POST["uzvārds"];
            $epasts = $_POST["epasts"];
            $password = $_POST["parole"];
            $passwordRepeat = $_POST["parole2"];
            $errors = array();
            if (empty($vārds) OR empty($uzvārds) OR empty($epasts) OR empty($password) OR empty($passwordRepeat)) {
             array_push($errors,"Visi lauciņi ir jaizspilda");
            }
            if (!filter_var($email, FILTER_VALIDATE)) {
             array_push($errors, "Epasts nav derīgs");
            }
            if (stren($password)<6) {
             array_push($errors, "Parolei jāsastāv vismaz no 6 simboliem");
            }
            if ($password!==$passwordRepeat) {
             array_push($errors,"Paroles nav vienādas");
            }
            if (count($errors)>0) {
             foreach ($errors as $error) {
                echo "<div class='alert alert-danger'>$errpr</div>";
             }
            }else{
             require_once "database.php";
             $sql = "INSERT INTO users (vārds, uzvārds, epasts, password) VALUES ( ?, ?, ? ,? )";
             $stmt = mysqli_stmt_init($conn);
             $prepareStmt = mysqli_stmt_prepare ($stmt,$sql);
             if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"ssss",$vārds,$uzvārds,$epasts,$password);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>Esi piereģistrējies veiksmīgi.</div>";
             }else{
                die("Something went wrong");
             }
            }
        }
        ?>
        <div id="Register1Buttons">
            <from action="register.php">
                <div>
                    <label for="Vards">Vārds:</label>
                    <input type="text" id="Vards" name="vards">
                </div>
                <div>
                    <label for="Uzvards">Uzvārds:</label>
                    <input type="text" id="Uzvards" name="uzvards">
                </div>
                <div>
                    <label for="Epasts">Epasts:</label>
                    <input type="text" id="Epasts" name="epasts">
                </div>
                <div>
                    <label for="Parole">Parole:</label>
                    <input type="text" id="Parole" name="Parole">
                </div>
                <div>
                    <label for="Parole">Atkārtot paroli:</label>
                    <input type="text" id="Parole" name="Parole2">
                </div>
                <div>
                    <input type="submit" value="reģistrēties" name="submit">
                </div>
            </from>
        </div>
    </div>
</body>