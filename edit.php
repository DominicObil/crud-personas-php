
<?php
include 'config.php';
// Comprobando si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $nombre = $_POST['nombre'];
   $precio = $_POST['edad'];
   $id = $_POST['id'];
   $stmt = $pdo->prepare("UPDATE jugadores SET nombre = ?, edad = ? WHERE id = ?");
   $stmt->execute([$nombre, $edad, $id]);
   header('Location: index.php');
   exit;
}
$id = $_GET['id'];
$stmt = $pdo->query("SELECT * FROM jugadores WHERE id = $id");
$jabon = $stmt->fetch();
?>
<h2>Editar Jugador</h2>
<form action="edit.php" method="post">
   <input type="hidden" name="id" value="<?php echo $jugador['id']; ?>">
   Nombre: <input type="text" name="nombre" value="<?php echo $jugador['nombre']; ?>"><br>
   edad: $<input type="text" name="edad" value="<?php echo $jugador['edad']; ?>"><br>
   <input type="submit" value="Guardar Cambios">
</form>


