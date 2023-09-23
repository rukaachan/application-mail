@extends('layout.layout')

@section('content')
    <div class="container py-5">
        <div class="w-50 center border rounded px-3 py-3 mx-auto">
            <h1>Login</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">Username</label>
                    <input class="form-control" type="text" name="username" />
                </div>
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input class="form-control" type="password" name="password" />
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                </div>
                <div class="form-group">
                    <input type="submit" value="login" class="btn btn-primary" />
                </div>
            </form>
        </div>
    </div>
@endsection
