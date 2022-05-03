@extends('Layout.main')

@push("head")
    <title>Dashboard - Atualizar</title>
@endpush

@section('content')
    <div>   
        <input class="form-control w-75 m-auto py-2 my-2" type="text" placeholder="Nome *" id="username" value="{{$user['username']}}" >
        <input class="form-control w-75 m-auto py-2 my-2" type="email" placeholder="E-mail *" id="email" value="{{$user['email']}}">
        <input class="form-control w-75 m-auto py-2 my-2" type="password" placeholder="Senha *" id="password">
        <input type="hidden" id="id" value="{{$user['id']}}">

        <div class="w-75 m-auto my-2">
            <button class="btn btn-primary px-4 py-2" type="button" id="btn_update">Atualizar</button>
            <button class="btn btn-danger px-4 py-2" type="button" id="btn_delete">Deletar</button>
        </div>
    </div>
@endsection

@push('script')
<script src="{{APP['url']}}js/User/update.js"></script>
@endpush