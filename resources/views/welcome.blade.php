<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <!-- Styles -->
</head>
<body class="antialiased">
<div class="col-lg-12 d-flex justify-content-center align-items-center">
    <form action="{{route('find-hidden-number')}}" method="POST">
        @csrf
        <div class="col-lg-12">
            <h3 class="form-label text-primary text-center m-3">Guess the Hidden Number</h3>
            <input name="hiddenNum" type="text" class="form-control" value="{{old('hiddenNum')}}"/>
            @if(session('successMsg'))
                <p class="text-center text-success">
                    {{ session('successMsg') }}
                </p>
                @if(session('step'))
                    <p class="text-center text-secondary">
                        Your step is
                        {{ session('step') }}
                    </p>
                @endif
            @endif

            @if(session('errorMsg'))
                <p class="text-center text-danger">
                    {{ session('errorMsg') }}
                </p>
            @endif
            @error('hiddenNum')
            <div class="text-danger">{{ $message }}</div>
            @enderror

            <div class="col-lg-12 d-flex justify-content-end mt-3">
                <button type="submit" class="btn btn-primary">Find</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>
