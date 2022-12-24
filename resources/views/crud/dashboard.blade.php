@extends("app")

@section("title", "Dashboard Template")

@section("content_app")

<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-header bg-gray">
                Menu
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a href="">
                        Item 1
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="">
                        Item 2
                    </a>
                </li>
                <li class="list-group-item">
                    <a href="">
                        Item 3
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-8">
        <div class="card">
            <h5 class="card-header bg-gray">Featured</h5>
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</div>

@endsection