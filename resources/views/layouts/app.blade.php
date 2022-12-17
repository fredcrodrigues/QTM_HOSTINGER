<!doctype html>
<html class="no-js" lang="en">

    @section('cabecalho')
        @include('layouts.head')
        @yield('links_adicionais')
    @show

    <body class="top-nav">
       
        @include('layouts.preload')
        @include('layouts.modal') 


        @if(Request::is('/')) <!--- verifica a url -->
            @include('layouts.menuIndex')
        @else
            @include('layouts.header')
        @endif 

        @yield('conteudo')
        
        


        @include('layouts.footer') 

        <a class="btn-fab" style="display:inline;" href="https://wa.me/5598983421233"><i class="fa fa-whatsapp"></i></a> 
         <!--  <a class="scroll-top-arrow" href="javascript:void(0);"><i class="ti-arrow-up"></i></a> -->
        

        @section('scripts')
            @include('layouts.script')
            @yield('scripts_adicionais')
        @show
        
       
    </body>
</html>