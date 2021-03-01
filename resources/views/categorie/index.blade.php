@extends('home')


@section('title','Dashboard/Categorie')


@section('content')
    <div class="card col-12" style="background-color: white!important;">

        <div class="col-md-4 col-lg-2">
            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal" style="background-color: dodgerblue;" >
                Nouvel Categorie
            </button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enregistrement Nouvel Categorie</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('categorie.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name" class="col-md-4">Libelle</label>

                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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
                <th>Libelle</th>
                <th>Designation</th>
                <th>Actions</th>
                </thead>
                <tbody>
                @foreach($categories as $key=>$categorie)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$categorie->name}}</td>
                        <td>{{date_format($categorie->created_at,"d/m/Y")}}</td>
                        <td class="d-flex">

                            {{------------------UPDATE PROFIL----------------------------------}}

                            <div class="col-md-1 col-lg-1">
                                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal{{$categorie->id}}" style="background-color: orange;" title="Modifier" >
                                    <i class="material-icons">mode</i>
                                </button>
                            </div>

                            <div class="modal fade" id="exampleModal{{$categorie->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modification Nouvel Categorie</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('categorie.update',['categorie'=>$categorie->id]) }}">
                                                @method('PUT')
                                                @csrf

                                                <div class="form-group">
                                                    <label for="name-modif{{$categorie->id}}" class="col-md-4">Nom</label>

                                                    <div class="col-md-12">
                                                        <input id="name-modif{{$categorie->id}}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$categorie->name }}" required>

                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
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
                            {{------------------ END UPDATE PROFIL----------------------------------}}

                            {{------------------DELETE PROFIL----------------------------------}}
                            <div class="col-md-1 col-lg-1 ml-5">
                                <form action="{{route('categorie.destroy',['categorie'=>$categorie->id])}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-block" title="Supprimer" style="background-color: red">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </form>
                            </div>
                            {{------------------END DELETE PROFIL----------------------------------}}

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


