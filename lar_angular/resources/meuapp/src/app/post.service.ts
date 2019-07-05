import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Post } from './post';
import {
  HttpRequest,
  HttpEvent,
  HttpEventType
} from '@angular/common/http';

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

  salvar(post: Post, file: File){
    const uploadData = new FormData();
    uploadData.append('nome', post.nome);
    uploadData.append('email', post.email);
    uploadData.append('titulo', post.titulo);
    uploadData.append('subtitulo', post.subtitulo);
    uploadData.append('mensagem', post.mensagem);
    uploadData.append('arquivo', file, file.name);

    this.http.post("/api/", uploadData,
      {reportProgress: true, observe: 'events'})
      .subscribe((event: any) => {
        if(event.type == HttpEventType.Response){
            //console.log(event);
            let p: any = event.body;
            this.posts.push(
              new Post(p.nome, p.titulo, p.subtitulo, p.email, p.email, p.arquivo, p.id, p.likes)
            );
        }

        if(event.type == HttpEventType.UploadProgress){
            console.log('UploadProgress');
            console.log(event);
        }
    });
  }

  like(id: number){
    this.http.get('/api/like/' + id)
      .subscribe(
          (event: any) => {
            console.log(event);
          }
      );
  }
}
