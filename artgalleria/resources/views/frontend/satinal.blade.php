@extends('layouts.front')

@section('title')
   Satın Al
@endsection

@section('content')

<div class="container mt-5">
    <form action="{{url('place-order')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6>Basic Details</h6><hr>
                        <div class="row checkout-form">
                            <div class="col-md-6">
                                <label for="">Ad</label>
                                <input type="text" class="form-control" required="" name="ad" placeholder="Ad">
                            </div>
                            <div class="col-md-6">
                                <label for="">Soyad</label>
                                <input type="text" class="form-control" required="" name="soyad" placeholder="Soyad">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Email</label>
                                <input type="text" class="form-control" required="" name="email" placeholder="Email">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Telefon Numarası</label>
                                <input type="text" class="form-control" required="" name="telefon" placeholder="Telefon Numarası">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Şehir</label>
                                <input type="text" class="form-control" required="" name="sehir" placeholder="Şehir">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">İlçe</label>
                                <input type="text" class="form-control" required="" name="ilce" placeholder="İlçe">
                            </div>
                            <div class="col-md-12 mt-3">
                                <label for="">Adres</label>
                                <input type="text" class="form-control"  required="" name="adres" placeholder="Adres">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 x">
                <div class="card ">
                    <div class="card-body">
                    <h6>Order Details </h6><hr>
                    <table class="table">
                            <thead class="py-font">
                                <tr>
                                    <th>Ürün</th>
                                    <th>Adet</th>
                                    <th>Fiyat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $toplam=0; @endphp
                                @foreach($sepet as $item)
                                <tr>
                                    <td>{{$item->urun->isim}}</td>
                                    <td class="urunler">x{{$item->urun_adet}}</td>
                                    @php $aratoplam=0; @endphp
                                    @php $aratoplam +=$item->urun->satis_fiyati * $item->urun_adet; @endphp
                                    <td class="fiyat">₺{{$aratoplam}}</td>
                                </tr>
                                @php $toplam +=$item->urun->satis_fiyati * $item->urun_adet; @endphp
                                @endforeach

                            </tbody>

                    </table><hr>
                    <div class="z" style="text-align:center;">
                            Sepet Tutarı: <t class="urunler">₺{{$toplam}}</t>
                        </div> <br>
                    <div class="urunler" style="text-align:center;" >
                            <a href="">
                                <button type="submit" class="btn btn-outline-success">
                                    <i class="material-icons y">shopping_cart_checkout</i> Satın Al
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


@endsection
