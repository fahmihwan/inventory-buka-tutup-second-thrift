@extends('component.main')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">
@endsection

@section('container')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Item</h3>
                <a href="/master/item/create" class="btn btn-sm round  btn-primary mb-3">tambah data</a>
                <!-- Button trigger for basic modal -->
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">master</a></li>
                        <li class="breadcrumb-item active" aria-current="page">kategori produk </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
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
                            <th class="p-3">Kategori Brand</th>
                            <th class="p-3">Kategori Produk</th>
                            <th class="p-3">Detail Brand</th>
                            <th class="p-3">Qty</th>
                            <th class="p-0">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr class="p-0 m-0 ">
                                <td class="p-3">{{ $loop->iteration }}</td>
                                <td class="p-3">{{ $item->category_brand->name }}</td>
                                <td class="p-3">{{ $item->category_product->name }}</td>
                                <td class="p-3">{{ $item->detail_brand->name }}</td>
                                <td class="p-3">{{ $item->qty }}</td>
                                <td style="padding: 0px;">
                                    <a href="/master/item/{{ $item->id }}/edit"
                                        class="btn badge btn-sm round btn-warning ">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="/master/item/{{ $item->id }}" method="post" class=" d-inline-block">
                                        @method('delete')
                                        @csrf
                                        <button class="btn badge  btn-sm round btn-danger"
                                            onClick="return confirm('Are you sure?')">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
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
