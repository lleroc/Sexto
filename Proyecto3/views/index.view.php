<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Hello World</h1>
            
        </div>
        <div class="col-md-12">
            <label for="" class="control-label">Suma</label>
            <div class="form-group">
                <label for="">Numero 1</label>
                <input type="number" name="numero1" id="numero1"  class="form-control">
            </div>
            <div class="form-group">
                <label for="">Numero 2</label>
                <input type="number" name="numero2" id="numero2"  class="form-control">
            </div>
            <div class="form-group">
                <label for="">Resultado</label>
                <input type="number" name="resSuma" id="resSuma"  class="form-control">
            </div>
            <button type="button" class="btn btn-outline-success" onclick="sumar()">Sumar</button>
        </div>
        <div class="col-md-12">
            <label for="" class="control-label">Resta</label>
            <div class="form-group">
                <label for="">Numero 1</label>
                <input type="number" name="numero1" id="numero1"  class="form-control">
            </div>
            <div class="form-group">
                <label for="">Numero 2</label>
                <input type="number" name="numero2" id="numero2"  class="form-control">
            </div>
            <div class="form-group">
                <label for="">Resultado</label>
                <input type="number" name="resResta" id="resResta"  class="form-control">
            </div>
            <button type="button" class="btn btn-outline-primary" onclick="resta()">Resta</button>
        </div>
        <div class="col-md-12">
            <label for="" class="control-label">multiplicacion</label>
            <div class="form-group">
                <label for="">Numero 1</label>
                <input type="number" name="numero1" id="numero1"  class="form-control">
            </div>
            <div class="form-group">
                <label for="">Numero 2</label>
                <input type="number" name="numero2" id="numero2"  class="form-control">
            </div>
            <div class="form-group">
                <label for="">Resultado</label>
                <input type="number" name="resMul" id="resMul"  class="form-control">
            </div>
            <button type="button" class="btn btn-outline-dark" onclick="multiplicacion()">multiplicacion</button>
        </div>
        <div class="col-md-12">
            <label for="" class="control-label">Division</label>
            <div class="form-group">
                <label for="">Numero 1</label>
                <input type="number" name="numero1" id="numero1"  class="form-control">
            </div>
            <div class="form-group">
                <label for="">Numero 2</label>
                <input type="number" name="numero2" id="numero2"  class="form-control">
            </div>
            <div class="form-group">
                <label for="">Resultado</label>
                <input type="number" name="resDivision" id="resDivision"  class="form-control">
            </div>
            <button type="button" class="btn btn-outline-danger" onclick="division()">Division</button>
        </div>
        
    </div>        
</div>
    
</body>
</html>