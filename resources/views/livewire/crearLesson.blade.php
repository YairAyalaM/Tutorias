<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <!-- estilos solo para el select -->
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.2/dist/flowbite.min.css" />
    <script src="https://unpkg.com/flowbite@1.5.2/dist/flowbite.js"></script>
    <!-- end estilos solo para el select -->
    <style>
        .scrollEdit::-webkit-scrollbar {
            width: 6px;
            /* width of the entire scrollbar */
            border-radius: 20px;
        }

        .scrollEdit::-webkit-scrollbar-track {
            background: #ccc;
            /* color of the tracking area */
            border-radius: 20px;
        }

        .scrollEdit::-webkit-scrollbar-thumb {
            background-color: #968C60;
            /* color of the scroll thumb */
            border-radius: 20px;
            /* roundness of the scroll thumb */
            border: 2.5px solid #968C60;
            /* creates padding around scroll thumb */

        }

        .scrollEdit::-webkit-scrollbar-thumb:hover {
            background: #154854;
            box-shadow: 0 0 2px 1px rgb(0 0 0 / 20%);
            border: #ccc;
        }
    </style>
    <style>
        .loader {
            border-top-color: #154854;
            -webkit-animation: spinner 1.5s linear infinite;
            animation: spinner 1.5s linear infinite;
        }

        @-webkit-keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spinner {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }



        .checkmark__circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke-miterlimit: 10;
            stroke: #7ac142;
            fill: none;
            animation: showSuccess 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards;
        }

        .checkmark {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: block;
            stroke-width: 2;
            stroke: #fff;
            stroke-miterlimit: 10;
            margin: 10% auto;
            box-shadow: inset 0px 0px 0px #7ac142;
            animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
        }

        .checkmark__check {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards;
        }

        @keyframes stroke {
            100% {
                stroke-dashoffset: 0;
            }
        }

        @keyframes scale {

            0%,
            100% {
                transform: none;
            }

            50% {
                transform: scale3d(1.1, 1.1, 1);
            }
        }

        @keyframes fill {
            100% {
                box-shadow: inset 0px 0px 0px 30px #7ac142;
            }
        }
    </style>
    <!-- loading -->
    <div style="display: none" class="top-20  left-0 z-50 fixed   max-h-full overflow-y-auto" wire:loading wire:target="cerrarModalLesson, guardarLesson">
        <div class="flex justify-center h-screen items-center  bg-gray-100 antialiased top-0 opacity-70 left-0  z-40 w-full h-full fixed ">
        </div>
        <div class="flex justify-center h-screen items-center   antialiased top-0  left-0  z-50 w-full h-full fixed ">
            <div class="flex justify-center items-center">
                <div class="
                        loader
                        ease-linear
                        rounded-full
                        border-8 border-t-8 border-gray-200
                        h-32
                        w-32
                      "></div>
                <div class="absolute">Loading...</div>
            </div>
        </div>
    </div>
    <!-- loading -->
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0" style="background-color: #00000096;"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
        <!-- tamaño del modal sm:max-w-lg  -->
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full sm:h-auto h-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form>
                <div class="text-right text-2xl mb-2 m-4">
                    <i class="fa-solid fa-xmark cursor-pointer" wire:click="cerrarModal()" wire:loading.remove wire:target="cerrarModal"></i>
                    <svg style="display: none" disabled wire:loading wire:target="cerrarModal" role="status" class="inline w-6 h-6 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor" />
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill" />
                    </svg>
                </div>
                <!-- <div>

                    <h1 class="text-center font-semibold mb-3 text-primarycolor text-2xl">Editar Usuario </h1>



                    <h1 class="text-center font-semibold mb-3 text-primarycolor text-2xl">Crear Usuario </h1>


                </div> -->
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 scrollEdit" style="
    margin: 2rem auto;
    height: 510px;
    overflow:
    auto;
    padding:0 1rem;
    ">
                    <!-- boton cerrar -->


                    <!-- new form -->

                    


                    

                    <!-- materias -->

                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        Materias
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Status
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        A/NA
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <!-- <label for="materia1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label> -->
                                        <select disabled id="materia1" wire:model="materia1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>Materia 1</option>
                                            @foreach($materias as $materia)
                                            <option value="{{$materia->id}}">{{$materia->nom_materia}}</option>
                                            @endforeach
                                        </select>
                                    </th>
                                    <td class="py-4 px-6">
                                        <!-- <label for="status1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label> -->
                                        <select disabled wire:model="status1" id="status1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="0" selected>Seleccionar</option>
                                            <option value="0">Regular</option>
                                            <option value="1">Recursada</option>
                                        </select>
                                    </td>
                                    <td class="py-4 px-6">
                                        <!-- <label for="status1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label> -->
                                        <select wire:model="aprobada1" id="aprobada1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="0" selected>Seleccionar</option>
                                            <option value="0">Aprobada</option>
                                            <option value="1">Reprobada</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <!-- <label for="materia2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label> -->
                                        <select disabled id="materia2" wire:model="materia2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>Materia 1</option>
                                            @foreach($materias as $materia)
                                            <option value="{{$materia->id}}">{{$materia->nom_materia}}</option>
                                            @endforeach
                                        </select>
                                    </th>
                                    <td class="py-4 px-6">
                                        <!-- <label for="status2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label> -->
                                        <select disabled wire:model="status2" id="status2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="0" selected>Seleccionar</option>
                                            <option value="0">Regular</option>
                                            <option value="1">Recursada</option>
                                        </select>
                                    </td>

                                    <td class="py-4 px-6">
                                        <!-- <label for="status1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label> -->
                                        <select wire:model="aprobada2" id="aprobada2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="0" selected>Seleccionar</option>
                                            <option value="0">Aprobada</option>
                                            <option value="1">Reprobada</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <!-- <label for="materia3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label> -->
                                        <select disabled id="materia3" wire:model="materia3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>Materia 1</option>
                                            @foreach($materias as $materia)
                                            <option value="{{$materia->id}}">{{$materia->nom_materia}}</option>
                                            @endforeach
                                        </select>
                                    </th>
                                    <td class="py-4 px-6">
                                        <!-- <label for="status3" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label> -->
                                        <select disabled wire:model="status3" id="status3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="0" selected>Seleccionar</option>
                                            <option value="0">Regular</option>
                                            <option value="1">Recursada</option>
                                        </select>
                                    </td>

                                    <td class="py-4 px-6">
                                        <!-- <label for="status1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label> -->
                                        <select wire:model="aprobada3" id="aprobada3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="0" selected>Seleccionar</option>
                                            <option value="0">Aprobada</option>
                                            <option value="1">Reprobada</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <!-- <label for="materia4" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label> -->
                                        <select disabled id="materia4" wire:model="materia4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>Materia 1</option>
                                            @foreach($materias as $materia)
                                            <option value="{{$materia->id}}">{{$materia->nom_materia}}</option>
                                            @endforeach
                                        </select>
                                    </th>
                                    <td class="py-4 px-6">
                                        <!-- <label for="status4" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label> -->
                                        <select disabled wire:model="status4" id="status4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="0" selected>Seleccionar</option>
                                            <option value="0">Regular</option>
                                            <option value="1">Recursada</option>
                                        </select>
                                    </td>

                                    <td class="py-4 px-6">
                                        <!-- <label for="status1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label> -->
                                        <select wire:model="aprobada4" id="aprobada4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="0" selected>Seleccionar</option>
                                            <option value="0">Aprobada</option>
                                            <option value="1">Reprobada</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <!-- <label for="materia5" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label> -->
                                        <select disabled id="materia5" wire:model="materia5" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>Materia 1</option>
                                            @foreach($materias as $materia)
                                            <option value="{{$materia->id}}">{{$materia->nom_materia}}</option>
                                            @endforeach
                                        </select>
                                    </th>
                                    <td class="py-4 px-6">
                                        <!-- <label for="status5" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label> -->
                                        <select disabled wire:model="status5" id="status5" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="0" selected>Seleccionar</option>
                                            <option value="0">Regular</option>
                                            <option value="1">Recursada</option>
                                        </select>
                                    </td>

                                    <td class="py-4 px-6">
                                        <!-- <label for="status1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label> -->
                                        <select wire:model="aprobada5" id="aprobada5" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="0" selected>Seleccionar</option>
                                            <option value="0">Aprobada</option>
                                            <option value="1">Reprobada</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <!-- <label for="materia6" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label> -->
                                        <select disabled id="materia6" wire:model="materia6" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>Materia 1</option>
                                            @foreach($materias as $materia)
                                            <option value="{{$materia->id}}">{{$materia->nom_materia}}</option>
                                            @endforeach
                                        </select>
                                    </th>
                                    <td class="py-4 px-6">
                                        <!-- <label for="status6" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label> -->
                                        <select disabled wire:model="status6" id="status6" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="0" selected>Seleccionar</option>
                                            <option value="0">Regular</option>
                                            <option value="1">Recursada</option>
                                        </select>
                                    </td>

                                    <td class="py-4 px-6">
                                        <!-- <label for="status1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label> -->
                                        <select wire:model="aprobada6" id="aprobada6" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="0" selected>Seleccionar</option>
                                            <option value="0">Aprobada</option>
                                            <option value="1">Reprobada</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <!-- <label for="materia7" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label> -->
                                        <select disabled id="materia7" wire:model="materia7" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option selected>Materia 1</option>
                                            @foreach($materias as $materia)
                                            <option value="{{$materia->id}}">{{$materia->nom_materia}}</option>
                                            @endforeach
                                        </select>
                                    </th>
                                    <td class="py-4 px-6">
                                        <!-- <label for="status7" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label> -->
                                        <select disabled wire:model="status7" id="status7" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="0" selected>Seleccionar</option>
                                            <option value="0">Regular</option>
                                            <option value="1">Recursada</option>
                                        </select>
                                    </td>

                                    <td class="py-4 px-6">
                                        <!-- <label for="status1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label> -->
                                        <select wire:model="aprobada7" id="aprobada7" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="0" selected>Seleccionar</option>
                                            <option value="0">Aprobada</option>
                                            <option value="1">Reprobada</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    

                    

                    

                   

                    

                    <!-- end materias -->

                    <!-- <div class="flex flex-col lg:flex-row  gap-4 mb-4">
                        <div class="mb-4">
                            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Imagen:</label>
                            <input type="file" class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-secondarycolor" id="image" wire:model="image">
                        </div>
                    </div> -->

                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="p-1 flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click.prevent="guardarLesson()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-400 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">Guardar</button>
                    </span>

                    <span class="p-1 flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click="cerrarModalLesson()" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-gray-200 text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">Cancelar</button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>