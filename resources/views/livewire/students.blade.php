<div>
	@include('sweetalert::alert')
	<!-- inicio de componente tabla -->
	<!-- component -->
	<script src="https://cdn.tailwindcss.com"></script>
	<link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
	<div class="flex items-center justify-center min-h-screen bg-gray-900">
		<div class="col-span-12">
			<div class="overflow-auto lg:overflow-visible ">
				<div class="flex justify-between items-center pb-4 bg-white dark:bg-gray-900">
					@if($modal)
					@include('livewire.crearStudent')
					@endif
					<div>
						<button wire:click="crear()" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
								<path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
							</svg>
						</button>
					</div>
					<!-- boton tutoria -->
					@if($modalLesson)
					@include('livewire.crearLesson')
					@endif
					<div>
						<button wire:click="crearLesson()" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
								<path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
							</svg>
						</button>
					</div>
					<!-- end boton tutoria -->
					<label for="table-search" class="sr-only">Search</label>
					<div class="relative">
						<div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
							<svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
							</svg>
						</div>
						<input type="text" id="table-search-users" class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for users">
					</div>
				</div>
				<table class="table text-gray-400 border-separate space-y-6 text-sm">
					<thead class="bg-gray-800 text-gray-500">
						<tr>
							<th class="p-3">Alumno</th>
							<th class="p-3 text-left">Carrera</th>
							<th class="p-3 text-left">Semestre</th>
							<th class="p-3 text-left">Status</th>
							<th class="p-3 text-left">Action</th>
						</tr>
					</thead>
					<tbody id="table">
						@foreach($students as $student)
						<tr class="bg-gray-800">
							<td class="p-3">
								<div class="flex align-items-center">
									<img class="handle cursor-grab rounded-full h-12 w-12  object-cover" src="https://images.unsplash.com/photo-1613588718956-c2e80305bf61?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=634&q=80" alt="unsplash image">
									<div class="ml-3">
										<div class="">{{$student->nombre}} {{$student->apellido}}</div>
										<div class="text-gray-500">{{$student->matricula}}@upslp.edu.com</div>
									</div>
								</div>
							</td>
							<td class="p-3">
								{{$student->carrera}}
							</td>
							<td class="p-3 font-bold">
								{{$student->semestre}}
							</td>
							<td class="p-3">
								<span class="bg-green-400 text-gray-50 rounded-md px-2">available</span>
							</td>
							<td class="p-3 ">
								<a href="javascript:void(0)" wire:click.prevent='editarLesson({{$student->id}})' class="text-gray-400 hover:text-gray-100 mr-2">
									<i class="material-icons-outlined text-base">visibility</i>
								</a>
								<a href="javascript:void(0)" wire:click.prevent='editar({{$student->id}})' class="text-gray-400 hover:text-gray-100  mx-2">
									<i class="material-icons-outlined text-base">edit</i>
								</a>
								<a ref="javascript:void(0)" wire:click.prevent='deleteConfirmation({{ $student->id }})' class="text-gray-400 hover:text-gray-100  ml-2">
									<!-- <a onclick="confirmation(event)" class="text-gray-400 hover:text-gray-100  ml-2"> -->
									<i class="material-icons-round text-base">delete_outline</i>
								</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<style>
		.table {
			border-spacing: 0 15px;
		}

		i {
			font-size: 1rem !important;
		}

		.table tr {
			border-radius: 20px;
		}

		tr td:nth-child(n+5),
		tr th:nth-child(n+5) {
			border-radius: 0 .625rem .625rem 0;
		}

		tr td:nth-child(1),
		tr th:nth-child(1) {
			border-radius: .625rem 0 0 .625rem;
		}
	</style>
	<!-- fin de componente tabla -->
	@livewireScripts
	<!-- script sortable -->
	<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

	<script>
		new Sortable(table, {
			handle: '.handle', //handle permite mover solo elementos que tengan la clase handle
			animation: 150,
			ghostClass: 'bg-blue-100',
			store: {
				set: function(sortable) {
					const sorts = sortable.toArray();
					axios.post("{{route('api.sort.posts')}}", {
						sorts: sorts
					})
				}
			}
		});
	</script>
	<!-- scripts de se a eliminado correctamente -->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<x-livewire-alert::scripts />

	<!-- script de boton de confirmacion -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<script>
		window.addEventListener('show-delete-confirmation', event => {
			Swal.fire({
				title: 'Are you sure?',
				text: "You won't be able to revert this!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, Delete'
			}).then((result) => {
				if (result.isConfirmed) {
					livewire.emit('deleteConfirmed')
				}
			})
		})


		//confirmacion
		window.addEventListener('FileDeleted', event => {
			Swal.fire(
				'Deleted!',
				'Your file has been deleted.',
				'success'
			)
		});
	</script>



</div>