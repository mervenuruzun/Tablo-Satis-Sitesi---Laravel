@extends('layouts.front')

@section('title')
    {{$kategori->isim}}
@endsection

@section('content')

<div class="py-5 py-font" >
        <div class="container">
            <div class="row">
                <h2 class="urunler">{{$kategori->isim}}</h2>
                <hr /><br>
                @foreach($urun as $item)
                    <div class="col-md-3 mt-3 "> <br>
                        <a class="linka" href="{{url('kategori/'.$item->kategori->slug.'/'.$item->isim)}}">
                        <div class="card">
                            <img src="{{asset('assets/uploads/urun/'.$item->gorsel)}}" alt="Ürün görsel">
                            <div class="card-body">
                                <h5>{{$item->isim}}</h5>
                                <small>Fiyat: </small>
                                <small class="fiyat"> ₺{{$item->satis_fiyati}}</small>
                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection
