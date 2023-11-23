<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include("home.php") ?>

<H1>Esto viene desde el home</H1>

<?php encabezado();?>

<h1>esta es del index</h1>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Listado de Usuarios</h3>
                    <a href="nuevo.php" class="btn btn-success">Nuevo</a>
                    <a href="exportar.php" class="btn btn-success">Exportar</a>
                    <a href="importar.php" class="btn btn-success">Importar</a>
                    <a href="importar.php" class="btn btn-success">Importar</a>
                </div>
            </div>
        </div>
    
    </div>
</div>
<H1>Esto viene desde el home</H1>

<?php pie_de_pagina();?>
</body>
</html>