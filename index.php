<?php
// Configuración de la base de datos
$host = "database-1.c4wcv0adq6hl.us-east-1.rds.amazonaws.com";
$user = "admin"; // Usuario de la base de datos
$password = "12345678"; // Contraseña de la base de datos
$database = "biblioteca"; // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($host, $user, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
  die("Error en la conexión: " . $conn->connect_error);
}

// Consulta SQL para obtener los datos de la tabla Libros
$sql = "SELECT id, titulo, autor, anio FROM Libros";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Libros</title>
</head>

<body>
  <h1>Lista de Libros</h1>
  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>ID</th>
      <th>Título</th>
      <th>Autor</th>
      <th>Año</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
      // Mostrar los datos de cada fila
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["titulo"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["autor"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["anio"]) . "</td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='4'>No hay libros en la base de datos.</td></tr>";
    }
    ?>
  </table>
</body>

</html>

<?php
// Cerrar la conexión
$conn->close();
?>