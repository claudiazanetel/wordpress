import { Injectable } from '@angular/core';
import { Http, Response } from '@angular/http';
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/map';
import { Post } from './post';
//import { Environment } from '../environment';

@Injectable()
export class PostsService {

  constructor(private http: Http) { }

  getPosts(): Observable<Post[]> {
    return this.http
      .get('http://wordpress.dev/wp-json/wp/v2/posts')
      .map((res: Response) => res.json());
  }

}
