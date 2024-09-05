import { Component, OnInit } from '@angular/core';
import { SharedModule } from 'src/app/theme/shared/shared.module';
import { IFactura } from '../Interfaces/factura';
import { Router, RouterLink } from '@angular/router';
import { FacturaService } from '../Services/factura.service';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-facturas',
  standalone: true,
  imports: [SharedModule, RouterLink],
  templateUrl: './facturas.component.html',
  styleUrl: './facturas.component.scss'
})
export class FacturasComponent implements OnInit {
  listafacturas: IFactura[] = [];
  router: any;
  facturaAEditar: IFactura;
  constructor(private facturaServicio: FacturaService) {}
  ngOnInit(): void {
    this.facturaServicio.todos().subscribe((data: IFactura[]) => {
      this.listafacturas = data;
    });
  }

  
  eliminar(idFactura) {

    Swal.fire({
      title: 'Factura',
      text: 'Esta seguro que desea eliminar la factura!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Emliminar Factura'
    }).then((result) => {
      if (result.isConfirmed) {
        this.facturaServicio.eliminar(idFactura).subscribe((data) => {
          Swal.fire('Factura', 'La factura ha sido eliminada.', 'success');
        this.ngOnInit();
        });
      }
    });
  }
  editarFactura(idFactura: number) {
    // 1. Get the invoice details for pre-filling the edit form
    this.facturaServicio.uno(idFactura).subscribe(factura => {
      // Handle successful retrieval
      if (factura) {
        // 2. (Optional) Open a modal or navigate to a dedicated edit page
        // - If using a modal:
        this.facturaAEditar = factura; // Store invoice data for pre-filling
        this.showModalEdit(); // Function to display the edit modal
  
        // - If navigating to a dedicated edit page:
        // this.router.navigate(['/facturas/editar', idFactura]);
        // Replace '/facturas/editar' with your actual edit route
      } else {
        // Handle error if invoice not found
        Swal.fire('Error', 'La factura no se encontró.', 'error');
      }
    });
  }
  showModalEdit() {
    throw new Error('Method not implemented.');
  }
}
