@extends('layouts.admin')

@section('content')
    <div class="card py-font">
        <div class="card-header">
            <h4 class="text-center" style="background-color: #DEBACE">Kullanıcılar</h4>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>İsim</th>
                    <th>Email</th>
                    <th>Görüntüle</th>
                </tr>
                </thead>
                <tbody>
                @foreach($kullanici as $item) <!--KategoriController.php->$kategori-->
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>
                        <a href="#" class="btn btn-outline-primary">Görüntüle</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
