@extends('layouts.front')

@section('title')
   ArtGalleria
@endsection

@section('content')
<br>
    @include('layouts.inc.slider')
    <div class="py-5 py-font" >
        <div class="container">
            <div class="row">
                <h2 class="urunler">Tüm Ürünler</h2>
                <hr /><br>
                @foreach($urun as $item)
                <div class="col-md-3 mt-3 ">
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
