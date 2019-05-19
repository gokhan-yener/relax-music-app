@extends("layout")
@section("content")

    <main role="main">
        <div class="container text-center mt-2 mb-2">
            <h1>Kategori Detay</h1>
        </div>
        <div class="album bg-light">

            <div class="container">

                <div class="row">
                    <div class="col-md-4 "></div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card mb-12 shadow-lg">

                                    @foreach($songs as $song)
                                        <div class="card-body">

                                            <div class="d-flex justify-content-between align-items-center">
                                                <img src='{{asset("images/".$song->category->img)}}' height="180"
                                                     alt="">
                                            </div>
                                            <small class="text-muted">{{$song->name}}</small>
                                            <span class="float-right" style="cursor:pointer;"
                                                  onclick="favAdd( {{$song->id }} )">
                                                    <i class="fa fa-heart fa-2x"></i>
                                                </span>

                                            <input type="hidden" id="_token" name="_token" value="{{ $token }}">
                                        </div>
                                </div>
                                @endforeach
                            </div>
                            <p class="text-center">
                                <a href="/api/favourite" class="btn btn-primary ">Favorilerim</a>
                                <a href="/api/library" class="btn btn-secondary">Kitaplık</a>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4"></div>
                </div>
            </div>
        </div>

    </main>
@endsection

@section('js')
    <script src="{{asset('js/api.js')}}"></script>

@endsection

