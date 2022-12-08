@if($alerta)
    <div class="alert alert-{{ $alerta['classe'] }} alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>{{ $alerta['titulo'] }}</strong>
        @php echo $alerta["mensagem"] @endphp
    </div>
@endif
