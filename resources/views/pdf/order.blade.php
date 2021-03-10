<!DOCTYPE html>
<html lang="EN">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>{{ __('narudzbenica_' . $order->order_number . '/' . $order->order_year) }}</title>
        <style>
            body {
                font-family: DejaVu Serif;
            }

            table {
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #2b2b2b;
                padding: 5px 15px;
            }

            .bg-gray-light {
                background-color: rgb(238, 238, 238);
            }

            .bg-gray-dark {
                background-color: rgb(196, 196, 196);
            }

            .bg-yellow {
                background-color: rgb(252, 223, 77);
            }

            .center {
                text-align: center;
            }

            .small-text {
                font-size: 14px;
                font-weight: lighter;
            }

            .xs-text {
                font-size: 12px;
                font-weight: lighter;
            }

            .items-xs-font {
                font-size: 13px;
                font-weight: lighter;
            }

            .text-bold {
                font-weight: bolder;
            }

            .uppercase {
                text-transform: uppercase;
            }
        </style>
    </head>

    <body>
        <table>
            <tr >
                <th class="bg-yellow center" style="width: 50%">{{ __('KUPAC (PRIMATELJ)') }}</th>
                <th class="bg-gray-dark center">{{ __('ISPORUČITELJ (PRODAVATELJ)') }}</th>
            </tr>
            <tr>
                <td class="bg-gray-light center small-text">
                    <div>{{ __('Naziv: ime i prezime') }}</div>
                    <div>{{ __('Adresa: mjesto, ulica i broj telefona') }}</div>
                    <div>{{ __('OIB') }}</div>
                </td>
                <td class="bg-gray-light center small-text">
                    <div>{{ __('Naziv: ime i prezime') }}</div>
                    <div>{{ __('Adresa: mjesto, ulica i broj telefona') }}</div>
                    <div>{{ __('OIB') }}</div>
                </td>
            </tr>

            <tr>
                <td class="center text-bold">
                    <div>{{ __('OPĆINA VELIKA') }}</div>
                    <div>{{ __('ZVONIMIROVA 1a') }}</div>
                    <div>{{ __('34 330 VELIKA') }}</div>
                    <div>{{ __('Tel. 034-233-033, Fax: 034-313-033') }}</div>
                    <div>{{ __('OIB: 30966980172') }}</div>
                </td>
                <td class="center text-bold">
                    <div class="uppercase">{{ $order->seller_name }}</div>
                    <div>{{ $order->seller_address }}</div>
                    <div>{{ $order->seller_phone }}</div>
                    <div>{{ __('OIB: ') }}{{ $order->seller_oib }}</div>
                </td>
            </tr>

            <tr>
                <td class="bg-yellow center">{{ __('(MB/MBG – OIB – POREZNI BROJ)') }}</td>
                <td class="bg-gray-dark center">{{ __('(MB/MBG – OIB – POREZNI BROJ)') }}</td>
            </tr>

            <tr>
                <td colspan="2" style="padding: 10px 15px">
                    <div>{{ __('Žiroračun kupca (primatelja) - IBAN: ') }}
                        <span class="text-bold">{{ $order->seller_iban }}</span>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div style="margin-bottom: 5px">{{ __('Nadnevak') }}</div>
                    <div class="text-bold">{{ \Carbon\Carbon::parse($order->order_date)->format('d. m. Y.') }}</div>
                </td>
                <td>
                    <div style="font-size: 24px" class="uppercase text-bold center">{{ __('Narudžbenica') }}</div>
                    <div class="center" style="font-size: 20px">{{ $order->order_number }} / {{ $order->order_year }}</div>
                </td>
            </tr>
        </table>

        <table>
            <tr>
                <td style="width: 56%">
                    <div style="margin-bottom: 5px" class="uppercase xs-text center">{{ __('Naručena dobra - usluge isporučite na naslov:') }}</div>
                </td>
                <td style="width: 22%">
                    <div class="uppercase center xs-text">{{ __('Rok isporuke') }}</div>
                </td>
                <td style="width: 22%">
                    <div class="uppercase center xs-text">{{ __('Način otpreme') }}</div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="uppercase text-bold center">
                        <div>{{ __('OPĆINA VELIKA') }}</div>
                        <div>{{ __('ZVONIMIROVA 1a') }}</div>
                        <div>{{ __('34 330 VELIKA') }}</div>
                    </div>
                </td>
                <td>
                    <div class="uppercase center xs-text">{{ $order->delivery_due }}</div>
                </td>
                <td>
                    <div class="uppercase center xs-text">{{ $order->shipping_type }}</div>
                </td>
            </tr>
        </table>

        <div style="margin-top: 20px; margin-bottom: 10px" class="uppercase text-bold">{{ __('Naručujemo:') }}</div>
        <table>
            <tr class="bg-yellow xs-text center" style="font-weight: bolder">
                <td>{{ __('Rbr.') }}</td>
                <td style="width: 35%">{{ __('Trgovački naziv dobra - usluge') }}</td>
                <td>{{ __('Jed. mj.') }}</td>
                <td>{{ __('Kol.') }}</td>
                <td>{{ __('Cijena') }}</td>
                <td>
                    <div>{{ __('Iznos') }}</div>
                    <div>{{ __('(5x4)') }}</div>
                </td>
            </tr>

            @foreach($order->orderItems as $index => $item)
                <tr class="items-xs-font">
                    <td style="padding: 10px 5px">{{ $index + 1 }}</td>
                    <td style="width: 35%; padding: 10px 5px">{{ $item->name }}</td>
                    <td style="padding: 10px 5px">{{ $item->unit }}</td>
                    <td style="padding: 10px 5px">{{ $item->quantity }}</td>
                    <td style="padding: 10px 5px">{{ number_format($item->unit_price_no_vat, 2) }} kn</td>
                    <td style="padding: 10px 5px">{{ number_format($item->total_price_no_vat, 2) }} kn</td>
                </tr>
            @endforeach

            <tr class="text-bold bg-gray-light">
                <td colspan="4">{{ __('UKUPNO:') }}</td>
                <td colspan="2">{{ number_format($order->orderItems->sum('total_price_no_vat'), 2) }} kn</td>
            </tr>
        </table>

        <table style="margin-top: 30px;">
            <tr>
                <td>{{ __('Našu narudžbu ćemo platiti u roku') }}</td>
                <td>{{ $order->payment_due }}</td>
            </tr>

            <tr>
                <td>{{ __('Način plaćanja') }}</td>
                <td>{{ __('Po računu') }}</td>
            </tr>
        </table>

        <table style="margin-top: 30px; border: none">
            <tr style="border: none">
                <td style="border: none">
                    <div>
                        <div>{{ __('Narudžbenicu sastavio:') }}</div>
                        <div style="margin-top: 50px; border-top: 1px solid black; padding-top: 5px">{{ $order->user->name }}</div>
                    </div>
                </td>
                <td style="border: none; padding: 0 50px">
                    <div class="text-bold center">{{ __('M. P.') }}</div>
                </td>
                <td style="border: none">
                    <div>
                        <div>{{ __('Potpis odgovorne osobe:') }}</div>
                        <div style="margin-top: 50px; border-top: 1px solid black; padding-top: 5px; color: white">{{ __('Načelnik') }}</div>
                    </div>
                </td>
            </tr>
        </table>
    </body>
</html>
