<div class="modal fade" id="ModalLogin" tabindex="-1" role="dialog" aria-labelledby="ModalLogin" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <!--  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>-->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="container-text">
                        <h5 class="font-weight-700 text-uppercase text-center alt-font text-extra-dark-gray center-col sm-padding-50px  sm-padding-50px width-100 margin-25px-bottom xs-width-100">Login</h5>

                </div>
               
        </div>
       
             
         
        <div class="modal-body">
                    
                    <x-alert class="alerta" :alerta="Session::get('retorno')" style="padding-right: 35px; padding: 10px; margin-bottom: 5px; text-align:right;"> </x-alert> 
                  
                    <form method="POST" action="{{ URL::to('agendamento/') }}">
                    @csrf
                        <div class="input-login">
                            <div class="form-group">
                                <label>CPF<span style="color: red;">*</span></label>
                                <input type="text" class="form-control"  onkeydown="$(this).mask('000.000.000-00');"  name="cpf_cnpj" id="cpf_cnpj" placeholder="xxx.xxx.xxx-xx" class="big-input @error('cpf_cnpj') is-invalid @enderror" value="{{ old('cpf_cnpj') }}">
                            </div>
                            <div class="form-group">
                                <label>E-Mail<span style="color: red;">*</span></label>
                                <input type="text"  class="form-control" name="email" id="email" placeholder="example@email.com"  class="big-input @error('email') is-invalid @enderror" value="{{ old('email') }}">
                            </div>
                        
                            <div class="form-group">
                                Não possui conta?  <a href="/cliente"><b style="">Cadastre-se</b></a> 
                            </div> 
                            <div class="container-button-login">
                                <button type="submit" class="btn btn-large btn-deep-pink btn-rounded no-margin-right">prosseguir</button>
                            </div>
                        </div>
                    
                    </form>
                    
                    <div class="modal-footer">
                
                    </div>
        </div>
     </div>
     
   </div>
            
</div>


@section('scripts_adicionais')
<script src="{{ asset('js/site/base.js') }}"></script>
<script src="{{asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('js/site/login.js') }}"></script>
@endsection                     
