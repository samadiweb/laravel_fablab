<div>
	<section class="page-title bg-1">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="block text-center">
						<span class="text-white">Cohabit Fablab</span>
						<h1 class="text-capitalize mb-5 text-lg">Présentation</h1>

						<!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">Our services</a></li>
          </ul> -->
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="section about-page">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<h2 class="title-color">{{$titre}}</h2>
				</div>
				<div class="col-lg-8">
					<p> 
					{{$presentation}}
					</p>
					<img src="{{ asset('assets/front/images/pages/presentation')}}/{{$image}}" alt="" class="img-fluid">
				</div>
			</div>
		</div>
	</section>

	<section class="section cta-page">
		<div class="container">
			<div class="row">
				<div class="col-lg-7">
					<div class="cta-content">
						<div class="divider mb-4"></div>
						<h2 class="mb-5 text-lg">Nous sommes heureux de vous offrir <br><span class="title-color">la chance de travailler avec nous</span></h2>
						<a href="{{ route('register') }}" class="btn btn-main-2 btn-round-full">S'inscrir<i class="icofont-simple-right  ml-2"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="section service-2">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="service-block mb-5">
						<img src="{{ asset('assets/front/images/service/service-1.jpg')}}" alt="" class="img-fluid">
						<div class="content">
							<h4 class="mt-4 mb-2 title-color"> <a href="{{route('frontend.machines')}}">Réservation Machines</a> </h4>
							<p class="mb-4">Consulter la liste de nos Machines </p>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="service-block mb-5">
						<img src="{{ asset('assets/front/images/service/service-1.jpg')}}" alt="" class="img-fluid">
						<div class="content">
							<h4 class="mt-4 mb-2  title-color"><a href="{{route('frontend.formations')}}">Formations</a> </h4>
							<p class="mb-4">Consulter la liste de nos Formations </p>
						</div>
					</div>
				</div>

				<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="service-block mb-5">
						<img src="{{ asset('assets/front/images/service/service-1.jpg')}}" alt="" class="img-fluid">
						<div class="content">
							<h4 class="mt-4 mb-2 title-color"><a href="{{route('frontend.projects')}}">Projets</a> </h4>
							<p class="mb-4">Consulter la liste des Projets </p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
</div>