@extends('home')

@section('title','Dashboard/Reservation')


@section('content')

<div class="card col-12" style="background-color: white!important;">

        <div class="table-responsive col-12">
            <table id="myTable" class=" table table-bordered table-striped dataTables_wrapper col-10">
                <thead class=" text-primary">
                <th>#</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Contact</th>
                <th>Date Reservation</th>
                <th>Heure Reservation</th>
                <th>Actions</th>
                </thead>
                <tbody>
                @foreach($reservations as $key=>$reservation)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$reservation->nom}}</td>
                        <td>{{$reservation->prenom}}</td>
                        <td>{{$reservation->contact}}</td>
                        <td>{{date_format($reservation->date_reservation,"d/m/Y")}}</td>
                        <td>{{$reservation->heure}}</td>
                        <td class="d-flex">
                            {{------------------DELETE PROFIL----------------------------------}}
                            <div class="col-md-1 col-lg-1 ml-5">
                                <form action="{{route('reservation.destroy',['reservation'=>$reservation->id])}}" method="POST">
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
