@extends('component.main')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">
@endsection

@section('container')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Report Issuing</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">master</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List kategori produk </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <form action="" class="d-flex">
                            <div class="form-group me-3">
                                <label for="">start date</label>
                                <input type="date" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">end date</label>
                                <input type="date" required class="form-control">
                            </div>
                            <div class="d-flex align-items-center ms-3 mt-2">
                                <button type="button" class="btn btn-primary" style="height: 40px">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                                <button type="submit" class="btn btn-info ms-2" style="height: 40px">
                                    <i class="fa-solid fa-print"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section">
        <div class="card">
            <div class="card-header p-3">
                Kategori Produk
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th class="p-3">No</th>
                            <th class="p-3">no_referensi</th>
                            <th class="p-3">customer</th>
                            <th class="p-3">Alamat</th>
                            <th class="p-3">items</th>
                            {{-- <th class="p-3">Qty</th> --}}
                            <th class="p-0">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr class="p-0 m-0 ">
                                <td class="p-3">{{ $loop->iteration }}</td>
                                <td class="p-3">{{ $data->no_referensi }}</td>
                                <td class="p-3">{{ $data->customer->name }}</td>
                                <td class="p-3">{{ $data->customer->address }}</td>
                                <td class="p-3">
                                    <ul>
                                        @foreach ($data->detail_issuings as $detail)
                                            <li> {{ $detail->item->name }} - {{ $detail->item->qty }}</li>
                                        @endforeach
                                    </ul>
                                </td>

                                <td style="padding: 0px;">
                                    <a href="/master/kategori-produk/{{ $data->id }}/print"
                                        class="btn badge btn-sm round btn-info ">
                                        <i class="fa-solid fa-print"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection


@section('script')
    <script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/js/vendors.js') }}"></script>
@endsection
