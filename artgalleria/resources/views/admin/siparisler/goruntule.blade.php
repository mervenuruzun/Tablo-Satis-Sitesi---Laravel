@extends('layouts.admin')

@section('title')
    Siparişler
@endsection


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4>Siparişler</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sipariş Tarihi</th>
                                <th>Takip No</th>
                                <th>Toplam Fiyat</th>
                                <th>Görüntüle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($siparis as $item)
                            <tr>
                                <td>{{date('d-m-y',strtotime($item->created_at))}}</td>
                                <td>{{$item->takip_no}}</td>
                                <td>{{$item->toplam}}</td>
                                <td>
                                    <a href="{{url('admin/siparis-goruntule/'.$item->id)}}" class="btn btn-outline-success">Görüntüle</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
