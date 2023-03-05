@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="text-center" style="background-color: #DEBACE">Ürün Düzenle</h4>
        </div>

        <div class="card-body">
            <form action="{{url('urun_duzen/'.$urun->id)}}" method="POST" enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Kategori</label>+
                        <select class="form-select">
                            <option value="">{{$urun->kategori->isim}}</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Ad</label>
                        <input type="text" class="form-control" value="{{$urun->isim}}" name="name">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Kısa Açıklama</label>
                        <textarea rows="3" class="form-control" name="kisa_aciklama">{{$urun->kucuk_aciklama}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Açıklama</label>
                        <textarea rows="3" class="form-control" name="aciklama">{{$urun->aciklama}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Orijinal Fiyat</label>
                        <input type="text" class="form-control" value="{{$urun->orjinal_fiyat}}" name="orijinal_fiyat">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Satış Fiyatı</label>
                        <input type="text" class="form-control" value="{{$urun->satis_fiyati}}"name="satis_fiyati">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Adet</label>
                        <input type="number" class="form-control" value="{{$urun->adet}}" name="adet">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Meta Başlık</label>
                        <input type="text" class="form-control" value="{{$urun->meta_baslik}}" name="meta_baslik">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Meta Açıklama</label>
                        <textarea rows="3" class="form-control" name="meta_aciklama">{{$urun->meta_aciklama}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea rows="3" class="form-control" name="meta_keywords">{{$urun->meta_keywords}}</textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" {{$urun->status =="1" ? 'checked' : ''}} name="status">
                    </div>

                    @if($urun->gorsel)
                        <img style="width: 100px; height: 100px"  src="{{asset('assets/uploads/urun/'.$urun->gorsel)}}" alt="Ürün Görsel">
                    @endif
                    <div class="col-md-12">
                        <input type="file" class="form-control" name="gorsel">
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
