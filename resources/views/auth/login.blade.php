<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <!-- Toast -->
<link rel="stylesheet" type="text/css" href="{{ asset('admin_assets') }}/libs/toastr/build/toastr.min.css">
    <style>
        @import url("https://fonts.googleapis.com/css?family=Fira+Sans");

        html,
        body {
            position: relative;
            min-height: 90vh;
            background-color: #E1E8EE;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: "Fira Sans", Helvetica, Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .form-structor {
            background-color: #222;
            border-radius: 15px;
            height: 500px;
            width: 350px;
            position: relative;
            overflow: hidden;
        }

        .form-structor::after {
            content: "";
            opacity: 0.8;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-repeat: no-repeat;
            background-position: left bottom;
            background-size: cover;
        }

        .form-structor .login-form {
            position: absolute;
            top: 44%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            width: 65%;
            z-index: 5;
            -webkit-transition: all 0.3s ease;
        }

        .form-structor .login-form.slide-up {
            top: 5%;
            -webkit-transform: translate(-50%, 0%);
            -webkit-transition: all 0.3s ease;
        }

        .form-structor .login-form.slide-up .form-holder,
        .form-structor .login-form.slide-up .submit-btn {
            opacity: 0;
            visibility: hidden;
        }

        .form-structor .login-form.slide-up .form-title {
            font-size: 1em;
            cursor: pointer;
        }

        .form-structor .login-form.slide-up .form-title span {
            margin-right: 5px;
            opacity: 1;
            visibility: visible;
            -webkit-transition: all 0.3s ease;
        }

        .form-structor .login-form .form-title {
            color: #fff;
            font-size: 1.7em;
            text-align: center;
        }

        .form-structor .login-form .form-title span {
            color: rgba(0, 0, 0, 0.4);
            opacity: 0;
            visibility: hidden;
            -webkit-transition: all 0.3s ease;
        }

        .form-structor .login-form .form-holder {
            border-radius: 15px;
            background-color: #fff;
            overflow: hidden;
            margin-top: 50px;
            opacity: 1;
            visibility: visible;
            -webkit-transition: all 0.3s ease;
        }

        .form-structor .login-form .form-holder .input {
            border: 0;
            outline: none;
            box-shadow: none;
            display: block;
            height: 30px;
            line-height: 30px;
            padding: 8px 15px;
            border-bottom: 1px solid #eee;
            width: 100%;
            font-size: 12px;
        }

        .form-structor .login-form .form-holder .input:last-child {
            border-bottom: 0;
        }

        .form-structor .login-form .form-holder .input::-webkit-input-placeholder {
            color: rgba(0, 0, 0, 0.4);
        }

        .form-structor .login-form .submit-btn {
            background-color: rgba(0, 0, 0, 0.4);
            color: rgba(255, 255, 255, 0.7);
            border: 0;
            border-radius: 15px;
            display: block;
            margin: 15px auto;
            padding: 15px 45px;
            width: 100%;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            opacity: 1;
            visibility: visible;
            -webkit-transition: all 0.3s ease;
        }

        .form-structor .login-form .submit-btn:hover {
            transition: all 0.3s ease;
            background-color: rgba(0, 0, 0, 0.8);
        }

        .form-structor .login {
            position: absolute;
            top: 20%;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #fff;
            z-index: 5;
            -webkit-transition: all 0.3s ease;
        }

        .form-structor .login::before {
            content: "";
            position: absolute;
            left: 50%;
            top: -20px;
            -webkit-transform: translate(-50%, 0);
            background-color: #fff;
            width: 200%;
            height: 250px;
            border-radius: 50%;
            z-index: 4;
            -webkit-transition: all 0.3s ease;
        }

        .form-structor .login .center {
            position: absolute;
            top: calc(50% - 10%);
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            width: 65%;
            z-index: 5;
            -webkit-transition: all 0.3s ease;
        }

        .form-structor .login .center .form-title {
            color: #000;
            font-size: 1.7em;
            text-align: center;
        }

        .form-structor .login .center .form-title span {
            color: rgba(0, 0, 0, 0.4);
            opacity: 0;
            visibility: hidden;
            -webkit-transition: all 0.3s ease;
        }

        .form-structor .login .center .form-holder {
            border-radius: 15px;
            background-color: #fff;
            border: 1px solid #eee;
            overflow: hidden;
            margin-top: 50px;
            opacity: 1;
            visibility: visible;
            -webkit-transition: all 0.3s ease;
        }

        .form-structor .login .center .form-holder .input {
            border: 0;
            outline: none;
            box-shadow: none;
            display: block;
            height: 30px;
            line-height: 30px;
            padding: 8px 15px;
            border-bottom: 1px solid #eee;
            width: 100%;
            font-size: 12px;
        }

        .form-structor .login .center .form-holder .input:last-child {
            border-bottom: 0;
        }

        .form-structor .login .center .form-holder .input::-webkit-input-placeholder {
            color: rgba(0, 0, 0, 0.4);
        }

        .form-structor .login .center .submit-btn {
            background-color: #6B92A4;
            color: rgba(255, 255, 255, 0.7);
            border: 0;
            border-radius: 15px;
            display: block;
            margin: 15px auto;
            padding: 15px 45px;
            width: 100%;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            opacity: 1;
            visibility: visible;
            -webkit-transition: all 0.3s ease;
        }

        .form-structor .login .center .submit-btn:hover {
            transition: all 0.3s ease;
            background-color: rgba(0, 0, 0, 0.8);
        }

        .form-structor .login.slide-up {
            top: 90%;
            -webkit-transition: all 0.3s ease;
        }

        .form-structor .login.slide-up .center {
            top: 10%;
            -webkit-transform: translate(-50%, 0%);
            -webkit-transition: all 0.3s ease;
        }

        .form-structor .login.slide-up .form-holder,
        .form-structor .login.slide-up .submit-btn {
            opacity: 0;
            visibility: hidden;
            -webkit-transition: all 0.3s ease;
        }

        .form-structor .login.slide-up .form-title {
            font-size: 1em;
            margin: 0;
            padding: 0;
            cursor: pointer;
            -webkit-transition: all 0.3s ease;
        }

        .form-structor .login.slide-up .form-title span {
            margin-right: 5px;
            opacity: 1;
            visibility: visible;
            -webkit-transition: all 0.3s ease;
        }

        .form-check {
            margin-top: 10px;
            font-size: 13px;
            color: white;
        }
    </style>
