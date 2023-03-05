@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="text-center" style="background-color: #DEBACE">Kategori Ekle</h4>
        </div>

        <div class="card-body">
            <form action="{{url('insert_kategori')}}" method="POST" enctype="multipart/form-data">
               @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Ad</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Açıklama</label>
                        <textarea rows="3" class="form-control" name="aciklama"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Meta Başlık</label>
                        <input type="text" class="form-control" name="meta_baslik">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Açıklama</label>
                        <textarea rows="3" class="form-control" name="meta_aciklama"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea rows="3" class="form-control" name="meta_keywords"></textarea>
                    </div>

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
