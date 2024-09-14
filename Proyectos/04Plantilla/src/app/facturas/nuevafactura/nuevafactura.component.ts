import { CommonModule } from '@angular/common';
import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, FormsModule, ReactiveFormsModule, Validators } from '@angular/forms';
import { Router, Event } from '@angular/router';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { IFactura } from 'src/app/Interfaces/factura';
import { ICliente } from 'src/app/Interfaces/icliente';
import { ClientesService } from 'src/app/Services/clientes.service';
import { FacturaService } from 'src/app/Services/factura.service';
import jsPDF from 'jspdf';
//import 'jspdf-autotable';
//import html2canvas from 'html2canvas';
import pdfMake from 'pdfmake/build/pdfmake';
import pdfFonts from 'pdfmake/build/vfs_fonts';
pdfMake.vfs = pdfFonts.pdfMake.vfs;

@Component({
  selector: 'app-nuevafactura',
  standalone: true,
  imports: [FormsModule, ReactiveFormsModule, CommonModule],
  templateUrl: './nuevafactura.component.html',
  styleUrl: './nuevafactura.component.scss'
})
export class NuevafacturaComponent implements OnInit {
  //variables o constantes
  titulo = 'Nueva Factura';
  listaClientes: ICliente[] = [];
  listaClientesFiltrada: ICliente[] = [];
  totalapagar: number = 0;
  //formgroup
  frm_factura: FormGroup;
  productoelejido: any[] = [
    {
      Descripcion: 'Producto 1',
      Cantidad: 2,
      Precio: 1000,
      Subtotal: 2000,
      IVA: 12,
      Total: 2000
    },
    {
      Descripcion: 'Producto 2',
      Cantidad: 2,
      Precio: 1000,
      Subtotal: 2000,
      IVA: 12,
      Total: 2000
    },
    {
      Descripcion: 'Producto 3',
      Cantidad: 2,
      Precio: 1000,
      Subtotal: 2000,
      IVA: 12,
      Total: 2000
    }
  ];

  ///////
  constructor(
    private clietesServicios: ClientesService,
    private facturaService: FacturaService,
    private navegacion: Router,
    private modal: NgbModal
  ) {}

  ngOnInit(): void {
    this.frm_factura = new FormGroup({
      Fecha: new FormControl('', Validators.required),
      Sub_total: new FormControl('', Validators.required),
      Sub_total_iva: new FormControl('', Validators.required),
      Valor_IVA: new FormControl('0.15', Validators.required),
      Clientes_idClientes: new FormControl('', Validators.required)
    });

    this.clietesServicios.todos().subscribe({
      next: (data) => {
        this.listaClientes = data;
        this.listaClientesFiltrada = data;
      },
      error: (e) => {
        console.log(e);
      }
    });
  }

