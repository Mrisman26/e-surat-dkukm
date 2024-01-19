<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Surat Keluar</title>
</head>

<body>

    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h4 class="text-center">Laporan Surat Keluar</h4>
                    <table class="table table-bordered border-dark">
                        <thead>
                            <th style="align-middle">No.</th>
                            <th style="align-middle">No. Surat</th>
                            <th style="align-middle">Tanggal Surat</th>
                            <th style="align-middle">Tujuan Surat</th>
                            <th style="align-middle">Isi Surat</th>
                            <th style="align-middle">Nama File</th>
                            <th style="align-middle">perihal</th>
                        </thead>
                        <tbody>
                            @if ($cetak)
                            @foreach ($cetak as $item)
                                <tr>
                                    <td class="align-middle">{{$loop->iteration}}</td>
                                    <td style="align-middle">{{ $item->nosurat }}</td>
                                    <td style="align-middle">{{ $item->tglsurat }}</td>
                                    <td style="align-middle">{{ $item->tujuan }}</td>
                                    <td style="align-middle">{{ $item->isisurat }}</td>
                                    <td style="align-middle">{{ $item->original_name }}</td>
                                    <!-- Tambahkan field-table yang lain sesuai dengan kebutuhan -->
                                    <td style="align-middle">{{ $item->perihal }}</td>
                                    {{--  <td>
                                        <a href="{{ route('suratmasuk.print', $item->idsuratmasuk) }}" class="btn btn-primary">Print</a>
                                        <!-- Tambahkan tombol-tombol aksi lainnya sesuai dengan kebutuhan -->
                                    </td>  --}}
                                </tr>
                                @endforeach
                                @else
                                Data Kosong
                                @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script>
        window.print();
        window.onafterprint = window.close;
    </script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>
