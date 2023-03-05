@extends('layouts.admin')l

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="h4kat text-center" style="background-color: #DEBACE">Kategori Düzenle</h4>
        </div>

        <div class="card-body">
            <form action="{{url('kategori_duzen/'.$kategori->id)}}" method="POST"  >
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3 h4kat">
                        <label for="">Ad</label>
                        <input type="text" value="{{$kategori->isim}}" class="form-control" name="name">
                    </div>
                    <div class="col-md-6 mb-3 h4kat">
                        <label for="">Slug</label>
                        <input type="text" value="{{$kategori->slug}}" class="form-control" name="slug">
                    </div>
                    <div class="col-md-12 mb-3 ">
                        <label for="">Açıklama</label>
                        <textarea rows="3" class="form-control" name="aciklama">{{$kategori->aciklama}} </textarea>
                    </div>
                    <div class="col-md-6 mb-3 ">
                        <label for="">Meta Başlık</label>
                        <input type="text" value="{{$kategori->meta_baslik}}" class="form-control" name="meta_baslik">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Açıklama</label>
                        <textarea rows="3"  class="form-control" name="meta_aciklama">{{$kategori->meta_aciklama}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3 ">
                        <label for="">Meta Keywords</label>
                        <textarea rows="3" class="form-control" name="meta_keywords">{{$kategori->meta_keywords}}</textarea>
                    </div>

                    @if($kategori->gorsel)
                        <img style="width: 100px; height: 100px"  src="{{asset('assets/uploads/kategori/'.$kategori->gorsel)}}" alt="Kategori Görsel">
                    @endif
                    <div class="col-md-12 ">
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
