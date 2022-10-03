@extends('component.main')

@section('style')
    <link rel="stylesheet" href="{{ asset('assets/vendors/choices.js/choices.min.css') }}" />
@endsection

@section('container')
    <div class="page-title">
        <div class="row pb-3">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Manage Receiving Transcation </h3>
            </div>

            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">master</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Supplier </li>
                        <li class="breadcrumb-item active" aria-current="page">create </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">

        @if (session()->has('fail'))
            <div class="alert alert-danger mb-4">
                <i class="fa-solid fa-bell"></i> {!! session('fail') !!}
            </div>
        @endif

        <div class="card">
            <div class="card-body p-2 ">
                <ul class="nav mb-3 ">
                    <li class="nav-item">
                        <a class="nav-link me-2" href="/transaction/manage-receiving/{{ $receiving->ball_number }}">List
                            Item</a>
                    </li>
                    <li class="nav-item fw-bold border-bottom border-3 border-primary">
                        <a class="nav-link" href="/transaction/manage-receiving/{{ $receiving->ball_number }}/create">Tambah
                            Item</a>
                    </li>
                </ul>
                <div class="m-2">
                    <div class="row ">
                        <div class="col-6">
                            <table>
                                <tr>
                                    <td class="pe-2">Ball Number</td>
                                    <td>: {{ $receiving->ball_number }}</td>
                                </tr>
                                <tr>
                                    <td>Date</td>
                                    <td>: {{ $receiving->date }}</td>
                                </tr>

                                <tr>
                                    <td>Note</td>
                                    <td>: {{ $receiving->note }}</td>
                                </tr>

                            </table>
                        </div>
                        <div class="col-6">
                            <table>
                                <tr>
                                    <td class="pe-3">Category Product</td>
                                    <td>: <span class="badge bg-info">{{ $receiving->category_product->name }} </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Target Qty</td>
                                    <td>: <span class="badge bg-info">{{ $receiving->target_qty }}</span></td>
                                </tr>
                                <tr>
                                    <td>Open Qty</td>
                                    <td>: <span class="badge bg-warning">{{ $receiving->open_qty }} </span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section">

        <section id="basic-vertical-layouts">
            <div class="row match-height">
                <div class="col-md-8 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Form Item</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="/transaction/manage-receiving" method="post" class="form form-vertical">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="valid-state">Nama Item</label>
                                                    <div class="form-group">
                                                        <select name="name" class="choices form-select">
                                                            @foreach ($item_name as $detail)
                                                                <option value="{{ $detail->id }}">
                                                                    {{ $detail->name }} &nbsp; &nbsp;
                                                                    {{-- [ Kategori Brand
                                                                    {{ $detail->category_brand->name }} ] --}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <input type="hidden" name="ball_number"
                                                    value="{{ $receiving->ball_number }}">
                                                <input type="hidden" name="category_product_id"
                                                    value="{{ $receiving->category_product->id }}">
                                                {{-- 
                                                <div class="form-group">
                                                    <label for="valid-state">Kategori Brand</label>
                                                    <select name="category_brand_id" class="choices form-select">
                                                        @foreach ($category_brand as $brand)
                                                            <option value="{{ $brand->id }}">
                                                                {{ $brand->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div> --}}
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="contact-info-vertical">Open Qty</label>
                                                    <input type="number" id="contact-info-vertical" class="form-control"
                                                        name="open_qty" placeholder="Qty" min="1" required
                                                        style="width:200px;">
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Basic Modal -->
                {{-- <div class="modal fade text-left" id="default" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <form action="/master/detail-brand" method="post" class="form form-vertical">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header p-2">
                                    <h5 class="modal-title" id="myModalLabel1">Input
                                        Detail Brand</h5>
                                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="valid-state">Detail
                                                        Brand</label>
                                                    <input type="text"
                                                        class="form-control @error('record') is-invalid @enderror"
                                                        id="valid-state" placeholder="Valid" value="{{ old('name') }}"
                                                        required name="name">
                                                    @error('name')
                                                        <div class="valid-feedback">
                                                            <i class="bx bx-radio-circle"></i>
                                                            {{ $message }}
                                                        </div>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer p-2">
                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button type="submit" class="btn btn-primary ml-1">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Accept</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> --}}
                {{-- end Modal --}}
                {{-- <div class="col-md-6 col-12">

                        </div> --}}
            </div>
        </section>

    </section>
@endsection


@section('script')
    <script src="{{ asset('assets/vendors/choices.js/choices.min.js') }}"></script>
@endsection
