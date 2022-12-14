<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title>Pendaftaran Mahasiswa Baru</title>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha512-bnIvzh6FU75ZKxp0GXLH9bewza/OIw6dLVh9ICg0gogclmYGguQJWl8U30WpbsGTqbIiAwxTsbe76DErLq5EDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
    {{-- header belum lengkap --}}
<body>
    <div class="container p-3 my-3 border">
        <h1>Soal</h1>
        <form id="form" method="post" action="{{route('soal.submit')}}">
            @csrf
            @forelse ($soal as $value => $item)
            <p>No {{$value + 1}}. {{$item->soal}}</p>
            <input type="hidden" name="no[{{$value+1}}]" value="{{$item->id}}">
            @php
                                $jawaban = $item->pilihan_jawaban;
                                $pilihanJawaban = explode("," , $jawaban);
                                shuffle($pilihanJawaban);
                                @endphp
                                @foreach ($pilihanJawaban as $i)
                                <input type="radio" id="{{$i}}" name="jawaban[{{$value+1}}]" value="{{$i}}">
                                <label for="{{$i}}">{{$i}}</label><br>
                                @endforeach
                @empty
                <h1>Soal Belum Ada</h1>
                @endforelse
                <hr/>
                                <button type="submit" name="Submit" id="Submit" class="btn btn-primary">Simpan</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
        </form>
    </div>
</body>
</html>