import {Component, Input, OnInit, Renderer2} from '@angular/core';
import Phaser from 'phaser';

class MainScene extends Phaser.Scene {
  constructor() {
    super({ key: 'main' });
  }
  create() {
    console.log('create method');
  }
  preload() {
    console.log('preload method');
  }
  update() {
    console.log('update method');
  }
}

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent implements OnInit{
  title = 'Tower of Hanoi';
  phaserGame: Phaser.Game | undefined;
  config: Phaser.Types.Core.GameConfig | undefined;

  @Input() public start = false;
  public playground: any;
  private lvl: number = 1;

  constructor(private renderer: Renderer2) {
    this.config = {
      type: Phaser.AUTO,
      height: 600,
      width: 800,
      scene: [ MainScene ],
      parent: 'game',
      physics: {
        default: 'arcade',
        arcade: {
          gravity: { y: 100 }
        }
      }
    };
  }

  ngOnInit() {

  }

  startGame() {
    this.start = true;
    this.phaserGame = new Phaser.Game(this.config);
  }
}
