@extends('home')

@section('title','Dashboard/Article')


@section('content')

    <div class="card col-12" style="background-color: white!important;">

        <div class="col-md-4 col-lg-2">
            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal" style="background-color: dodgerblue;" >
                Nouvel Article
            </button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enregistrement Nouvel Article</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('article.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="col-md-6">Image Article</label>

                                <div class="col-md-12">
                                    <input id="name" type="file" class="form-control custom-file-input @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}"  required>

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="libelle" class="col-md-6 ">Libelle Article</label>

                                <div class="col-md-12">
                                    <input id="libelle" type="text" class="form-control @error('libelle') is-invalid @enderror" name="libelle" value="{{ old('libelle') }}" required>

                                    @error('libelle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-6  ">Description Article</label>

                                <div class="col-md-12">
                                    <input id="prix" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="prix" class="col-md-6 ">Prix Article</label>

                                <div class="col-md-12">
                                    <input id="prix" type="number" min="0" class="form-control @error('prix') is-invalid @enderror" name="prix" value="{{old('prix')}}" required>
                                    @error('prix')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-md-8">
                                    <label for="user_status">Categorie Article</label>
                                    <select class="form-control" name="categorie_id" id="user_status" required>
                                        <option value="">--Selectionner un status--</option>
                                        @foreach ($categories as $categorie)
                                            <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary" style="background-color: dodgerblue;">Enregistrer</button>
                    </div>
                    </form>
                </div>

            </div>
        </div>

        <hr>
        <div class="table-responsive col-12">
            <table id="myTable" class=" table table-bordered table-striped dataTables_wrapper col-10">
                <thead class=" text-primary">
                <th>#</th>
                <th>Image</th>
                <th>Libelle</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Categorie</th>
                <th>Actions</th>
                </thead>
                <tbody>
                @foreach($articles as $key=>$article)
                    <tr>
                        <td>{{++$key}}</td>
                        <td><img src="{{ asset('storage/'.$article->image) }}" width="50" height="50"></td>
                        <td>{{$article->libelle}}</td>
                        <td>{{$article->description}}</td>
                        <td>{{$article->prix}} </td>
                        <td>{{$article->myCategorie}}</td>
                        <td class="d-flex" style="text-decoration: none;">

                            {{------------------UPDATE ARTICLE----------------------------------}}

                            <div class="col-md-1 col-lg-1">
                                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal{{$article->id}}" style="background-color: orange;" title="Modifier" >
                                    <i class="material-icons">mode</i>
                                </button>
                            </div>

                            <div class="modal fade" id="exampleModal{{$article->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modification Nouvel Utilisateur</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('article.update',['article'=>$article->id]) }}" enctype="multipart/form-data" >
                                                @method('PUT')
                                                @csrf

                                               <div class="form-group">
                                                    <label for="name{{$article->id}}" class="col-md-6">Image Article</label>

                                                    <div class="col-md-12">
                                                        <input id="name{{$article->id}}" type="file" class="form-control custom-file-input @error('image') is-invalid @enderror" name="image">

                                                        @error('image')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="libelle{{$article->id}}" class="col-md-6 ">Libelle Article</label>

                                                    <div class="col-md-12">
                                                        <input id="libelle{{$article->id}}" type="text" class="form-control @error('libelle') is-invalid @enderror" name="libelle" value="{{ $article->libelle }}" required>

                                                        @error('libelle')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="description{{$article->id}}" class="col-md-6  ">Description Article</label>

                                                    <div class="col-md-12">
                                                        <input id="description{{$article->id}}" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $article->description }}" required>

                                                        @error('description')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="prix{{$article->id}}" class="col-md-6 ">Prix Article</label>
                                                    <div class="col-md-12">
                                                        <input id="prix{{$article->id}}" type="number" class="form-control @error('prix') is-invalid @enderror" name="prix" value="{{$article->prix}}" required >

                                                        @error('prix')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <div class="col-md-8">
                                                        <label for="article_categorie{{$categorie->id}}s">Categorie Article</label>
                                                        <select class="form-control" name="categorie_id" id="article_categorie{{$categorie->id}}" required>
                                                            <option value="">--Selectionner un status--</option>
                                                            @foreach ($categories as $categorie)
                                                                <option value="{{$categorie->id}}" {{$article->categorie_id==$categorie->id ? 'selected':''}}>{{$categorie->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-primary" style="background-color: dodgerblue;">Enregistrer</button>
                                        </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                            {{------------------ END UPDATE ARTICLE----------------------------------}}

                            {{------------------DELETE ARTICLE----------------------------------}}
                            <div class="col-md-1 col-lg-1 ml-5">
                                <form action="{{route('article.destroy',['article'=>$article->id])}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-block" title="Supprimer" style="background-color: red">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </form>
                            </div>
                            {{------------------END DELETE ARTICLE----------------------------------}}

                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>

    </div>

@endsection

@section('notification')
{{--    affichage des messages d'erreurs--}}
    @if (session()->has('error'))
        <script>
            toastr.error("{{session()->get('error')}}");
        </script>

    @endif

    @if (session()->has('sucess'))
        <script>
            toastr.success("{{session()->get('sucess')}}");
        </script>
    @endif
@endsection
