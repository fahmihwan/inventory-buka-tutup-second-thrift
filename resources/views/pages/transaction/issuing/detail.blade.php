@extends('component.main')

@section('style')
@endsection

@section('container')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Detail Issuing / In</h3>
                {{-- <a href="/transaction/issuing/create" class="btn btn-sm round  btn-primary mb-3">tambah data</a> --}}
                {{-- <h4 class="card-title">Form </h4> --}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">master</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Brand </li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card py-3   ">
                    <div class=" d-flex justify-content-between px-4 ">
                        <div>
                            <a href="" class="me-3">
                                print
                                <i class="fa-solid fa-print"></i>
                            </a>
                            {{-- |
                            <a href="/transaction/issuing/{{ $id }}/edit" class="ms-3 text-warning ">
                                edit <i class="fa-solid fa-pen-to-square"></i>
                            </a> --}}
                        </div>
                        <a href="/transaction/issuing" class=" me-1 mb-1 ms-5">
                            <i class="fa-solid fa-arrow-left"></i>
                            Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-warning">
                        Detail Tansaksi
                    </div>
                    <div class="card-body">
                        <table>
                            <tr>
                                <td>No Referensi</td>
                                <td class="p-2"> : {{ $detail_issuings->no_referensi }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal</td>
                                <td class="p-2"> : {{ $detail_issuings->date }}</td>
                            </tr>
                            <tr>
                                <td>Customer</td>
                                <td class="p-2"> : {{ $detail_issuings->customer->name }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td class="p-2"> : {{ $detail_issuings->customer->address }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header p-3 d-flex justify-content-between">
                        List Data Supplier

                    </div>
                    <div class="card-body">
                        <table class='table table-striped' id="table1">
                            <thead>
                                <tr>
                                    <th class="p-3">No</th>
                                    <th class="p-3">Item</th>
                                    <th class="p-3">Brand</th>
                                    <th class="p-3">Category</th>
                                    <th class="p-3">Qty</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detail_issuings->detail_issuings as $item)
                                    <tr>
                                        <td class="p-3">{{ $loop->iteration }}</td>
                                        <td class="p-3">{{ $item->item->name }}</td>
                                        <td class="p-3">{{ $item->item->category_brand->name }}</td>
                                        <td class="p-3">{{ $item->item->category_product->name }}</td>
                                        <td class="p-3">{{ $item->qty }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection


@section('script')
@endsection
