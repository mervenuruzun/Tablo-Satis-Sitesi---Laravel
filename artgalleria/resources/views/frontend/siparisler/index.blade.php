@extends('layouts.front')

@section('title')
   Siparişlerim
@endsection

@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead class="py-font">
                    <tr>
                        <th>Takip Numarası</th>
                        <th>Toplam Fiyat</th>
                        <th>Durum</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($siparisler as $item)
                        <tr>
                            <td>{{$item->takip_no}}</td>
                            <td class="urunler">₺{{$item->toplam}}</td>
                            <td>
                                <a href="{{url('#')}}" class="btn btn-outline-success">Detay</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