</head>

<body>
    <form id="formLogin">
    <div class="form-structor">
        <div class="login-form">
            <h2 class="form-title" id="login-title">Login</h2>
            <div class="form-holder">
                <input type="text" name="username" class="input" placeholder="Username" required/>
                <input id="password" type="password" name="password" class="input" placeholder="Password" required/>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" onclick="showPassword()" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Show Password
                </label>
            </div>
            <button class="submit-btn">Login</button>
        </div>
        <div class="login slide-up home-btn">
            <div class="center">
            </div>
        </div>
    </div>
    </form>

    <script src="{{ asset('admin_assets') }}/libs/jquery/jquery.min.js"></script>
    <!-- toastr plugin -->
    <script src="{{ asset('admin_assets') }}/libs/toastr/build/toastr.min.js"></script>
    <script>
        $('.home-btn').click(function (e) {
            e.preventDefault()
            location.href = "/";
        });

        function showPassword() {
            var password_input = document.getElementById("password");
            console.log(password_input)
            if (password_input.type == "password") {
                password_input.type = "text";
            } else {
                password_input.type = "password";
            }
        }

        $('.submit-btn').click(function (e) {
            e.preventDefault()

            var username = $('[name="username"]').val();
            var password = $('[name="password"]').val();
            if (username == null || username == '') {
                return toastr["error"]("Username dan Password tidak boleh kosong", "Gagal!")
            }

            if (password == null || password == '') {
                return toastr["error"]("Username dan Password tidak boleh kosong", "Gagal!")
            }

            var url = '{!! route('authenticate') !!}';
            var sendData = $("#formLogin").serialize();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
                url: url,
                method: 'POST',
                data: sendData,
                dataType: 'json',
                beforeSend: function () {
                    $('#submit-btn').attr('disabled', 'disabled');
                },
                success: function (response) {
                    $('#submit-btn').removeAttr('disabled');
                    toastr[response.type](response.msg, response.title)
                    if (response.status == 202) {
                        
                        window.setTimeout(function () {
                            location.reload();
                        }, 1300);
                    } else {
                        $('[name="password"]').val('');
                    }
                },
                error: function (response) {
                    // do something					
                }
            });

            

        });
    </script>
</body>

</html>