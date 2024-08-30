import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Router } from '@angular/router';
import { IUsuarios } from '../Interfaces/IUsuarios';
import { BehaviorSubject, Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class UsuariosService {
  private loggedIn = new BehaviorSubject<boolean>(false);
  apiurl = 'http://localhost/sexto/Proyectos/03MVC/controllers/usuarios.controller.php?op=';
  constructor(
    private lector: HttpClient,
    private navegacion: Router
  ) {}
  login(usuario: IUsuarios) {
    return this.lector.post<IUsuarios>(this.apiurl + 'login', usuario).subscribe((respuesta) => {
      if (respuesta) {
        //variables de entorno -- variables locales -- variables de sesion
        sessionStorage.setItem('nombreUsuario', respuesta.nombreUsuario);
        sessionStorage.setItem('rolesIdRoles', respuesta.rolesIdRoles.toString());
        localStorage.setItem('rolesIdRoles', respuesta.rolesIdRoles.toString());
        this.loggedIn.next(true);
        this.navegacion.navigate(['/dashboard/default']);
      }
    });
  }
  logout() {
    sessionStorage.clear();
    localStorage.clear();
    this.navegacion.navigate(['/login']);
  }
  isLoggedIn() {
    return this.loggedIn.asObservable();
  }
  checkLoginStatus() {
    const usuario = sessionStorage.getItem('nombreUsuario');
    if (usuario) {
      this.loggedIn.next(true);
    }
  }

  todos(): Observable<IUsuarios[]> {
    return this.lector.get<IUsuarios[]>(this.apiurl + 'todos');
  }
  uno(usuario: IUsuarios): Observable<IUsuarios> {
    let formData = new FormData();
    formData.append('idUsuarios', usuario.idUsuarios.toString());
    return this.lector.post<IUsuarios>(this.apiurl + 'uno', formData);
  }
}
