import {Component, OnInit, Renderer2} from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent implements OnInit{
  title = 'Tower of Hanoi';

  public playground: any;
  private lvl: number = 1;

  constructor(private renderer: Renderer2) {
  }

  ngOnInit() {

  }

  createNewGame() {
    let tiles = this.lvl + 2;

    for(let x= 0; x<=2; x++){
      for (let y = 0; y <= tiles-1; y++){
        this.playground[x][y]='';
      }
    }
  }

}
