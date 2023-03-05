@extends('layouts.front')

@section('title')
    Kategoriler
@endsection

@section('content')
    <div class="py-5 py-font" >
        <div class="container">
            <div class="row">
                <div class="col-md-14">
                    <h2 class="urunler" >Kategoriler</h2>
                    <hr />
                    <div class="row">
                        @foreach($kategori as $item)
                            <div class="col-md-3"> <br>
                                <a class="linka" href="{{url('kategori/'.$item->slug)}}">
                                    <div class="card">
                                        <img class="gorsel-boyut" src="{{asset('assets/uploads/kategori/'.$item->gorsel)}}" alt="Ürün görsel">
                                        <div class="card-body">
                                            <h5 class="isim">{{$item->isim}}</h5><hr />
                                            <small class="aa">{{$item->aciklama}}</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
