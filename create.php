<?php
$host = 'localhost';
$db   = 'jugadores';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
   PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
   PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
   PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
<?php
include 'config.php';
$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $nombre = $_POST['nombre'];
   $descripcion = $_POST['posicion'];
   $precio = $_POST['salario'];
   $stock = $_POST['edad'];
   try {
       $sql = "INSERT INTO jugadores (nombre, posicion, salario, edad) VALUES (:nombre, :posicion, :salario, :edad)";
       $stmt = $pdo->prepare($sql);
       $stmt->execute(['nombre' => $nombre, 'posicion' => $posicion, 'salario' => $salario, 'edad' => $edad]);
       $message = 'Jugador añadido con éxito!';
   } catch (PDOException $e) {
       $message = 'Error al añadir el jugador: ' . $e->getMessage();
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Añadir jugador</title>
</head>
<body>
<h2>Añadir nuevo Jugador</h2>
<?php if (!empty($message)): ?>
   <p><?= $message ?></p>
<?php endif; ?>
<form action="create.php" method="post">
   <label for="nombre">Nombre:</label>
   <input type="text" name="nombre" id="nombre" required>
   <br>
   <label for="posicion">Posicion:</label>
   <textarea name="posicion" id="posicion"></textarea>
   <br>
   <label for="edad">Edad:</label>
   <input type="text" name="edad" id="edad" required>
   <br>
   <label for="salario">salario:</label>
   <input type="number" name="salario" id="salario" required>
   <br>
   <input type="submit" value="Añadir Jugador">
</form>
</body>
</html>



