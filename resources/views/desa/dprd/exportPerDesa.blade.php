<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ $title }}</title>
    @include('desa.dprd.css')
</head>

<body>
    @if ($pemilu == 'Pileg')
        <table class="full-width-table" style="border: 2px solid black;">
            <thead>
                <tr style="background-color: {!! $color !!}">
                    <th colspan="3" style="font-size: 30px; ">
                       {{ $type }}
                    </th>
                </tr>
                <tr>
                    <th colspan="3" style="border-top: none; border-bottom: none; font-size: 20px;">
                        {{ $partai->nama }}
                    </th>
                </tr>
                <tr>
                    <th colspan="3" style="border-top: none; border-bottom: none; font-size: 20px;">

                        <img src="{{ public_path('storage/'.$partai->logo) }}" alt="logo" height="75px">
                    </th>
                </tr>
                <tr>
                    <th colspan="3" style="border-top: none; border-bottom: none;">
                        {{ $desa->kecamatan->dapil->nama }}
                    </th>
                </tr>
                <tr>
                    <th colspan="3" style="border-top: none;">
                        {{ $tps->nama }} ({{ $desa->nama }},{{ $desa->kecamatan->nama }})
                    </th>
                </tr>
                <tr>
                    <th>No.</th>
                    <th>Nama Calon</th>
                    <th>Suara</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i=0;
                @endphp
                @foreach (App\Models\Calon::orderBy('no', 'asc')->where('type',$type)->where('is_active',true)->where('tps_id',$tps_id)->where('partai_id',$partai->id)->get() as $calon)
                @php
                    $i=$i+$calon->suara;
                @endphp
                <tr>
                    @if ($calon->no == 0)
                        <td>-</td>
                        <td style="font-weight: bold;">{{ $calon->nama }}</td>
                    @else
                        <td>{{ $calon->no }}</td>
                        <td>{{ $calon->nama }}</td>
                    @endif
                    @if ($opsi == 'isi')
                        <td>{{ $calon->suara }}</td>
                    @else
                        <td></td>
                    @endif
                </tr>
                @endforeach
                <tr style="border: 2px solid black;">
                    <td>-</td>
                    <td style="font-weight: bold;">Total Suara</td>

                    @if ($opsi == 'isi')
                        <td style="font-weight: bold;">{{ $i }}</td>
                    @else
                        <td></td>
                    @endif
                </tr>
            </tbody>
        </table>
    @else

    <table class="full-width-table" style="border: 2px solid black;">
        <thead>
            <tr style="background-color: {!! $color !!}">
                <th colspan="3" style="font-size: 30px; border: 2px solid black;">
                   {{ $type }}
                </th>
            </tr>
            <tr>
                <th colspan="3" style="border-top: none; border-bottom: none; font-size: 20px;">
                    {{ $tps->nama }}
                </th>
            </tr>
            <tr>
                <th colspan="3" style="border-top: none;">
                     ({{ $desa->nama }},{{ $desa->kecamatan->nama }})
                </th>
            </tr>
            <tr>
                <th>No.</th>
                <th>Nama Calon</th>
                <th>Suara</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i=0;
            @endphp
            @foreach (App\Models\Calon::orderBy('no', 'asc')->where('type',$type)->where('is_active',true)->where('tps_id',$tps->id)->get() as $calon)
            @php
                    $i=$i+$calon->suara;
                @endphp
            <tr>
            @if ($calon->no == 0)
                <td>-</td>
                <td style="font-weight: bold;">{{ $calon->nama }}</td>
            @else
                <td>{{ $calon->no }}</td>
                <td>{{ $calon->nama }}</td>
            @endif

            @if ($opsi == 'isi')
                <td>{{ $calon->suara }}</td>
            @else
                <td></td>
            @endif
            </tr>
            @endforeach
            <tr style="border: 2px solid black;">
                <td>-</td>
                <td style="font-weight: bold;">Total Suara</td>

                @if ($opsi == 'isi')
                    <td style="font-weight: bold;">{{ $i }}</td>
                @else
                    <td></td>
                @endif
            </tr>
        </tbody>
    </table>
    @endif
    {{-- <div class="page-break"></div> --}}
</body>

</html>
