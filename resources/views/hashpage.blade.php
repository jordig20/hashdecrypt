<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>{{$spin}}</title>
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
    <body>
    @include('welcome')
    <div class="container">
        <div class="card mt-4">
            <div class="card-header ">
                <div class="container">
                    <div class="row">
                        <div class="col-10">
                            <h3 class="text-left">El hash {{$hash}} de {{$encrypt}} es {{$textPlain}}</h3>
                        </div>
                        <div class="col-2">
                            <div class="text-right">
                                <a href="{{ URL::previous() }}" class="btn btn-green btn-lg active -pull-right" role="button" aria-pressed="true">
                                    <i class="fas fa-arrow-left icon" aria-hidden="true" style="text-align: right"></i></a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="card-body">
                @foreach ($dades as $data)
                    <div class="row">
                        <div class="col-md-1">{{$data[0]}}</div>
                        <div class="col-md-1">{{$data[1]}}</div>
                        <div class="col-md-10">
                            <a href="{{route('hashpage',[$data[0],$data[2],$textPlain])}}">{{$data[2]}}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="card" style="margin-top: 2%">
            <div class="card-header">
                <h5>Comentaris</h5>
            </div>
            <div class="card-body">
                @foreach ($comments as $comment)
                    <div class="card text-center" style="margin-bottom: 1%">
                        <div class="card-header">
                            <ul class="nav nav-pills card-header-pills">
                                <li class="nav-item">
                                    <p>Usuari: <strong>{{ $comment->user->name }}</strong></p>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body" style="text-align: left">
                            {{$comment->content}}
                        </div>
                            @if(Auth::user() != null && Auth::user()->isAdmin())
                                    <button class="btn btn-warning" href="{{ url('comment/edit/'.$comment->id) }}">Edita</button>
                                    <form method="POST" action="{{ url('comment/destroy/'.$comment->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Esborra</button>
                                    </form>
                            @endif
                    </div>
                @endforeach
                @if(Auth::user() != null)
                    <div class="card-footer mt-5">
                        <form action="{{ route('comment.store') }}">
                            <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                            <textarea rows="5" cols="50" id="content" name="content"></textarea>
                            <input type="submit" value="Create">
                        </form>
                    </div>
                @endif
                @guest
                    <div class="card-body">
                        <p><a href="{{ route('login') }}">Autenticat si vols escriure</a> comentaris. O crea un compte <a href="{{ route('register') }}">aquí</a>.</p>
                    </div>
                @endguest
            </div>
        </div>
    </div>
    </body>
</html>
