<div>
	<section class="page-title bg-1">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="block text-center">
						<span class="text-white">Cohabit - Fablab</span>
						<h1 class="text-capitalize mb-5 text-lg">vos réservations</h1>

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
						<p>Liste des réservations des machines, que vous avez fait.</p>
					</div>
				</div>
			</div>

			<div class="row">




				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Machine</th>
							<th scope="col">Projet</th>
							<th scope="col">Date Réservation</th>
							<th scope="col">Statut</th>
							<th scope="col">Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($listReservations as $reservation)
						<tr>
							<th scope="row">{{$reservation->id}}</th>
							<td>{{$reservation->machine->nom}}</td>
							<td>{{$reservation->project}}</td>
							<td>{{$reservation->date_seance}} / {{$reservation->numero_seance}}</td>
							<td>
                                        @if ($reservation->statut=='attente')
                                            <span class="badge badge-warning">{{$reservation->statut}}</span>
                                            @else
                                            @if($reservation->statut=='valide')
                                            <span class="badge badge-success">{{$reservation->statut}}</span>
                                            @else

                                            <span class="badge badge-danger">{{$reservation->statut}}</span>
                                            @endif
                                            @endif

                                        </td>
							<td><button wire:click="annulerReservation('{{$reservation->id}}')" onclick="confirm('Voulez Vous vraiment Annuler cet Réservation ?')|| event.stopImmediatePropagation()" type="button" class="btn btn-warning btn-sm">Annuler</button>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>


			</div>
		</div>
	</section>
</div>