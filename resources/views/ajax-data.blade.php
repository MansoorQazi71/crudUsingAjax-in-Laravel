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
    <table id="table" border="1">
        <tr>
            <th>
                Sr.No
            </th>    
            <th>
                Name
            </th>    
            <th>
                Email
            </th>    
            <th>
                File
            </th>   
            <th>
                Action
            </th>   
        </tr>
        <td>
    </table> 
    <script>
        $(document).ready(function()
        {
            console.log("script working");
$.ajax({
    type:"GET",
    url:"{{route('ajaxData')}}",
    success:function(data)
    {
        if(data.AjaxModel.length>0)
        {
            for(let i=0;i<data.AjaxModel.length;i++)
            {
                let img= data.AjaxModel[i]['file'];
                $("#table").append(`<tr>
                    <td>`+(i+1)+`</td>
                    <td> `+(data.AjaxModel[i]['name']) +`</td>
                    <td> `+(data.AjaxModel[i]['email']) +`</td>
                    <td> 
                        <img src="{{asset('/`+img+`')}}" alt="`+img+`" width="100px" height="100px"/>
                    </td>  
                    <td> 
                        <a href="editAjaxData/`+(data.AjaxModel[i]['id']) +`" >Edit</a>
                    </td>  
                        </tr>`)
                    }
                }
                else
                {
                    $("#table").append("<tr><td>Data not found</td></tr>")
                }
            },
            error:function(e)
            {
                console.log(e.responseText);
            }
        });
    });
    </script>
</body>
</html>
{{-- `+(data.AjaxModel[i]['file']) +`</td> --}}
{{-- <img src="{{ asset('storage/') }}/${img}" alt="${img}" width="100px" height="100px"/> --}}