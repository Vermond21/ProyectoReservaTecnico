<x-jet-dialog-modal wire:model="modal" maxWidth="2xl">
    <x-slot name="title">
        {{ __('Crear nueva Programacion') }}
    </x-slot>
    <x-slot name="content">
        <form>
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            
                <!-- <div class="mb-4">
                    <label for="apellido" class="block text-gray-700 text-sm font-bold mb-2">Cliente:</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="cliente_id" wire:model="cliente_id">
                </div> -->
                @if(count($clientes) > 0)
                    <div class="mb-4">
                        <label class="inline-block w-32 font-bold">Clientes:</label>
                        <select name="cliente_id" wire:model="cliente_id" 
                            class="w-full leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                            <option value="">Seleccione un Cliente </option>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->nombre }} {{ $cliente->apellido }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif

                @if(count($tareas) > 0)
                    <div class="mb-4">
                        <label class="inline-block w-32 font-bold">Tareas:</label>
                        <select name="tarea_id" wire:model="tarea_id" wire:change="calcularTiempoDeFin()" 
                            class="w-full leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                            <option value="">Seleccione una Tarea </option>
                            @foreach($tareas as $tarea)
                                <option value="{{ $tarea->id }}">{{ $tarea->nombre }} </option>
                            @endforeach
                        </select>
                    </div>
                @endif

                @if(count($tecnicos) > 0)
                    <div class="mb-4">
                        <label class="inline-block w-32 font-bold">Tecnicos:</label>
                        <select name="tecnico_id" wire:model="tecnico_id" 
                            class="w-full leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                            <option value="">Seleccione un Tecnico </option>
                            @foreach($tecnicos as $tecnico)
                                <option value="{{ $tecnico->id }}">{{ $tecnico->nombre }} {{ $tecnico->apellido }} </option>
                            @endforeach
                        </select>
                    </div>
                @endif

                <!-- <div class="mb-4">
                    <label for="tipo" class="block text-gray-700 text-sm font-bold mb-2">Tarea:</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="tarea_id" wire:model="tarea_id">
                </div> -->
                <!-- <div class="mb-4">
                    <label for="tecnico" class="block text-gray-700 text-sm font-bold mb-2">Tecnico:</label>
                    <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="tecnico_id" wire:model="tecnico_id">
                </div> -->
                <div class="mb-4">
                    <label for="tiempo_inicio" class="block text-gray-700 text-sm font-bold mb-2">Tiempo Inicio:</label>
                    <input type="time" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="tiempo_inicio" wire:model="tiempo_inicio">
                </div>
                <div class="mb-4">
                    <label for="tiempo_fin" class="block text-gray-700 text-sm font-bold mb-2">Tiempo Fin:</label>
                    <input type="time" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="tiempo_fin" wire:model="tiempo_fin">
               
                <div class="mb-4">
                    <label for="fecha" class="block text-gray-700 text-sm font-bold mb-2">Fecha:</label>
                    <input type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="fecha" wire:model="fecha">
                </div>
                @if(count($estados) > 0)
                    <div class="mb-4">
                        <label class="inline-block w-32 font-bold">Estado</label>
                        <select name="estados" wire:model="estado" 
                            class="w-full leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                            <option value="">Seleccione un Estado </option>
                            @foreach($estados as $estado)
                                <option value="{{ $estado }}">{{ $estado }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
                <!-- <div class="mb-4">
                    <label for="tiempo" class="block text-gray-700 text-sm font-bold mb-2">Latitud:</label>
                    <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="latitud" wire:model="latitud">
                </div>
                <div class="mb-4">
                    <label for="tiempo" class="block text-gray-700 text-sm font-bold mb-2">Longitud:</label>
                    <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="longitud" wire:model="longitud">
                </div> -->
                <!-- <div class="mb-4">
                    <label for="observaciones" class="block text-gray-700 text-sm font-bold mb-2">Observaciones:</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="observaciones" wire:model="observaciones">
                </div> -->
                
            </div>
        </form>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click.prevent="guardar()">
            {{ __('Guardar') }}
        </x-jet-secondary-button>

        <x-jet-button class="ml-2"
                    wire:click="cerrarModal()"
                    wire:loading.attr="disabled">
            {{ __('Cancelar') }}
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal>