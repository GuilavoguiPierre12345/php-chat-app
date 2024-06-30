<?php
$dsn = "mysql:host=localhost;dbname=chat;chart_set='utf8'";
$user = 'root';
$pswd = '';
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ);
$conn = null;
function getConnextion(): PDO | null{
    global $conn, $dsn , $user, $pswd, $options;
    try {
        $conn = new PDO($dsn, $user, $pswd, $options);
    } catch (PDOException $e) {
        throw new PDOException("Erreur : " . $e->getMessage());
        // echo "Error de connexion a la base de donnees : {$e->getMessage()}";
    }
    return $conn;
}



