@if (Session::has('message_erro'))
    <div class="alert alert-danger erros alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-ban"></i> Atenção!</h5>
        {{ Session::get('message_erro') }}
    </div>
@endif
@if (Session::has('message_sucesso'))
    <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{ Session::get('message_sucesso') }}
    </div>
@endif