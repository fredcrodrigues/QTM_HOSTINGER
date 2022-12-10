@extends('layouts.app')
@section('head_title', 'página inicial')
@section('links_adicionais') 
<!-- <script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script> -->
@endsection
@section('conteudo')
        @include('Site.partes_index.banner')
        @include('Site.partes_index.sobre_principal')
        @include('Site.partes_index.servico')
        @include('Site.partes_index.servico_produto')
        @include('Site.partes_index.sobre_secundario')
        <!-- @include('Site.partes_index.covidas_principal') -->
        @include('Site.partes_index.produtos_principal')
        @include('Site.partes_index.produto_audio')
        @include('Site.partes_index.parceiro')
        @include('Site.partes_index.contato')

@endsection
@section('scripts_adicionais')
<script src="{{ asset('js/site/base.js') }}"></script>
<script src="{{ asset('plugins/sweetalert2/sweet.js') }}"></script>
<script src="{{ asset('js/site/index.js') }}"></script>
@endsection  

