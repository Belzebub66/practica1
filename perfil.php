<?php
$alumnos = [
    '1' => [
        'password' => 'clave123',
        'nombre' => 'Ana Garcia',
        'semestre' => 3,
        'promedio' => 9.5,
        'calificaciones' => ['Matemáticas' => 10, 'Calculo Integral' => 9]
    ],
    '2' => [
        'password' => 'clave456',
        'nombre' => 'Luis Adrian',
        'semestre' => 5,
        'promedio' => 8.2,
        'calificaciones' => ['Matemáticas' => 8, 'Calculo Integral' => 8]
    ]
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $matricula_ingresada = $_POST['matricula'] ?? '';
    $password_ingresado = $_POST['password'] ?? '';

    if (isset($alumnos[$matricula_ingresada]) && $alumnos[$matricula_ingresada]['password'] === $password_ingresado) {
        
        $datos_alumno = $alumnos[$matricula_ingresada];
        
        echo "<h1>Bienvenido, " . htmlspecialchars($datos_alumno['nombre']) . "</h1>";
        echo "<p><strong>Matrícula:</strong> " . htmlspecialchars($matricula_ingresada) . "</p>";
        echo "<p><strong>Semestre:</strong> " . htmlspecialchars($datos_alumno['semestre']) . "</p>";
        echo "<p><strong>Promedio:</strong> " . htmlspecialchars($datos_alumno['promedio']) . "</p>";
        
        echo "<h3>Calificaciones:</h3><ul>";
        foreach ($datos_alumno['calificaciones'] as $materia => $calificacion) {
            echo "<li>" . htmlspecialchars($materia) . ": " . htmlspecialchars($calificacion) . "</li>";
        }
        echo "</ul>";

    } else {
        echo "<h2>Error de acceso</h2>";
        echo "<p>Credenciales incorrectas. <a href='index.html'>Volver a intentar</a></p>";
    }

} else {
    echo "<h2>Acceso Denegado</h2>";
    echo "<p>No puedes acceder directamente a esta página. <a href='index.html'>Inicia sesión aquí</a></p>";
}
?>