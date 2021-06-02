import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { map } from 'rxjs/operators';
import { ProdutoDTO } from './models/produto.dto';
 @Injectable({
  providedIn: 'root'
})
export class ProviderService {

  url: string = "http://ix-sistemas.000webhostapp.com/src/controll/routes";

  constructor(public http: HttpClient) {
   
   }
   getPegar(){
     return this.http.get<ProdutoDTO[]>(this.url+'/route.produto.php?id_produto=0');//pipe(map(res => res.json()))
   }
  }