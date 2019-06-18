import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Post } from './post';

@Injectable({
  providedIn: 'root'
})
export class PostService {
  title = 'meuapp';
  public posts: Post[] = [
    new Post("Joao", "Meu Post", "Sub Joao", "joao@gmail.com", "Minha msg"),
    new Post("Paulo", "Post do Paulo", "Sub Paulo", "paulo@gmail.com", "Msg do Paulo"),
    new Post("Maria", "Post da Maria", "Sub Maria", "maria@gmail.com", "Msg Maria"),
    new Post("Joao", "Meu Post", "Sub Joao", "joao@gmail.com", "Minha msg"),
    new Post("Paulo", "Post do Paulo", "Sub Paulo", "paulo@gmail.com", "Msg do Paulo"),
    new Post("Maria", "Post da Maria", "Sub Maria", "maria@gmail.com", "Msg Maria"),
    new Post("Joao", "Meu Post", "Sub Joao", "joao@gmail.com", "Minha msg"),
    new Post("Paulo", "Post do Paulo", "Sub Paulo", "paulo@gmail.com", "Msg do Paulo"),
    new Post("Maria", "Post da Maria", "Sub Maria", "maria@gmail.com", "Msg Maria"),
  ];

  constructor(private http: HttpClient) { }
}
