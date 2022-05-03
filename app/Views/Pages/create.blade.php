@extends('Layout.main')

@push("head")
    <title>Dashboard - Criar</title>
@endpush

@section('content')
    <div>   
        <input class="form-control w-75 m-auto py-2 my-2" type="text" placeholder="Nome *" id="username" required>
        <input class="form-control w-75 m-auto py-2 my-2" type="email" placeholder="E-mail *" id="email" required>
        <input class="form-control w-75 m-auto py-2 my-2" type="password" placeholder="Senha *" id="password" required>

        <div class="w-75 m-auto my-2">
            <button class="btn btn-primary px-4 py-2" type="submit" id="createAccount">Criar</button>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{APP['url']}}js/User/create.js"></script>
@endpush