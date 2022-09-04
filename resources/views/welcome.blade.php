<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Files</title>
    </head>
    <body>
        <h1>Importar datos</h1>

        <form action="{{ route('province.import.excel') }}" method="post" enctype="multipart/form-data">
            @csrf
            
            @if(Session::has('message'))
            <p>{{ Session::get('message') }}</p>
            @endif

            <input type="file" name="file">

            <button>Importar Usuarios</button>
        </form>

        <h1>Importar datos ciudades</h1>

        <form action="{{ route('city.import') }}" method="post" enctype="multipart/form-data">
            @csrf
            
            @if(Session::has('message'))
            <p>{{ Session::get('message') }}</p>
            @endif

            <input type="file" name="file">

            <button>Importar ciudades</button>
        </form>

        <h1>Importar datos parroquias</h1>

        <form action="{{ route('parish.import') }}" method="post" enctype="multipart/form-data">
            @csrf
            
            @if(Session::has('message'))
            <p>{{ Session::get('message') }}</p>
            @endif

            <input type="file" name="file">

            <button>Importar parroquias</button>
        </form>


    </body>
</html>









