
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="{{ URL::asset('/assets/admin.png') }}/" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Admin Panel</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="{{ URL::asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="{{ URL::asset('/assets/css/material-dashboard.css') }}" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ URL::asset('/assets/css/demo.css') }}" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    @yield('style')
</head>

<body>
<style>
    body.modal-open div.modal-backdrop {
        z-index: 0;
    }
    #confirm{
        color: white;
    }
</style>

<div class="wrapper">
@include('backend.layouts.sidebar')



        @yield('content')

        <footer class="footer">
            <div class="container-fluid">

                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="#">Yatri Nepal</a>
                </p>
            </div>
        </footer>
    </div>
</div>


</body>

<!--   Core JS Files   -->
<script src="/assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
<script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/assets/js/material.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="../assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="/assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!-- Material Dashboard javascript methods -->
<script src="/assets/js/material-dashboard.js"></script>

<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="/assets/js/demo.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

        // Javascript method's body can be found in assets/js/demos.js

        /* demo.initDashboardPageCharts();*/
        $(document).on('change','.country',function(){
            console.log("hmm its change");

            var country_id=$(this).val();
            console.log(country_id);
            var div=$(this).parent();

            var op=" ";

            $.ajax({
                type:'get',
                url:'{!!URL::to('admin/findDestinationName')!!}',
                data:{'id':country_id},
                success:function(data){
                    console.log('success');
                    console.log(data);
                    var length = Object.keys(data).length
                    console.log(length);

                    op+='<option value="0" selected disabled>select destination</option>';
                    for(var i = 0; i < length; i++){
                        op+='<option value="'+data[i].id+'">'+data[i].title+'</option>';
                    }

                    $('.destination').html(op);

                    div.find('.destination').html(" ");
                    div.find('.destination').append(op);
                },
                error:function(){

                }
            });
        });

        $(document).on('change','.destination',function(){
            console.log("hmm its change");

            var destination_id = $(this).val();
            console.log(destination_id);
            var d = $(this).parent();

            var op=" ";

            $.ajax({
                type:'get',
                url:'{!!URL::to('admin/findRegionName')!!}',
                data:{'id':destination_id},
                success:function(result){
                    console.log('success');
                    console.log(result);
                    var length = Object.keys(result).length
                    console.log(length);


                    op+='<option value="0" selected disabled>select region</option>';
                    for(var i = 0; i < length; i++){
                        op+='<option value="'+result[i].id+'">'+result[i].title+'</option>';
                    }

                    $('.region').html(op);

                    d.find('.region').html(" ");
                    d.find('.region').append(op);
                },
                error:function(){

                }
            });
        });

        $(document).on('change','.region',function(){
            console.log("hmm its change");

            var region_id = $(this).val();
            console.log(region_id);
            var d = $(this).parent();

            var op=" ";

            $.ajax({
                type:'get',
                url:'{!!URL::to('admin/findActivityName')!!}',
                data:{'id':region_id},
                success:function(answer){
                    console.log('success');
                    console.log(answer);
                    var length = Object.keys(answer).length
                    console.log(length);


                    for(var i = 0; i < length; i++){
                        op+='<option value="'+answer[i].id+'">'+answer[i].title+'</option>';
                    }

                    $('.activity').html(op);

                    d.find('.activity').html(" ");
                    d.find('.activity').append(op);
                },
                error:function(){

                }
            });
        });

        c

    });

</script>

<script>
    var route_prefix = "{{ url(config('lfm.prefix')) }}";
</script>

<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>



<script>
    $('textarea').ckeditor({
        height: 100,
        filebrowserImageBrowseUrl: route_prefix + '?type=Images',
        filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
        filebrowserBrowseUrl: route_prefix + '?type=Files',
        filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
    });
</script>



<script>
    {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
</script>
<script>
    $('#lfm').filemanager('image', {prefix: route_prefix});
</script>

</html>
