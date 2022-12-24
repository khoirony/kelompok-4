@extends("app")

@section("title", "Edit Create Sample")

@section("content_app")
    
<div class="card">
    <div class="card-header">
        Form Create Sample
    </div>
    <div class="card-body">
        <form action="">
            <div class="mb-4">
                <label for="exampleFormControlInput1" class="form-label">Text Input</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
              </div>
              <div class="mb-4">
                <label for="exampleFormControlTextarea1" class="form-label">Textareaa</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Textarea"></textarea>
              </div>
              <div class="mb-4">
                <label for="exampleFormControlTextarea1" class="form-label">Select</label><select class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
              </div>
              <div class="mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </div>
              </div>
              <div class="mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                      Default radio
                    </label>
                </div>
              </div>
        </form>
    </div>
</div>

@endsection