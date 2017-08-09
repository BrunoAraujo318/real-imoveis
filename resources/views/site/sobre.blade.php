@extends('layouts.site')

@section('content')
<div class="container">
    <div class="row section">
    	<h3 align="center">Sobre</h3>
    	<div class="divider"></div>
    </div>
    <div class="row section">
    	<div class="col s12 m6">
    		<img class="responsive-img" src="{{ asset('img/modelo_img_home.jpg') }}">
    	</div>
    	<div class="col s12 m6">
    		<h4>Real Imóveis</h4>
    		<blockquote>
    			Ajudando a aproximar clientes 
    		</blockquote>
            <div align="left">
        		<p>Para locadores e locatários que desejam gerenciar as informações em relação ao seu aluguel. 
                O Real Imóveis é um software como serviço que permite realizar o cadastro de imóveis disponibilizados 
                para aluguel, possui recursos de busca de imóveis disponíveis, assinatura do contrato de locação do 
                imóvel, além de possibilitar realizar o pagamento do aluguel de forma online. O diferencial do nosso 
                produto é o custo benefício, além de facilitar o controle do aluguel.</p>
            </div>
    	</div>
    </div>
</div>
@endsection