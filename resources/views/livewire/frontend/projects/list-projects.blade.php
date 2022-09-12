<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Cohabit - Fablab</span>
          <h1 class="text-capitalize mb-5 text-lg">Nos Projets</h1>

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


<section class="section service-2">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7 text-center">
				<div class="section-title">
					
					<div class="divider mx-auto my-4"></div>
					<p>Nos Projets</p>
				</div>
			</div>
		</div>

		<div class="row">

    @foreach ($items as $item)
			<div class="col-lg-4 col-md-6 ">
				<div class="department-block mb-5">
					<a href=""> <img src="{{ asset('assets/images/projects') }}/{{$item->image}}" alt="" class="img-fluid w-100"></a>
					<div class="content">
						<h4 class="mt-4 mb-2 title-color">{{$item->titre}}</h4>
						<p class="mb-2"><a href="{{$item->lien_wiki}}" target="_blank">Consulter le Wiki  <i class="icofont-simple-right ml-2"></i></a> </p>
						<a href="#" class="btn btn-main-2 btn-round-full">Participer  </a>
					</div>
				</div>
			</div>
      @endforeach
		
			
	
		
		</div>
	</div>
</section>
