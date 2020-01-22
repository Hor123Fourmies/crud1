<link rel="stylesheet" href="index.css">
<?php

##Exercice 1

// Afficher tous les clients.

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "colyseum";

$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);


$clients = "SELECT * FROM clients WHERE 1";
$result = $conn->query($clients);
echo $conn->error;



?>
<p><?php echo "<span>Clients : </span>"."<br><br>";
while ($row = $result->fetch_assoc()) {
    echo "Nom : " . $row['lastName'] . "<br>";
    echo "Prénom : " . $row['firstName'] . "<br>";
    echo "<br>";
}?>
</p>

<?php
##Exercice 2

// Afficher tous les types de spectacles possibles.


$typeSpectacle = "SELECT * FROM `showtypes` WHERE 1";
$result = $conn->query($typeSpectacle);
echo $conn->error;

?>

<p>
    <?php echo '<span>Type de spectacles : </span>'."<br><br>";
    while ($row = $result->fetch_assoc()) {
        echo $row['type'] . "<br>";
        echo "<br>";
    }?>
</p>

<?php
##Exercice 3

// Afficher les 20 premiers clients.


$clients20 = "SELECT * FROM `clients` WHERE id<='20'";
$result = $conn->query($clients20);
echo $conn->error;

?>

<p>
    <?php echo '<span>Les 20 premiers clients : </span>'."<br><br>";
    while ($row = $result->fetch_assoc()) {
        echo $row['id'].". ".$row['lastName']." ".$row['firstName'];
        echo "<br>";
    }?>
</p>

<?php
##Exercice 4

// N'afficher que les clients possédant une carte de fidélité.



$carteIdentite = "SELECT * FROM cards LEFT JOIN clients ON (clients.cardNumber = cards.cardNumber)";
$result = $conn->query($carteIdentite);
echo $conn->error;

?>
<p>
    <?php echo "<span>Clients avec cartes d'identité : </span>"."<br><br>";
    while ($row = $result->fetch_assoc()) {
        echo "ID clients : " . $row['id'] . "<br>";
        echo "Nom : " . $row['lastName'] . "<br>";
        echo "Numéro de carte : " . $row['cardNumber'] . "<br>";
        echo "<br>";
    }?>
</p>


<?php
##Exercice 5

//Afficher uniquement le nom et le prénom de tous les clients dont le nom commence par la lettre "M".
//Les afficher comme ceci :

//Nom : *Nom du client*
//Prénom : *Prénom du client*

//Trier les noms par ordre alphabétique.



$lettreM = "SELECT * FROM clients WHERE lastName like 'm%' ORDER BY lastName ASC ";
$result = $conn->query($lettreM);
echo $conn->error;
?>

<p>
    <?php echo "<span>Prénom commençant pas 'M' : </span>"."<br><br>";
    while ($row = $result->fetch_assoc()) {
        echo "Nom : " . $row['lastName'] . "<br>";
        echo "Prénom : " . $row['firstName'] . "<br>";
        echo "<br>";
    }?>
</p>


<?php
##Exercice 6

// Afficher le titre de tous les spectacles ainsi que l'artiste, la date et l'heure.
// Trier les titres par ordre alphabétique.
// Afficher les résultat comme ceci : *Spectacle* par *artiste*, le *date* à *heure*.

$spectacles = "SELECT * FROM shows WHERE 1 ";
$result = $conn->query($spectacles);
echo $conn->error;

?>

<p>
    <?php echo "<span>Spectacles : </span>"."<br><br>";
    while ($row = $result->fetch_assoc()) {
        echo $row['title']." par ".$row['performer'].", le ".$row['date']." à ".$row['startTime']."<br><br>";
    }?>
</p>


<?php

##Exercice 7

//Afficher tous les clients comme ceci :
//Nom : *Nom de famille du client*
//Prénom : *Prénom du client*
//Date de naissance : *Date de naissance du client*
//Carte de fidélité : *Oui (Si le client en possède une) ou Non (s'il n'en possède pas)*
//Numéro de carte : *Numéro de la carte fidélité du client s'il en possède une.*


$clientsFidelite = "SELECT * FROM clients  LEFT JOIN cards ON (cards.cardNumber = clients.cardNumber) WHERE cardTypesId = '1'";
$result = $conn->query($clientsFidelite);
echo $conn->error;

?>

<p>
    <?php echo "<span>Programme Fidélité : </span>"."<br><br>";
    while ($row = $result->fetch_assoc()) {
        echo $row['lastName']."<br>";
        echo $row['firstName']."<br>";
        echo $row['birthDate']."<br>";
        if ($row['card']==='1'){
            echo "oui"."<br>";
        }
        else echo "non"."<br>";
        echo $row['cardNumber']."<br><br>";
    }?>
</p>
