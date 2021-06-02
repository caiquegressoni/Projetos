import { Component, OnInit } from '@angular/core';
import { ProviderService } from '../../provider.service';
import { ProdutoDTO } from '../../models/produto.dto';

@Component({
  selector: 'app-cardapio',
  templateUrl: './cardapio.page.html',
  styleUrls: ['./cardapio.page.scss'],
})
export class CardapioPage implements OnInit {

  produto: ProdutoDTO[];
  constructor(public servidor: ProviderService) {}
  ngOnInit(): void {
    this.getRetornar();
  }

  getRetornar(){
    this.servidor.getPegar().subscribe(response => {
      this.produto = response;
      },
      error => {}
      );
      }
}
