<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>My Login Page</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/my-login.css')}}">
</head>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('layui/layui.js')}}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    layui.use('element', function(){
        var element = layui.element;
    });
</script>
<body class="my-login-page">
<section class="h-100">
    <div class="container h-100">
        <div class="row justify-content-md-center h-100">
            <div class="card-wrapper">
                <div class="brand">
                    <img src="{{asset('img/logo.jpg')}}" alt="logo">
                </div>
                <div class="card fat">
                    <div class="card-body">
                        <h4 class="card-title">Login</h4>
                        <form  class="my-login-validation" novalidate="">
                            <div class="form-group">
                                <label for="email">Username</label>
                                <input id="username" type="text" class="form-control" name="username" value="" required autofocus>
                                <div class="invalid-feedback">
                                    Username is Required
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password">Password
                                </label>
                                <input id="passwd" type="passwd" class="form-control" name="password" required data-eye>
                                <div class="invalid-feedback">
                                    Password is required
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="custom-checkbox custom-control">
                                    <input type="checkbox" name="remember" id="remember" class="custom-control-input">
                                    <label for="remember" class="custom-control-label">Remeber Me</label>
                                </div>
                            </div>

                            <div class="form-group m-0">
                                <button type="button" class="btn btn-primary btn-block login-btn">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="footer">
                    Copyright &copy; 2017 &mdash; Link To Cloud Company
                </div>
            </div>
        </div>
    </div>
</section>


<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script>
    $(function() {
        $('.login-btn').click(function(){

            var form = $(".my-login-validation");
            if (form[0].checkValidity() === false) {
                form.addClass('was-validated');
                return false;
            }
            //加载商品列表
            $.ajax({
                type: "post",
                url: "checkLogin",
                data: {
                    username: $('#username').val(),
                    passwd: $('#passwd').val()
                },
                dataType: "json",
                success: function(res){
                    if(res.code != 0) {
                        layer.msg(res.msg);
                    }
                    window.location.reload();
                }
            });
        })

        $("input[type='password'][data-eye]").each(function(i) {
            var $this = $(this),
                id = 'eye-password-' + i,
                el = $('#' + id);

            $this.wrap($("<div/>", {
                style: 'position:relative',
                id: id
            }));

            $this.css({
                paddingRight: 60
            });
            $this.after($("<div/>", {
                html: 'Show',
                class: 'btn btn-primary btn-sm',
                id: 'passeye-toggle-'+i,
            }).css({
                position: 'absolute',
                right: 10,
                top: ($this.outerHeight() / 2) - 12,
                padding: '2px 7px',
                fontSize: 12,
                cursor: 'pointer',
            }));

            $this.after($("<input/>", {
                type: 'hidden',
                id: 'passeye-' + i
            }));

            var invalid_feedback = $this.parent().parent().find('.invalid-feedback');

            if(invalid_feedback.length) {
                $this.after(invalid_feedback.clone());
            }

            $this.on("keyup paste", function() {
                $("#passeye-"+i).val($(this).val());
            });
            $("#passeye-toggle-"+i).on("click", function() {
                if($this.hasClass("show")) {
                    $this.attr('type', 'password');
                    $this.removeClass("show");
                    $(this).removeClass("btn-outline-primary");
                }else{
                    $this.attr('type', 'text');
                    $this.val($("#passeye-"+i).val());
                    $this.addClass("show");
                    $(this).addClass("btn-outline-primary");
                }
            });
        });
    });


</script>
</body>
</html>
