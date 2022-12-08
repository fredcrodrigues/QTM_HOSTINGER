<div class="modal fade" id="ModalEscolha" tabindex="-1" role="dialog" aria-labelledby="ModalEscolha" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <!--  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>-->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
        </div>

        @if(Request::is('cliente', 'coworking', 'profissional'))
            <div class="modal-body" style="overflow-y: scroll;" >
                <div class="container-text">
                    <h5 class="font-weight-700 text-uppercase text-center alt-font text-extra-dark-gray center-col sm-padding-50px  sm-padding-50px width-100 margin-25px-bottom xs-width-100"></h5>

                </div>

                <div class="container-politica ">
                    <p class="text-align:justify;"> </p>
                </div>
            </div>
            <div class="modal-footer">
               
            </div>

        @else
            
            <div class="modal-body">
                <div class="container-text">
                    <h5 class="font-weight-700 text-uppercase text-center alt-font text-extra-dark-gray center-col sm-padding-50px  sm-padding-50px width-100 margin-25px-bottom xs-width-100">VOCÊ É:</h5>

                </div>

                <div class="container-button ">
                    <a href="/cliente" class="btn btn-large btn-transparent-deep-pink btn-rounded  no-margin-right">Paciente</a>
                    <a href="/coworking" class="btn btn-large btn-transparent-deep-pink btn-rounded no-margin-right">Coworking</a>
                    <a href="/profissional" class="btn btn-large btn-transparent-deep-pink btn-rounded  no-margin-right" >Terapeuta</a>

                </div>
            </div>
            <div class="modal-footer">
               
            </div>
            <!-- 
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Saanges</button>
            </div>
            -->
        @endif 
      </div>
   </div>
      
            
</div>

@section('scripts_adicionais')
<script src="{{ asset('js/site/base.js') }}"></script>
<script src="{{asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('js/site/login.js') }}"></script>
@endsection                     