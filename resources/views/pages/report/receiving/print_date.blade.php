<!DOCTYPE html>
<html>

<head>
    <title>.</title>

    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
        }

        .header {
            padding: 20px 0px;
            text-align: center;
        }

        .header h4 {
            font-size: 28px;
        }

        .container {
            /* border: 1px solid black; */
        }

        table {
            width: 100%;
        }

        table,
        th,
        td {
            padding: 5px;
            border: 1px solid black;
            border-collapse: collapse;
            font-size: 9pt;
        }
    </style>
</head>

<body>
    <div class="header">
        <h4>Report Receiving </h4> <br>
        <h6 style="font-size: 12px;">Buka Tutup Second</h6>
        <p style="font-size: 12px">Jl Godean, Km 7 Semarangan, Sleman Daerah Istimewa Yogyakarta Kode Pos 55285</p>
        <p style="margin: 5px">Periode : {{ request('start_date') }} sampai {{ request('end_date') }}</p>
    </div>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Ball Number</th>
                    <th>Supplier</th>
                    <th>Category </th>
                    <th>Target Qty</th>
                    <th>Open Qty</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                <?php $total = 0; ?>;
                @foreach ($datas as $data)
                    <?php $total += $data->price; ?>;
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->date }}</td>
                        <td>{{ $data->ball_number }}</td>
                        <td>{{ $data->supplier->name }}</td>
                        <td>{{ $data->category_product->name }}</td>
                        <td>{{ $data->target_qty }}</td>
                        <td>{{ $data->open_qty }}</td>
                        <td>{{ 'Rp' . $data->price }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7">total</td>
                    <td colspan="1">Rp.{{ $total }}</td>
                </tr>
            </tfoot>


        </table>
    </div>

</body>

</html>
