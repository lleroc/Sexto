<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metodo de envio de daots POST</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="operaciones.js"></script>
    <style>
    ul li{
        list-style: none;
        float: left;
        margin: 10px;
    }
</style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Hola POST</h1>
            </div>
            <div class="col-md-12">
                <label for="" class="control-label">Suma</label>
                <div class="form-group">
                    <label for="">Numero 1</label>
                    <input type="number" name="numero1" id="numero1" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Numero 2</label>
                    <input type="number" name="numero2" id="numero2" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Resultado</label>
                    <input type="number" name="res" id="res" class="form-control">
                </div>
            </div>
            <div class="sidebar">
                <ul>
                    <li>
                        <button type="button" class="btn btn-outline-success" onclick="post(1)">Sumar</button>
                    </li>
                    <li>
                        <button type="button" class="btn btn-outline-primary" onclick="post(2)">Resta</button>
                    </li>
                    <li>
                        <button type="button" class="btn btn-outline-dark" onclick="post(3)">multiplicacion</button>
                    </li>
                    <li>
                        <button type="button" class="btn btn-outline-danger" onclick="post(4)">Division</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>