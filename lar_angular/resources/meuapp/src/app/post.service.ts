import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Post } from './post';

@Injectable({
  providedIn: 'root'
})
export class PostService {
  title = 'meuapp';
  public posts: Post[] = [];

  constructor(private http: HttpClient) {
    this.http.get("/api/").subscribe(
        (posts: any[]) => {
          for(let p of posts){
            this.posts.push(
              new Post(p.nome, p.titulo, p.subtitulo, p.email, p.email, p.arquivo, p.id, p.likes)
            );
          }
        }
    );

  }
}
