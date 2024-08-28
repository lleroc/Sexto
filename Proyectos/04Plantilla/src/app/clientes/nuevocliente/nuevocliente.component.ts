import { Component, OnInit } from '@angular/core';
import { AbstractControl, FormControl, FormGroup, ReactiveFormsModule, ValidationErrors, Validators } from '@angular/forms';
import { ClientesService } from 'src/app/Services/clientes.service';
import { ICliente } from 'src/app/Interfaces/icliente';
import { CommonModule } from '@angular/common';
import Swal from 'sweetalert2';
import { ActivatedRoute, Router } from '@angular/router';
@Component({
  selector: 'app-nuevocliente',
  standalone: true,
  imports: [ReactiveFormsModule, CommonModule],
  templateUrl: './nuevocliente.component.html',
  styleUrl: './nuevocliente.component.scss'
})
export class NuevoclienteComponent implements OnInit {
  frm_Cliente = new FormGroup({
    //idClientes: new FormControl(),
    Nombres: new FormControl('', Validators.required),
    Direccion: new FormControl('', Validators.required),
    Telefono: new FormControl('', Validators.required),
    Cedula: new FormControl('', [Validators.required, this.validadorCedulaEcuador]),
    Correo: new FormControl('', [Validators.required, Validators.email])
  });
  idClientes = 0;
  titulo = 'Nuevo Cliente';
  constructor(
    private clienteServicio: ClientesService,
    private navegacion: Router,
    private ruta: ActivatedRoute
  ) {}

  ngOnInit(): void {
    this.idClientes = parseInt(this.ruta.snapshot.paramMap.get('idCliente'));
    if (this.idClientes > 0) {
      this.clienteServicio.uno(this.idClientes).subscribe((uncliente) => {
        this.frm_Cliente.controls['Nombres'].setValue(uncliente.Nombres);
        this.frm_Cliente.controls['Direccion'].setValue(uncliente.Direccion);
        this.frm_Cliente.controls['Telefono'].setValue(uncliente.Telefono);
        this.frm_Cliente.controls['Cedula'].setValue(uncliente.Cedula);
        this.frm_Cliente.controls['Correo'].setValue(uncliente.Correo);
        /*this.frm_Cliente.setValue({
          Nombres: uncliente.Nombres,
          Direccion: uncliente.Direccion,
          Telefono: uncliente.Telefono,
          Cedula: uncliente.Cedula,
          Correo: uncliente.Correo
        });*/
        /*this.frm_Cliente.patchValue({
          Cedula: uncliente.Cedula,
          Correo: uncliente.Correo,
          Nombres: uncliente.Nombres,
          Direccion: uncliente.Direccion,
          Telefono: uncliente.Telefono
        });*/

        this.titulo = 'Editar Cliente';
      });
    }
  }

  grabar() {
    let cliente: ICliente = {
      idClientes: this.idClientes,
      Nombres: this.frm_Cliente.controls['Nombres'].value,
      Direccion: this.frm_Cliente.controls['Direccion'].value,
      Telefono: this.frm_Cliente.controls['Telefono'].value,
      Cedula: this.frm_Cliente.controls['Cedula'].value,
      Correo: this.frm_Cliente.controls['Correo'].value
    };

    Swal.fire({
      title: 'Clientes',
      text: 'Desea gurdar al Cliente ' + this.frm_Cliente.controls['Nombres'].value,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#f00',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Grabar!'
    }).then((result) => {
      if (result.isConfirmed) {
        if (this.idClientes > 0) {
          this.clienteServicio.actualizar(cliente).subscribe((res: any) => {
            Swal.fire({
              title: 'Clientes',
              text: res.mensaje,
              icon: 'success'
            });
            this.navegacion.navigate(['/clientes']);
          });
        } else {
          this.clienteServicio.insertar(cliente).subscribe((res: any) => {
            Swal.fire({
              title: 'Clientes',
              text: res.mensaje,
              icon: 'success'
            });
            this.navegacion.navigate(['/clientes']);
          });
        }
      }
    });
  }

  validadorCedulaEcuador(control: AbstractControl): ValidationErrors | null {
    const cedula = control.value;
    if (!cedula) return null;
    if (cedula.length !== 10) return { cedulaInvalida: true };
    const provincia = parseInt(cedula.substring(0, 2), 10);
    if (provincia < 1 || provincia > 24) return { provincia: true };
    const tercerDigito = parseInt(cedula.substring(2, 3), 10);
    if (tercerDigito < 0 || tercerDigito > 5) return { cedulaInvalida: true };
    const digitoVerificador = parseInt(cedula.substring(9, 10), 10);
    const coeficientes = [2, 1, 2, 1, 2, 1, 2, 1, 2];
    let suma = 0;
    for (let i = 0; i < coeficientes.length; i++) {
      const valor = parseInt(cedula.substring(i, i + 1), 10) * coeficientes[i];
      suma += valor > 9 ? valor - 9 : valor;
    }
    const resultado = suma % 10 === 0 ? 0 : 10 - (suma % 10);
    if (resultado !== digitoVerificador) return { cedulaInvalida: true };
    return null;
  }
}
