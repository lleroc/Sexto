import { Component, OnInit } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { Iproveedor } from 'src/app/Interfaces/iproveedor';
import { ProveedorService } from 'src/app/Services/proveedores.service';

@Component({
  selector: 'app-nuevoproveedor',
  standalone: true,
  imports: [FormsModule],
  templateUrl: './nuevoproveedor.component.html',
  styleUrl: './nuevoproveedor.component.scss'
})
export class NuevoproveedorComponent implements OnInit {
  titulo = 'Insertar Proveedor';
  idProveedores = 0;
  Nombre_Empresa: any;
  Direccion;
  Telefono;
  Contacto_Empresa;
  Teleofno_Contacto;

  constructor(
    private provedorServicio: ProveedorService,
    private navegacion: Router,
    private ruta: ActivatedRoute
  ) {}
  ngOnInit(): void {
    this.idProveedores = parseInt(this.ruta.snapshot.paramMap.get('id'));
    /*this.ruta.paramMap.subscribe((parametros) => {
      this.idProveedores = parseInt(parametros.get('id'));
    });*/

    if (this.idProveedores > 0) {
      this.provedorServicio.uno(this.idProveedores).subscribe((proveedor) => {
        console.log(proveedor);
        this.Nombre_Empresa = proveedor.Nombre_Empresa;
        this.Direccion = proveedor.Direccion;
        this.Telefono = proveedor.Telefono;
        this.Contacto_Empresa = proveedor.Contacto_Empresa;
        this.Teleofno_Contacto = proveedor.Teleofno_Contacto;
        this.titulo = 'Actualizar Proveedor';
      });
    }
  }

  limpiarcaja() {
    alert('Limpiar Caja');
  }
  grabar() {
    let iproveedor: Iproveedor = {
      idProveedores: 0,
      Nombre_Empresa: this.Nombre_Empresa,
      Direccion: this.Direccion,
      Telefono: this.Telefono,
      Contacto_Empresa: this.Contacto_Empresa,
      Teleofno_Contacto: this.Teleofno_Contacto
    };
    console.log(this.idProveedores);
    if (this.idProveedores == 0 || isNaN(this.idProveedores)) {
      this.provedorServicio.insertar(iproveedor).subscribe((respuesta) => {
        // parseInt(respuesta) > 1 ? alert('Grabado con exito') : alert('Error al grabar');
        if (parseInt(respuesta) > 1) {
          alert('Grabado con exito');
          this.navegacion.navigate(['/proveedores']);
        } else {
          alert('Error al grabar');
        }
      });
    } else {
      iproveedor.idProveedores = this.idProveedores;
      this.provedorServicio.actualizar(iproveedor).subscribe((respuesta) => {
        if (parseInt(respuesta) > 0) {
          this.idProveedores = 0;
          alert('Actualizado con exito');
          this.navegacion.navigate(['/proveedores']);
        } else {
          alert('Error al actualizar');
        }
      });
    }
  }
}
