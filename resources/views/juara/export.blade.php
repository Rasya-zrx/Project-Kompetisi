<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th>id</th>                               
                                    <th>peringkat User</th>
                                    <th>regist id</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($juara as $data)
                                    <tr class="text-center">
                                        @if (Auth::user()->role == 'admin')
                                        <th>{{ $data->id }}</th>
                                        @endif
                                        <th>{{ $data->keterangan_peringkat }}</th>
                                        <td>{{ $data->registrasi_id }}</td>                                   
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>