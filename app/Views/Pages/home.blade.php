@extends('Layout.main')

@push("head")
    <title>Dashboard - Home</title>
@endpush

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody id="users">
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{$user['id']}}</th>
                <td>{{$user['username']}}</td>
                <td>{{$user['email']}}</td>
                <td>
                    <a class="btn btn-primary" href="/update/{{$user['id']}}">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection



