<?php
// Declarando variables para la conexión
$servidor = "localhost"; // El servidor que utilizaremos, en este caso será el localhost.
$usuario = "root"; // El usuario del servidor.
$contrasenha = "Todo.Rock-777-"; // La contraseña de usuario del servidor.
$dbname = "abrilstore"; // El nombre de la base de datos.

// Creando la conexión.
$conexion = mysqli_connect($servidor, $usuario, $contrasenha, $dbname);

// Verificando la conexión.
if (!$conexion->connect_error) {
    //echo "Fallo la conexión <br>";
    die("Connection failed: " . mysqli_connect_error());
} else {
    //echo "Conexión exitosa!";
    // Captura los datos del formulario
    $rol = $_POST['rol'];
    $contrasena = $_POST['contrasena'];

    if (isset($_POST['rol']) && isset($_POST['contrasena'])) {

        // Consulta la tabla de usuarios
        $stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE rol = ?");
        $stmt->bind_param("s", $rol);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Usuario encontrado, verifica la contraseña
            $row = $result->fetch_assoc();
            if (password_verify($contrasena, $row['contrasena'])) {
                // Contraseña correcta, redirige al usuario a index.html
                header('Location: index.html');
                exit;
            } else {
                // Contraseña incorrecta, muestra mensaje de error
                echo '<p style="color: red;">Usuario o contraseña incorrectos</p>';
            }
        } else {
            // Usuario no encontrado, muestra mensaje de error
            echo '<p style="color: red;">Usuario o contraseña incorrectos</p>';
        }
    }
}

// Cierra la conexión
$conexion->close();
?>


//DUDA este codigo esta bien?