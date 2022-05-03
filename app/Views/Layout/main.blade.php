<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    @stack('head')
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 border border-secoundary rounded mt-5">
                <div class="container-fluid">
                    <div class="row justify-content-center border-bottom border-secoundary">
                        <div class="col-6 text-center">
                            <a href="/" id="home" class="btn btn-white w-100 d-inline-block m-auto py-3">Contas</a>
                        </div>
                        <div class="col-6 text-center">
                            <a href="/create" id="create" class="btn btn-white w-100 d-inline-block m-auto py-3">Criação</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 py-3">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var pathname = window.location.pathname;
        
        if(pathname == '/')
        {
            $('#home').addClass('text-primary');
        }

        if(pathname == "/create")
        {
            $('#create').addClass('text-primary');
        }

        function sweatAlert(response)
        {
            var icon = "error"
            var title = "Opss..."
            if(response.success){
                icon = "success"
                title = "Sucesso!"
            }

            
            return Swal.fire({
                icon: icon,
                title: title,
                text: response.message,
            })
        }

    </script>
    @stack('script')
</body>
</html>