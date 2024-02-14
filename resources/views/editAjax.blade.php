<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <img src="/{{$data[0]->file}}" width="100px" height="100px" />
    <form id="updateForm" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" value="{{$data[0]->name}}" placeholder="Enter Name" required>
        <br><br><br>
        <input type="email" name="email" value="{{$data[0]->email}}" placeholder="Enter email" required>
        <br><br><br>
        <input type="file" name="file">
        <input type="hidden" name="id" value="{{$data[0]->id}}">
        <br><br><br>
        <button type="submit" id="">
            Submitt
        </button>
        <button type="button" id="">
            <a href="{{route('ajaxdata')}}"> View</a>
        </button>
    </form>
    <span id="output"></span>
    <script>
        $(document).ready(function() {
            console.log("ajax script");
            $("#updateForm").submit(function(e) {
                e.preventDefault()
                
                var form = $("#updateForm")[0];
                var data = new FormData(form);
                $.ajax({
                    
                    type: "POST",
                    url: "{{route('updateAjaxData')}}",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        $("#output").text(data.result);
                        // window.open("/ajaxdata","_self");
                    }
                    , error: function(err) {
                        $("#output").text(err.responseText);
                    }
                });
            });
            console.log("ajax script");
        });

    </script>
</body>
</html>
