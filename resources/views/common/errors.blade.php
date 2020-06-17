@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (Session::has('messagelogin'))
    <div class="alert alert-danger">
        <ul>
            <li>{{ Session::get('messagelogin')}}</li>
        </ul>
    </div>
@endif
