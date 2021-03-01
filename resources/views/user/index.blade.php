@extends('home')

@section('title','Dashboard/Utilisateur')

@section('content')
    <div class="card col-12" style="background-color: white!important;">

        <div class="col-md-4 col-lg-2">
            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal" style="background-color: dodgerblue;" >
                Nouvel Utilisateur
            </button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enregistrement Nouvel Utilisateur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('user.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="name" class="col-md-4">Nom</label>

                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 ">Prenom</label>

                                <div class="col-md-12">
                                    <input id="username" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                                    @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4  ">Email</label>

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 ">Mot de passe</label>

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-6 ">Confirmer Mot de passe</label>

                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="adresse-user" class="col-md-4  ">Adresse</label>

                                <div class="col-md-12">
                                    <input id="adresse-user" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" required autocomplete="adresse">

                                    @error('adresse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tel-user" class="col-md-4  ">Telephone</label>

                                <div class="col-md-12">
                                    <input id="tel-user" type="number" minlength="8" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" required autocomplete="tel">

                                    @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-8">
                                    <label for="user_status">Status</label>
                                    <select class="form-control" name="profil_id" id="user_status" required>
                                        <option value="">--Selectionner un status--</option>
                                        @foreach ($profil as $p)
                                            <option value="{{$p->id}}">{{$p->name}}</option>
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
                <th>Nom</th>
                <th>Prenom</th>
                <th>Adresse</th>
                <th>Email</th>
                <th>Telephone</th>
                <th>Actions</th>
                </thead>
                <tbody>
                @foreach($users as $key=>$user)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->firstname}}</td>
                        <td>{{$user->adresse}}</td>
                        <td>{{$user->email}} </td>
                        <td>{{$user->tel}} </td>
                        <td class="d-flex">

                        {{------------------UPDATE USER----------------------------------}}

                            <div class="col-md-1 col-lg-1">
                                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal{{$user->id}}" style="background-color: orange;" title="Modifier" >
                                    <i class="material-icons">mode</i>
                                </button>
                            </div>

                            <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modification Nouvel Utilisateur</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('user.update',['user'=>$user->id]) }}">
                                                @method('PUT')
                                                @csrf

                                                <div class="form-group">
                                                    <label for="name-modif{{$user->id}}" class="col-md-4">Nom</label>

                                                    <div class="col-md-12">
                                                        <input id="name-modif{{$user->id}}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name }}" required autocomplete="name" autofocus>

                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="username-modif{{$user->id}}" class="col-md-4 ">Prenom</label>

                                                    <div class="col-md-12">
                                                        <input id="username-modif{{$user->id}}" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ $user->firstname }}" required autocomplete="firstname" autofocus>

                                                        @error('firstname')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="email-modif{{$user->id}}" class="col-md-4  ">Email</label>

                                                    <div class="col-md-12">
                                                        <input id="email-modif{{$user->id}}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="password-modif{{$user->id}}" class="col-md-4 ">Mot de passe</label>

                                                    <div class="col-md-12">
                                                        <input id="password-modif{{$user->id}}" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password">

                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="password-confirm-modif{{$user->id}}" class="col-md-6 ">Confirmer Mot de passe</label>

                                                    <div class="col-md-12">
                                                        <input id="password-confirm-modif{{$user->id}}" type="password" class="form-control" name="password_confirmation" required autocomplete="password_confirmation">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="adresse-user-modif{{$user->id}}" class="col-md-4  ">Adresse</label>

                                                    <div class="col-md-12">
                                                        <input id="adresse-user-modif{{$user->id}}" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ $user->adresse }}" required autocomplete="adresse">

                                                        @error('adresse')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="tel-user{{$user->id}}" class="col-md-4  ">Telephone</label>

                                                    <div class="col-md-12">
                                                        <input id="tel-user{{$user->id}}" type="number" minlength="8" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ $user->tel}}" required autocomplete="tel">

                                                        @error('tel')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-8">
                                                        <label for="user_status{{$user->id}}">Status</label>
                                                        <select class="form-control @error('profil_id') is-invalid @enderror" name="profil_id" id="user_status{{$user->id}}" required>
                                                            <option value="">--Selectionner un status--</option>
                                                            @foreach ($profil as $p)
                                                                <option value="{{$p->id}}" {{$p->id==$user->profil_id ? 'selected':''}}>{{$p->name}}</option>
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
                            {{------------------ END UPDATE USER----------------------------------}}

                            {{------------------DELETE USER----------------------------------}}
                            <div class="col-md-1 col-lg-1 ml-5">
                                <form action="{{route('user.destroy',['user'=>$user->id])}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-block" title="Supprimer" style="background-color: red">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </form>
                            </div>
                            {{------------------END DELETE USER----------------------------------}}

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
