<?php
include 'config.php';
$stmt = $pdo->query('SELECT * FROM jugadores');
$jugadores = $stmt->fetchAll();
?>
<h2>Listado de jugadores</h2>
<!-- Botón para crear un nuevo jugador -->
<a href="create.php">Crear nuevo jugador</a>
<br><br>
<table border="1">
   <thead>
       <tr>
           <th>Nombre</th>
           <th>Salario</th>
           <th>Acciones</th>
       </tr>
   </thead>
   <tbody>
       <?php foreach ($jugadores as $jugador): ?>
           <tr>
               <td><?php echo $jugador['nombre']; ?></td>
               <td>$<?php echo $jugador['salario']; ?></td>
               <td>
                   <a href="edit.php?id=<?php echo $jugador['id']; ?>">Editar</a>
                   <a href="delete.php?id=<?php echo $jugador['id']; ?>">Eliminar</a>
               </td>
           </tr>
       <?php endforeach; ?>
   </tbody>
</table>


