<?php require_once('../html/head2.php') ?>

<div class="row">

    <div class="col-lg-8 d-flex align-items-stretch">
        <div class="card w-100">
            <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Lista de Productos</h5>

                <div class="table-responsive">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modal_producto">
                        Nuevo Producto
                    </button>
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">#</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Imagen</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nombres</h6>
                                </th>

                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Precio Venta</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Cantidad</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Unidad Medida</h6>
                                </th>

                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Opciones</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tabla_paises">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ventana Modal-->

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="Modal_producto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="frm_paises">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Productos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="ProductoId" id="ProductoId">


                  
                    <div class="form-group">
                        <label for="nombre">Nombre del Producto</label>
                        <input type="text" required class="form-control" id="Nombre" name="Nombre" placeholder="Ingrese el nombre del pais">
                    </div>

                    <div class="form-group">
                        <label for="Precio_Compra">Precio de Compra</label>
                        <input type="text" required class="form-control" id="Precio_Compra" name="Precio_Compra" placeholder="Ingrese el nombre del pais">
                    </div>

                    <div class="form-group">
                        <label for="Precio_Venta">Precio de Venta</label>
                        <input type="text" required class="form-control" id="Precio_Venta" name="Precio_Venta" placeholder="Ingrese el nombre del pais">
                    </div>

                    <div class="form-group">
                        <label for="Iva">Iva</label>
                        <input type="text" required class="form-control" id="Iva" name="Iva" placeholder="Ingrese el nombre del pais">
                    </div>

                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="text" required class="form-control" id="cantidad" name="cantidad" placeholder="Ingrese el nombre del pais">
                    </div>

                    <div class="form-group">
                        <label for="Unidad_Medida">Unidad de Medida</label>
                        <input type="text" required class="form-control" id="Unidad_Medida" name="Unidad_Medida" placeholder="Ingrese el nombre del pais">
                    </div>

                    <div class="form-group">
                        <label for="Fecha">Fecha</label>
                        <input type="text" required class="form-control" id="Fecha" name="Fecha" placeholder="Ingrese el nombre del pais">
                    </div>

                    <div class="form-group">
                        <label for="Imagen">Imagen</label>
                        <input type="file" required class="form-control" id="Imagen" name="Imagen" placeholder="Ingrese el nombre del pais">
                    </div>
                   

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Grabar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once('../html/script2.php') ?>

<script src="productos.js"></script>