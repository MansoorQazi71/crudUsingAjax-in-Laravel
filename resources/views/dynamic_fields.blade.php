<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
    </script>
</head>

<body>
    <div class="mb-3">
        <button class="btn btn-primary addField">Add fields</button>

    </div>
    <form id="my-form" action="saveData" enctype="multipart/form-data" method="POST">
        @csrf
        <div>
            <div class="append">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Enter name</label>
                    <input type="text" autocomplete="given-name"
                        class="form-control @error('name') is-invalid @enderror" id="name" name="names[]"
                        aria-describedby="emailHelp">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email email</label>
                    <input type="email" autocomplete="given-name" class="form-control" id="email" name="emails[]"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">upload file</label>
                    <input type="file" autocomplete="given-name" class="form-control" id="file" name="filess[]">
                </div>
            </div>
        </div>
        <button type="submit" id="btnSubmitt" class="btn btn-primary">Submit</button>
    </form>
    <script>
        $(document).ready(function() {
            //to add new row
            $('.addField').click(function() {

                $('.append').parent().append(`
<div>
                <div class="mb-3">
                    <button type="button" class="btn btn-danger deleteRow">Remove</button>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Enter name</label>
                    <input type="text" autocomplete="given-name" class="form-control @error('name') is-invalid @enderror" id="name" name="names[]" aria-describedby="emailHelp">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email email</label>
                    <input type="email" autocomplete="given-name" class="form-control" id="email" name="emails[]" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">upload file</label>
                    <input type="file" autocomplete="given-name" class="form-control" id="file" name="filess[]">
                </div>
                </div>
            `);
            });

            //to remove fields
            $(document).on('click', '.deleteRow', function() {
                $(this).parent().parent().remove();
            });
        });

    </script>

</body>

</html>