@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (Session::has('messagelogin') || Session::has('message_check_auth'))
@php
    $keyMessage = Session::has('messagelogin') ? 'messagelogin' : 'message_check_auth';
@endphp
    <div class="alert alert-danger">
        <ul>
            <li>{{ Session::get($keyMessage)}}</li>
        </ul>
    </div>
@endif
