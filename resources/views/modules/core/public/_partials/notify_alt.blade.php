@if (session()->has('success'))
    <div class="notification is-success">
        <button class="delete"></button>
        <p>{{session('success')}}</p>
    </div>
@endif

@if (session()->has('error'))
    <div class="notification is-danger">
        <button class="delete"></button>
        <p>{{session('error')}}</p>
    </div>
@endif

@if (count($errors) > 0)
    <div class="notification is-danger">
        <button class="delete"></button>
        {{--<strong>Oops!!! The following error occured</strong><br>--}}
        @foreach($errors->all() as $errors)
            {{$errors}} <br>
        @endforeach
    </div>
@endif