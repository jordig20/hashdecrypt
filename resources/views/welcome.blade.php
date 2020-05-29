<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Hashdecrypt</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!-- FontAwesome JS -->

    <script defer src={{ URL::asset('assets/fontawesome/js/all.js') }}></script>
    <!-- Global CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/elegant_font/css/style.css') }}">
    <!-- Theme CSS -->
    <link id="theme-style" rel="stylesheet" href="{{ URL::asset('assets/css/styles.css') }}">

</head>

<body class="landing-page">

    <div class="page-wrapper">

        <!-- ******Header****** -->
        <div class="header text-center">
            <div class="container">
                <div class="branding">
                    <h1 class="logo">
                        <i class="fas fa-hashtag icon" aria-hidden="true"></i>
                        <span class="text-highlight">Hash</span><span class="text-bold">Decrypt</span>
                        <i class="fas fa-hashtag" aria-hidden="true"></i>
                    </h1>
                </div><!--//branding-->
                <div class="tagline">
                    <p>Tradueix a Hash</p>
                </div><!--//tagline-->

	             <div class="main-search-box pt-3 pb-4 d-inline-block">
	                 <form class="form-inline search-form justify-content-center" action="{{{ url("encrypt") }}}" method="get">
                        <input type="text" placeholder="Introdueix el text pla..." name="text" class="form-control search-input">
                        <select name="hash" class="form-control" style="border-radius: 20px; margin-left: 5px">
                            @foreach(hash_algos() as $hash)
                                <option value='{{ $hash }}'>{{ $hash }}</option>
                            @endforeach
                        </select>
			            <button type="submit" class="btn" value="Search" style="color: white"><i class="fas fa-search"></i></button>
			        </form>
	                </div>
                </div>
            </div>



    <!-- Main Javascript -->
    <script type="text/javascript" src="{{ URL::asset('assets/plugins/jquery-3.4.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/plugins/stickyfill/dist/stickyfill.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/main.js') }}"></script>

</body>
</html>


