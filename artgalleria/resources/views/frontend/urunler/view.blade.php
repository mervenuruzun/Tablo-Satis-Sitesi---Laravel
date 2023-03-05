@extends('layouts.front')

@section('title')
    {{$urun->isim}}
@endsection

@section('content')

<br>
<div class="py-3 mb-4 py-bg py-font boyut">
    <div class="container">
        <h6 class="mb-0"> {{$urun->kategori->isim}} / {{$urun->isim}}</h6>
    </div>
</div>

<div class="container py-font">
    <div class="card urun_data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <br><img src="{{asset('assets/uploads/urun/'.$urun->gorsel)}}" class="w-100" alt="">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0 aa">
                        {{$urun->isim}}
                    </h2>

                    <hr>
                    <small>Orijinal Fiyat: </small>
                    <small class="fiyat "> <s>₺{{$urun->orjinal_fiyat}}</s></small>

                    @if($urun->adet > 0)
                        <label class="badge btn-outline-success bg b">Stokları Mevcut</label>
                    @else
                        <label class="badge btn-outline-danger bq b">Tükendi</label>
                    @endif
                    <br>

                    <small>Satış Fiyatı: </small>
                    <small class="fiyat"> ₺{{$urun->satis_fiyati}}</small>

                    <p class="mt-3">
                        <small>{!! $urun->kucuk_aciklama !!}</small>
                    </p>


                    <hr>
                    <div class="row mt-2">
                        <div class="col-md-2">
                            <input type="hidden" value="{{$urun->id}}" class="urun_id">
                            <label for="Adet"><small>Adet</small> </label>
                            <div class="input-group text-center mb-3" style="width:130px;">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" name="adet"  class="form-control text-center adt" value="1" />
                                <button class="input-group-text increment-btn">+</button>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <br>
                            @if($urun->adet > 0)
                                <button type="button" class="btn btn-outline-success me-3 addToCartBtn float-start"><small> Sepete Ekle</small></button>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