  grabar() {

    //PDF CON PDFMAKER
    const DATA: any = {
      content: [
        {
          text: 'Factura',
          style: 'header',
        },
        {
          columns: [
            {
              text: 'Fecha: ' + this.frm_factura.get('Fecha')?.value,
              style: 'subheader',
            },
            {
              text: 'Cliente: ' + this.frm_factura.get('Clientes_idClientes')?.value,
              style: 'subheader',
              alignment: 'right'
            },
          ],
        },
        {
          columns: [
            {
              text: 'Subtotal: ' + this.frm_factura.get('Sub_total')?.value,
              style: 'subheader',
            },
            {
              text: 'Subtotal IVA: ' + this.frm_factura.get('Sub_total_iva')?.value,
              style: 'subheader',
              alignment: 'right'
            },
          ],
        },
        {
          columns: [
            {
              text: 'Valor IVA: ' + this.frm_factura.get('Valor_IVA')?.value,
              style: 'subheader',
            },
            {
              text: 'Total: ' + this.totalapagar,
              style: 'subheader',
              alignment: 'right'
            },
          ],
        },
        {
          text: 'Productos',
          style: 'header',
        },
        {
          table: {
            headerRows: 1,
            widths: ['*', 'auto', 'auto', 'auto', 'auto', 'auto'],
            body: [
              [
                { text: 'Descripción', style: 'tableHeader' },
                { text: 'Cantidad', style: 'tableHeader' },
                { text: 'Precio', style: 'tableHeader' },
                { text: 'Subtotal', style: 'tableHeader' },
                { text: 'IVA', style: 'tableHeader' },
                { text: 'Total', style: 'tableHeader' },
              ],
              ...this.productoelejido.map((producto) => [
                producto.Descripcion,
                producto.Cantidad,
                producto.Precio,
                producto.Subtotal,
                producto.IVA,
                producto.Total,
              ]),
            ],
          },
          layout: 'lightHorizontalLines', // Agrega líneas horizontales para mejorar la legibilidad
        },
      ],
      styles: {
        header: {
          fontSize: 18,
          bold: true,
          margin: [0, 0, 0, 10],
          alignment: 'center', // Centra el texto del encabezado
        },
        subheader: {
          fontSize: 16,
          bold: true,
          margin: [0, 10, 0, 5],
        },
        tableHeader: {
          bold: true,
          fontSize: 13,
          color: 'black',
          alignment: 'center',
        },
      },
    };
    
    // Crear el PDF y guardarlo
    pdfMake.createPdf(DATA).download('factura.pdf');
    
    

    //pdf copn html2canva

    /*const DATA: any = document.getElementById('impresion');
    html2canvas(DATA).then((html) => {
      const anchoorignal = html.width;
      const altooriginal = html.height;

      const imgAncho = (anchoorignal * 1 * 200) / anchoorignal;
      const imgAlto = (altooriginal * 1 * 200) / altooriginal;

      const constenido = html.toDataURL('image/png');
      const pdf = new jsPDF('p', 'mm', 'a4');
      const posicion = 0;
      pdf.addImage(constenido, 'PNG', 0, posicion, imgAncho, imgAlto);
      pdf.save('factura.pdf');
    });
    /* pdf con jspdf
    const doc = new jsPDF();
    doc.text('Lista de prodcutos', 10, 10);

    const columnas = ['Descripcion', 'Cantidad', 'Precio', 'Subtotal', 'IVA', 'Total'];
    const filas: any[] = [];
    this.productoelejido.forEach((producto) => {
      const fila = [producto.Descripcion, producto.Cantidad, producto.Precio, producto.Subtotal, producto.IVA, producto.Total];
      filas.push(fila);
    });

    (doc as any).autoTable({
      head: [columnas],
      body: filas,
      start: 20
    });

    doc.save('factura.pdf');

    /*
    let factura: IFactura = {
      Fecha: this.frm_factura.get('Fecha')?.value,
      Sub_total: this.frm_factura.get('Sub_total')?.value,
      Sub_total_iva: this.frm_factura.get('Sub_total_iva')?.value,
      Valor_IVA: this.frm_factura.get('Valor_IVA')?.value,
      Clientes_idClientes: this.frm_factura.get('Clientes_idClientes')?.value
    };

    this.facturaService.insertar(factura).subscribe((respuesta) => {
      if (parseInt(respuesta) > 0) {
        alert('Factura grabada');
        this.navegacion.navigate(['/facturas']);
      }
    });*/
  }
  calculos() {
    let sub_total = this.frm_factura.get('Sub_total')?.value;
    let iva = this.frm_factura.get('Valor_IVA')?.value;
    let sub_total_iva = sub_total * iva;
    this.frm_factura.get('Sub_total_iva')?.setValue(sub_total_iva);
    this.totalapagar = parseInt(sub_total) + sub_total_iva;
  }

  cambio(objetoSleect: any) {
    let idCliente = objetoSleect.target.value;
    this.frm_factura.get('Clientes_idClientes')?.setValue(idCliente);
  }
  productosLista(evnto) {
    alert('lista de prductos cargandp');
    //servicio de prodcuto para cargar los productos
  }
  cargaModal(valoresModal: any) {
    //productoelejido

    const nuevoProducto: any = {
      Descripcion: 'prodcuto 4',
      Cantidad: 15,
      Precio: 12.23,
      Subtotal: 15.2,
      IVA: 15,
      Total: 185.9
    };
    this.productoelejido.push(nuevoProducto);
    this.modal.dismissAll();

    this.productoelejido.reduce((valor, producto) => {
      this.totalapagar += producto.Total;
    }, 0);
  }
}