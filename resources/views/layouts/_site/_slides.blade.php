<div class="slider">
	<ul class="slides">
	@foreach($slides as $slide)
		<li onclick="window.location='{{ $slide->link }}'">
			<img src="{{ asset($slide->imagem) }}" alt="Imagem">
			<div class="caption {{ $direcaoImagem[rand(0,2)] }}" align="center">
				<h3>{{ $slide->titulo }}</h3>
				<h5>{{ $slide->descricao }}</h5>
			</div>
		</li>
	@endforeach
	</ul>
</div>