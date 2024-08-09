import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { ProveedorService } from './Services/proveedor.service';
import { Iproveedor } from './Interfaces/iproveedor';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [RouterOutlet],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css',
})
export class AppComponent {
  title = 'Lista de Proveedores';

  listaProveedores: Iproveedor[] = [];
  constructor(private ServicioProveedor: ProveedorService) {}
  ngOnInit() {
    this.ServicioProveedor.todos().subscribe(
      (data) => {
        this.listaProveedores = data;
      }
      /* {
        next: (data: Iproveedor[]) => (this.listaProveedores = data),
        error: (e) => console.log(e),
      }*/
    );
  }
}
