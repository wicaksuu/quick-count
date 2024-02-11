<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ $title }}</title>
    @include('desa.dprd.css')
</head>

<body>
@foreach ($tpss as $tps)
    @if ($pemilu == 'Pileg')
        @foreach ($partais as $partai)
        <table class="full-width-table">
            <thead>
                <tr>
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
                @foreach (App\Models\Calon::orderBy('no', 'asc')->where('type',$type)->where('is_active',true)->where('tps_id',$tps->id)->where('partai_id',$partai->id)->get() as $calon)
                <tr>
                    @if ($calon->no == 0)
                        <td>-</td>
                        <td style="font-weight: bold;">{{ $calon->nama }}</td>
                    @else
                        <td>{{ $calon->no }}</td>
                        <td>{{ $calon->nama }}</td>
                    @endif
                    <td>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td>-</td>
                    <td style="font-weight: bold;">Total Suara</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        @endforeach
    @else

    <table class="full-width-table">
        <thead>
            <tr>
                <th colspan="3" style="font-size: 30px; border-bottom: none;">
                   {{ $type }}
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
            @foreach (App\Models\Calon::orderBy('no', 'asc')->where('type',$type)->where('is_active',true)->where('tps_id',$tps->id)->get() as $calon)
            <tr>
                @if ($calon->no == 0)
                    <td>-</td>
                    <td style="font-weight: bold;">{{ $calon->nama }}</td>
                @else
                    <td>{{ $calon->no }}</td>
                    <td>{{ $calon->nama }}</td>
                @endif
                <td>
                </td>
            </tr>
            @endforeach
            <tr>
                <td>-</td>
                <td style="font-weight: bold;">Total Suara</td>
                <td></td>
            </tr>
        </tbody>
    </table>
    @endif
    <div class="page-break"></div>
@endforeach
</body>

</html>
