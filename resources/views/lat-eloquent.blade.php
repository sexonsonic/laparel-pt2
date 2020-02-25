<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Latihan Eloquent</title>
</head>
<body>
        @extends('layouts.template')
        @section('konten')
            <h3>{{ $mahasiswa->nama }}</h3>
        <h4>Hobi :
            @foreach ($mahasiswa->hobi as $hi)
                {{ $hi->hobi }},
            @endforeach
        </h4>
        <strong>
            <li>Nama Wali : {{ $mahasiswa->wali->nama }}</li>
            <li>Nama Dosen : {{ $mahasiswa->dosen->nama }} </li>
        </strong>
        <hr>

        @endsection

</body>
</html>
