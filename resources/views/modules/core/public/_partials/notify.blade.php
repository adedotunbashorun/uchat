@if (session()->has('success') && !empty(session('success')))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif

@if (count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $errors)
            {{$errors}} <br>
        @endforeach
    </div>
@endif