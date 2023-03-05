@extends('layouts.front')

@section('title')
   Sepet
@endsection

@section('content')

<br>
<div class="py-3 mb-4 py-bg py-font boyut">
    <div class="container">
        <h6 class="mb-0"> Home / Sepet</h6>
    </div>
</div>

<div class="container py-font">
    <div class="">
        <div class="body">
            <div class="row">
                @if($sepet->count()>0)
                <div class="col-md-8">
                    <div class="container">
                        <div class="card shadow ">
                            @php $total=0; @endphp
                            <div class=""> <br>
                            @foreach($sepet as $item)
                                <div class="row urun_data mt-3">
                                    <div class="col-md-2  f">
                                        <img style="width: 80px; height:80px;" src="{{asset('assets/uploads/urun/'.$item->urun->gorsel)}}" alt="Gorsel">
                                    </div>
                                    <div class="col-md-3 my-auto mt-3">
                                        <small>{{$item->urun->isim}}</small>
                                    </div>
                                    <div class="col-md-2 my-auto fiyat mt-3">
                                        <small>₺{{$item->urun->satis_fiyati}}</small>
                                    </div>
                                    <div class="col-md-2 my-auto md-1">
                                        <input type="hidden" class="urun_id" value="{{$item->urun_id}}" >
                                        @if($item->urun->adet > $item->urun_adet)
                                            <div class="input-group text-center" style="width:120px">
                                                <button class="input-group-text changeAdet decrement-btn" >-</button>
                                                <input type="text" name="adet" class="form-control adt text-center" value="{{$item->urun_adet}}">
                                                <button class="input-group-text changeAdet increment-btn">+</button>
                                            </div>
                                            @php $total +=$item->urun->satis_fiyati * $item->urun_adet; @endphp
                                        @else
                                        <h6>Tükendi</h6>
                                        @endif
                                    </div>
                                    <div class="col-md-2 d">
                                        <i class="material-icons delete-cart-item">delete_sweep</i>
                                    </div>
                                </div><hr>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 shadow" style="background-color: #ffffff" >
                    <div class="body ">
                        <div class="row mt-3">
                            <div class="mt-3">
                                    <div class=" my-auto" style="text-align:center;" >
                                    <small>Sepet</small>
                                    </div>
                            </div><br><br><hr>
                            <div class="mt-3">
                                <div class="mt-3">
                                        <div class="" style="text-align:center;" >
                                        <small>Sepet Tutarı:</small> <small class="urunler">₺{{$total}}</small>
                                        </div>
                                </div>
                            </div>

                            <div class="mt-3">
                                <div class="mt-3">
                                    <div class="urunler" style="text-align:center;" >
                                        <a href="{{url('satinal')}}">
                                            <button class="btn btn-outline-success">
                                                <i class="material-icons">shopping_bag</i>
                                                <small class="mt-3"> Satın Al</small>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            @else
                            <div class="card-body text-center card">
                                <h2>Sepetiniz Boş</h2>
                                <div class="md-7 text-center">
                                    <a href="{{url('/kategoriler')}}" class="btn btn-outline-success">
                                        Alışverişe Devam Et
                                    </a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

