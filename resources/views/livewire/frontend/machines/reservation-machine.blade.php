<div>
	<style>
		table {
			display: block;
			max-width: -moz-fit-content;
			max-width: fit-content;
			margin: 0 auto;
			overflow-x: auto;
			white-space: nowrap;
		}

		.modal-confirm {
			color: #636363;
			width: 325px;
			margin: 30px auto;
		}

		.modal-confirm .modal-content {
			padding: 20px;
			border-radius: 5px;
			border: 3px bold greenyellow;
		}

		.modal-confirm .modal-header {
			border-bottom: none;
			position: relative;
		}

		.modal-confirm h4 {
			text-align: center;
			font-size: 26px;
			margin: 30px 0 -15px;
		}

		.modal-confirm .form-control,
		.modal-confirm .btn {
			min-height: 40px;
			border-radius: 3px;
		}

		.modal-confirm .close {
			position: absolute;
			top: -5px;
			right: -5px;
		}

		.modal-confirm .modal-footer {
			border: none;
			text-align: center;
			border-radius: 5px;
			font-size: 13px;
		}

		.modal-confirm .icon-box {
			color: #fff;
			position: absolute;
			margin: 0 auto;
			left: 0;
			right: 0;
			top: -70px;
			width: 95px;
			height: 95px;
			border-radius: 50%;
			z-index: 9;
			background: #82ce34;
			padding: 15px;
			text-align: center;
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
		}

		.modal-confirm .icon-box i {
			font-size: 58px;
			position: relative;
			top: 3px;
		}

		.modal-confirm.modal-dialog {
			margin-top: 80px;
		}

		.modal-confirm .btn {
			color: #fff;
			border-radius: 4px;
			background: #82ce34;
			text-decoration: none;
			transition: all 0.4s;
			line-height: normal;
			border: none;
		}

		.modal-confirm .btn:hover,
		.modal-confirm .btn:focus {
			background: #6fb32b;
			outline: none;
		}
	</style>

	<section class="page-title bg-1">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="block text-center">
						<span class="text-white">Cohabit - Fablab</span>
						<h1 class="text-capitalize mb-5 text-lg">Détails Machine</h1>

					</div>
				</div>
			</div>
		</div>
	</section>


	<section class="section doctor-single">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="doctor-img-block">
						<img src="{{ asset('assets/images/machines') }}/{{$image}}" alt="" class="img-fluid w-100">

						<div class="info-block mt-4">
							<h4 class="mb-0">{{$nom}}</h4>

						</div>
					</div>
				</div>

				<div class="col-lg-8 col-md-6">
					<div class="doctor-details mt-4 mt-lg-0">
						<h2 class="text-md">{{$nom}}</h2>
						<div class="divider my-4"></div>
						<p>Texte descriptif</p>
						<p>Pour plus de détails, consulter le wiki : <a href="{{$lien_wiki}}">{{$lien_wiki}}</a> </p>

					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<div class="section-title text-center">
						<h2 class="text-md mb-2">Table de Réservation</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 mb-2">
					Machine à réservé :
					<select class="form-control" wire:click="changerMachine($event.target.value)">
						<option value="">-- Séléctionner une Machine --</option>
						@foreach($machines as $machine)
						<option @if($machine->id == $id_machine) selected @endif value="{{ $machine->id }}">{{ $machine->nom }}</option>
						@endforeach
					</select>

				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 mb-2">
					Projet de réservation : <input wire:model="project" type="text" size="50">
					@error('project') <span class="text-danger">{{ $message }}</span> @enderror
				</div>

				<div class="col-lg-12 col-md-12 col-sm-12">
					<table class="table table-bordered">
						<thead>
							<tr style="background-color: #B9D210;">
								<th>
									<center>Horaire/Jour</center>
								</th>
								@foreach($week1 as $day)
								<th>
									<center>{{$day['day_name']}} <br>
										{{$day['date']}}
									</center>
								</th>
								@endforeach
							</tr>
						</thead>
						<tbody>
							@foreach($table_reservations as $seances_du_jour)

							<tr wire:key="{{ $loop->index }}">
								<th style="background-color:#B9D210;">
									<center> {{$seances_du_jour['time']}}-{{$seances_du_jour['time']+1}}</center>
								</th>
								@foreach($seances_du_jour['seances'] as $seance)

									@if($seance['disponible']==true)
										@if($seance['date']==$selectedDate && $seance['time']==$selectedTime)
										<td>
											<center> <button type="button" disabled class="btn btn-warning btn-sm ">Séléctionné</button></center>
										</td>
										@else
										<td>
											<center><button wire:click="selectSeance('{{$seance['date']}}','{{$seance['time']}}')" type="button" class="btn btn-success btn-sm">Réserver</button></center>
										</td>
										@endif
									@else
										<td style="background-color:{{$seance['color']}}" wire:click="selectSeance()">
											<center><strong>{{$seance['project']}}</strong> <br> {{$seance['user']}}</center>
										</td>
									@endif
								@endforeach

							</tr>

							@endforeach
						</tbody>
					</table>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 mb-2">
					Notes : <input wire:model="notes_reservation" value="{{$notes_reservation}}" type="text" size="50">
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 mb-2">
					<button wire:click.prevent="reserverSeance" type="button" class="btn btn-info">Valider la réservation</button>
				</div>
				<div>
					<?php
					//print_r($reservation_array);
					?>
				</div>
			</div>
		</div>
	</section>

	<!-- Modal HTML -->
	<div id="myModal" data-backdrop="static" class="modal fade @if($showModal == true) show @endif" style="display: @if($showModal == true)
                 block
         @else
                 none
         @endif;">
		<div class="modal-dialog modal-confirm">
			<div class="modal-content">
				<div class="modal-header">
					<div class="icon-box">
						<i class="icofont-verification-check"></i>
					</div>
					<h4 class="modal-title w-100">Awesome!</h4>
				</div>
				<div class="modal-body">
					<p class="text-center"> @if(session()->has('message')) {{ session('message') }}

						@endif</p>
				</div>
				<div class="modal-footer">
					<button wire:click.prevent="closeModal()" class="btn btn-success btn-block" data-dismiss="modal">OK</button>
				</div>
			</div>
		</div>
	</div>

</div>