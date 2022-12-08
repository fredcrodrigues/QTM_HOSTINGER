@extends('layouts.partials_site.app')
 
@section('title', 'Alerta')
@section('contentheader_title', 'Alerta')

@section('conteudo')

<div class="breadcrumbs__section breadcrumbs__section-thin brk-bg-center-cover lazyload" data-bg="{{ asset('img/cabecalho-silvany.jpg')}}" data-brk-library="component__breadcrumbs_css">
		<span class="brk-abs-bg-overlay brk-bg-grad opacity-80"></span>
		<div class="breadcrumbs__wrapper">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-12 col-lg-6">
						<div class="d-flex justify-content-lg-end justify-content-start pr-40 pr-xs-0 breadcrumbs__title">
							<h2 class="brk-white-font-color font__weight-semibold font__size-48 line__height-68 font__family-montserrat">
								Atenção
							</h2>
						</div>
					</div>
					<div class="col-12 col-lg-6">
						<div class="pt-25 pb-35 position-static position-lg-relative breadcrumbs__subtitle">
							<h3 class="brk-white-font-color font__family-montserrat font__weight-medium font__size-18 line__height-21 text-uppercase mb-15">
								<!-- Compre com segurança! -->
							</h3>
							<!-- <ol class="breadcrumb font__family-montserrat font__size-15 line__height-16 brk-white-font-color">
								<li>
									<a href="#">Home</a>
									<i class="fal fa-chevron-right icon"></i>
								</li>
								<li class="active">Seu carrinho</li>
							</ol> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    <br><br>
        <div class="brk-services-icon mb-30" data-brk-library="component__services">
            <div class="brk-services-icon__wrapper">
               <h3 class="brk-services-icon__title font__family-montserrat font__size-24 font__weight-bold line__height-24">
               Página não encontrada.
                </h3>
            </div>
        </div>
@endsection