<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Latihan Eloquent</title>
</head>
<body>
    @foreach ($mahasiswa as $lat)
        <h3>{{ $lat->nama }}</h3>
        <h4>Hobi :
            @foreach ($lat->hobi as $hi)
                {{ $hi->hobi }},
            @endforeach
        </h4>
        <strong>
            <li>Nama Wali : {{ $lat->wali->nama }}</li>
            <li>Nama Dosen : {{ $lat->dosen->nama }} </li>
        </strong>
        <hr>
    @endforeach

</body>
</html>
