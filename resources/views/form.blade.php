<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>


</head>

<body>
    <div class="container">
        @if($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
        @endif
        <form id="my-form" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Enter name</label>
                <input type="text" autocomplete="given-name" class="form-control @error('name') is-invalid @enderror" id="name" name="name" aria-describedby="emailHelp">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email email</label>
                <input type="email" autocomplete="given-name" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">upload file</label>
                <input type="file" autocomplete="given-name" class="form-control" id="file" name="file">
            </div>
            <button type="submit" id="btnSubmitt" class="btn btn-primary">Submit</button>
        </form>
        <span id="output">

        </span>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            console.log("script working");
            $("#my-form").submit(function(event) {
                event.preventDefault();

                var form = new FormData(this);

                $.ajax({
                    type: "POST"
                    , url: "{{ route('getData') }}"
                    , data: form
                    , contentType: false
                    , processData: false
                    , success: function(response) {
                        console.log(response.data);
                        $("#output").text(response.data);
                        // $("#btnSubmitt").prop("disabled", false);
                    }
                    , error: function(e) {
                        $("#output").text(e.responseText);
                        // $("#btnSubmitt").prop("disabled", false);
                    }
                });
            });
        });

    </script>
</body>

</html>
