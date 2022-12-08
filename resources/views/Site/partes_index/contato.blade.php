<section id="Contato" class="wow fadeIn bg-extra-dark-gray">
    <div class="container">
        <div class="row"> 
            <div class="col-md-6 padding-ten-right md-padding-five-right sm-padding-15px-right sm-margin-five-bottom wow fadeIn">
                <h5 class="alt-font text-white margin-20px-bottom">{{$contato->titulo}}</h5>
                <p>@php echo $contato->conteudo @endphp</p>
                <div class="icon-box width-100 sm-margin-lr-auto xs-width-100 last-paragraph-no-margin">
                    <div class="icon-box-holder vertical-align-middle display-table-cell position-relative">
                        <i class="icon-envelope icon-medium text-deep-pink padding-5px-top"></i>
                        <div class="alt-font text-white">Nosso e-mail</div>
                        <p><a href="mailto:{{$contato->email}}"> {{$contato->email}}</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 wow fadeIn">
                <div class="padding-fifteen-all bg-white border-radius-6 md-padding-seven-all">
                    <div class="text-extra-dark-gray alt-font text-large font-weight-600 margin-30px-bottom">Envie uma mensagem</div> 
                    <div>
                        <form id="contato" action="javascript:void(0)" method="post">
                            <div id="success-contact-form" class="no-margin-lr"></div>
                            <input type="text" name="nome" id="nome" placeholder="Seu nome*" class="input-bg">
                            <input type="text" name="email" id="email" placeholder="Seu E-mail*" class="input-bg">
                            <input type="text" name="assunto" id="assunto" placeholder="Assunto*" class="input-bg">
                            <textarea name="mensagem" id="mensagem" placeholder="Sua mensagem*" class="input-bg"></textarea>
                            <button id="save" type="button" class="btn btn-small border-radius-4 btn-black">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>