@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="text-center" style="background-color: #DEBACE">Kategoriler</h4>
        </div>
        <div class="card-body">
            <table class="table">
               <thead>
                    <tr>
                        <th>Id</th>
                        <th>Ad</th>
                        <th>Açıklama</th>
                        <th>Görsel</th>
                        <th>Action</th>
                    </tr>
               </thead>
                <tbody>
                @foreach($kategori as $item) <!--KategoriController.php->$kategori-->
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->isim}}</td>
                        <td >{{$item->aciklama}}</td>
                        <td>
                           <img class="gorsel" src="{{asset('assets/uploads/kategori/'.$item->gorsel)}}">
                        </td>
                        <td>
                            <a href="{{url('kategori_duzenle/'.$item->id)}}" class="btn btn-outline-primary">Düzenle</a>
                            <a href="{{url('kategori_sil/'.$item->id)}}" class="btn btn-outline-primary">Sil</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
