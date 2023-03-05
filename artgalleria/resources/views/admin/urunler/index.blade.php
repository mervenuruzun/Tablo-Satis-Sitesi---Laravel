@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="text-center" style="background-color: #DEBACE">Ürünler</h4>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Kategori</th>
                    <th>Ad</th>
                    <th>Açıklama</th>
                    <th>Satış Fiyatı</th>
                    <th>Adet</th>
                    <th>Görsel</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($urun as $item) <!--KategoriController.php->$kategori-->
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->kategori->isim}}</td>
                    <td>{{$item->isim}}</td>
                    <td >{{$item->aciklama}}</td>
                    <td >{{$item->satis_fiyati}}</td>
                    <td >{{$item->adet}}</td>
                    <td>
                        <img class="gorsel" src="{{asset('assets/uploads/urun/'.$item->gorsel)}}">
                    </td>
                    <td>
                        <a href="{{url('urun_duzenle/'.$item->id)}}" class="btn btn-outline-primary">Düzenle</a>
                        <a href="{{url('urun_sil/'.$item->id)}}" class="btn btn-outline-primary">Sil</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
