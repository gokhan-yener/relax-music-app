@extends("layout")
@section("content")

    <main role="main">
            <div class="container text-center mt-2 mb-2">
                <h1>Kitaplık</h1>
            </div>
        <div class="album bg-light">

            <div class="container">

                <div class="row">
                    <div class="col-md-4 "></div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                @foreach($categories as $category)
                                <div class="card mb-12 shadow-lg">
                                    <div class="card-body">
                                        <a href="{{url("api/category/$category->id")}}">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <img src="{{asset("images/$category->img")}}" height="180" width="200" alt="">
                                            </div>
                                            <small class="text-muted">{{$category->name}}</small>
                                        </a>
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

