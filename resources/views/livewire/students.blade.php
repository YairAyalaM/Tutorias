<div class="py-12">
	<link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.2/dist/flowbite.min.css" />
	<script src="https://unpkg.com/flowbite@1.5.2/dist/flowbite.js"></script>
	<div class="max-w-7xl mx-auto sm:px6 lg:px-8">
		<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

			@if(session()->has('message'))
			<div class="bg-teal-100 rounded-b text-teal-900 px-4 py-4 shadow-md my-3" role="alert">
				<div class="flex">
					<div>
						<h4>{{ session('message')}}</h4>
					</div>
				</div>
			</div>
			@endif


			<!-- <button wire:click="crear()" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" >Nuevo</button> -->
			@if($modal)
			@include('livewire.crearStudent')
			@endif

			@if($modalLesson)
			@include('livewire.crearLesson')
			@endif

			<div class="overflow-x-auto relative sm:rounded-lg">
				<div class="flex justify-between items-center pb-4 bg-white dark:bg-gray-900">
					<div>
						<button wire:click="crear()" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Nuevo</button>
					</div>
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
				<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
					<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
						<tr>
							<th scope="col" class="p-4">
								<div class="flex items-center">
									<input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
									<label for="checkbox-all-search" class="sr-only">checkbox</label>
								</div>
							</th>
							<th scope="col" class="py-3 px-6">
								Alumno
							</th>
							<th scope="col" class="py-3 px-6">
								Carrera
							</th>
							<th scope="col" class="py-3 px-6">
								Semestre
							</th>
							<th scope="col" class="py-3 px-6">
								Tutoria
							</th>
							<th scope="col" class="py-3 px-6">
								Action
							</th>
							<!-- <th scope="col" class="py-3 px-6">
                    Action
                </th> -->
						</tr>
					</thead>
					<tbody>
						@foreach($students as $student)
						<tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
							<td class="p-4 w-4">
								<div class="flex items-center">
									<input id="checkbox-table-search-3" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
									<label for="checkbox-table-search-3" class="sr-only">checkbox</label>
								</div>
							</td>
							<th scope="row" class="flex items-center py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
								<div class="pl-3">
									<div class="text-base font-semibold">{{$student->nombre}} {{$student->apellido}}</div>
									<div class="font-normal text-gray-500">{{$student->matricula}}@upslp.edu.com</div>
								</div>
							</th>
							<td class="py-4 px-6">
								{{$student->carrera}}
							</td>
							<td class="py-4 px-6">
								{{$student->semestre}}
							</td>
							<td class="py-4 px-6">
								<button wire:click="editarLesson({{$student->id}})" class="bg-blue-400 hover:bg-blue-500 text-white font-bold py-1 px-2 mt-1 sm:mt-0 rounded-sm"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
										<path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
									</svg>

								</button>
							</td>
							<td class="py-4 px-6">
								<button wire:click.prevent="editar({{$student->id}})" class="bg-blue-400 hover:bg-blue-500 text-white font-bold py-1 px-2 mt-1 sm:mt-0 rounded-sm"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
										<path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
									</svg>
								</button>
								<button ref="javascript:void(0)" wire:click.prevent='deleteConfirmation({{ $student->id }})' class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 mt-1 sm:mt-0 rounded-sm"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
										<path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
									</svg>
								</button>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>



				<!-- end nueva tabla -->
			</div>
		</div>
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