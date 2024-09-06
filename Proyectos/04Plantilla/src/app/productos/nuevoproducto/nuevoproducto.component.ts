import { Component } from '@angular/core';
import { FormGroup, ReactiveFormsModule } from '@angular/forms';

@Component({
  selector: 'app-nuevoproducto',
  standalone: true,
  imports: [ReactiveFormsModule],
  templateUrl: './nuevoproducto.component.html',
  styleUrl: './nuevoproducto.component.scss'
})
export class NuevoproductoComponent {
  titulo = '';
  frm_Producto: FormGroup;
  grabar() {}
}
