<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <title>Hello, world!</title>
</head>

<body>
    <div class="container mt-3">
        <h1>heelo hi</h1>
        <input type="text" class="form-control" id="text_field">
        <p></p>
    </div>


    <script>
        $(document).ready(function(){

        
        $('body').on('onblur','#text_field',function () {
            var value = $("#text_field").val()
            console.log(value)
            var url = "{{ url('ajax_test') }}"

            setTimeout(function afterTwoSeconds() {
                // $.ajax({
                // method:'GET',
                // url: url ,
                // data: value,
                // success: (data)=>{
                // console.log(data)
                // //alert('succes')
                // },
                // error: function(data){
                // alert('error')
                // }
                // });
                console.log('after = '+value)
            }, 2000)
           
        });
       
      });
    </script>


</body>

</html>