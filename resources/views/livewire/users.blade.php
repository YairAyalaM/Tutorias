<div>
    <!-- inicio de componente tabla -->
    <!-- component -->
    <script src="https://cdn.tailwindcss.com"></script>
<link
	href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
	rel="stylesheet">
<div class="flex items-center justify-center min-h-screen bg-gray-900">
	<div class="col-span-12">
		<div class="overflow-auto lg:overflow-visible ">
			<table class="table text-gray-400 border-separate space-y-6 text-sm">
				<thead class="bg-gray-800 text-gray-500">
					<tr>
						<th class="p-3">Brand</th>
						<th class="p-3 text-left">Category</th>
						<th class="p-3 text-left">Price</th>
						<th class="p-3 text-left">Status</th>
						<th class="p-3 text-left">Action</th>
					</tr>
				</thead>
				<tbody>
				@foreach($users as $user)
					<tr class="bg-gray-800">			
						<td class="p-3">
							<div class="flex align-items-center">
								<img class="rounded-full h-12 w-12  object-cover" src="https://images.unsplash.com/photo-1613588718956-c2e80305bf61?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=634&q=80" alt="unsplash image">
								<div class="ml-3">
									<div class="">{{$user->name}}</div>
									<div class="text-gray-500">{{$user->email}}</div>
								</div>
							</div>
						</td>
						<td class="p-3">
						{{$user->name}}
						</td>
						<td class="p-3 font-bold">
						{{$user->created_at}}
						</td>
						<td class="p-3">
							<span class="bg-green-400 text-gray-50 rounded-md px-2">available</span>
						</td>
						<td class="p-3 ">
							<a href="#" class="text-gray-400 hover:text-gray-100 mr-2">
								<i class="material-icons-outlined text-base">visibility</i>
							</a>
							<a href="#" class="text-gray-400 hover:text-gray-100  mx-2">
								<i class="material-icons-outlined text-base">edit</i>
							</a>
							<a href="#" class="text-gray-400 hover:text-gray-100  ml-2">
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
</div>
