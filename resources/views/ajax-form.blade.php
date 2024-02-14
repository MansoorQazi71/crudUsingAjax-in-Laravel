<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Form submittion using Ajax</title>
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
    <form id="myForm" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="Enter Name" required>
        <br><br><br>
        <input type="email" name="email" placeholder="Enter email" required>
        <br><br><br>
        <input type="file" name="file"  required>
        <br><br><br>
        <button type="submit" id="btnSubmit">
            Submitt
        </button>
        <button type="button" id="">
           <a href="{{route('ajaxdata')}}"> View</a>
        </button>
    </form>
    <span id="output"></span>
    <script>
        $(document).ready(function(){
            $("#myForm").submit(function(e){
                e.preventDefault();

                var form = $("#myForm")[0];
                var data = new FormData(form);
                $("#btnSubmit").prop("disabled",true);

                $.ajax({
                    type:"POST",
                    url:"{{route("addAjax")}}",
                    data:data,
                    processData:false,
                    contentType:false,

                    success:function(data)
                    {
                        $("#output").text(data.res);
                        $("input[type='text']").val(' ');
                        $("input[type='email']").val(' ');
                        $("input[type='file']").val(' ');
                        $("#btnSubmit").prop("disabled",false);
                    },
                    error:function(e){
                        $("#output").text(e.responseText);
                        $("input[type='text']").val(' ');
                        $("input[type='email']").val(' ');
                        $("input[type='file']").val(' ');
                        $("#btnSubmit").prop("disabled",false);
                    }
                })
            });
        });
    </script>
</body>
</html>