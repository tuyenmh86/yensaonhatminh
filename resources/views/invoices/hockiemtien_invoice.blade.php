<html>
<head>
    <title>Kiếm Tiền Online</title>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="http://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css2?family=Amiri&display=swap" rel="stylesheet">
</head>
    <div style="margin-left:auto;margin-right:auto;">
    <style media="all">
        body {
            font-family: DejaVu Sans;
        }
        div{
            font-size: 1rem;
        }
        .gry-color *,
        .gry-color{
            color:#878f9c;
        }
        table{
            width: 100%;
        }
        table th{
            font-weight: normal;
        }
        table.padding th{
            padding: .5rem .7rem;
        }
        table.padding td{
            padding: .7rem;
        }
        table.sm-padding td{
            padding: .2rem .7rem;
        }
        .border-bottom td,
        .border-bottom th{
            border-bottom:1px solid #eceff4;
        }
        .text-left{
            text-align:left;
        }
        .text-right{
            text-align:right;
        }
        .small{
            font-size: .85rem;
        }
        .strong{
            font-weight: bold;
        }
         .demo {
             border:1px solid #C0C0C0;
             border-collapse:collapse;
             padding:5px;
         }
        .demo th {
            border:1px solid #C0C0C0;
            padding:5px;
            background:#F0F0F0;
        }
        .demo td {
            border:1px solid #C0C0C0;
            padding:5px;
        }
    </style>

    @php
        $generalsetting = \App\GeneralSetting::first();
    @endphp

    <div style="background: #eceff4;padding: 0.5rem;">
        <table>
            <tr>
                <td>
                    @if($generalsetting->logo != null)
                        <img src="{{ asset($generalsetting->logo) }}" height="40" style="display:inline-block;">
                    @else
                        <img src="{{ asset('frontend/images/logo/logo.png') }}" height="40" style="display:inline-block;">
                    @endif
                </td>
                <td style="font-size: 2.5rem;" class="text-right strong">INVOICE</td>
            </tr>
        </table>
        <table>
            <tr>
                <td style="font-size: 1.2rem;" class="strong">{{ $generalsetting->site_name }}</td>
                <td class="text-right"></td>
            </tr>
            <tr>
                <td class="gry-color small">{{ $generalsetting->address }}</td>
                <td class="text-right"></td>
            </tr>
            <tr>
                <td class="gry-color small">Email: {{ $generalsetting->email }}</td>
                <td class="text-right small"></td>
            </tr>
            <tr>
                <td class="gry-color small">Phone: {{ $generalsetting->phone }}</td>
                <td class="text-right small"></td>
            </tr>
        </table>

    </div>

    <div style="border-bottom:1px solid #eceff4;margin: 0 1rem;"></div>
{{--    <div style="padding: 0.5rem;">--}}
{{--        <table>--}}
{{--            <tr><td class="strong small gry-color">Gửi tới:</td></tr>--}}
{{--            <tr><td class="strong">{{$order->user->name}}</td></tr>--}}
{{--            <tr><td class="strong">{{$order->user->email}}</td></tr>--}}
{{--        </table>--}}
{{--    </div>--}}
    <div style="padding: 0.5rem;">
        <table class="padding text-left small border-bottom">
            <thead>
            <tr class="gry-color" style="background: #eceff4;">
                <th width="10%">ID Sản phẩm</th>
                <th width="50%">Tên Sản phẩm</th>
                <th width="10%" >Giá </th>
                <th width="30%" class="text-right">Giá khuyến mãi</th>
            </tr>
            </thead>
            <tbody class="strong">
                <tr class="">
                    <td class="gry-color">{{ $product->id }}</td>
                    <td class="gry-color">{{ $product->name }}</td>
                    <td class="gry-color">{{ number_format($product->unit_price)}}VND</td>
                    <td class="gry-color">{{ number_format($product->unit_price - $product->discount) }}VND</td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
</body>

</html>
