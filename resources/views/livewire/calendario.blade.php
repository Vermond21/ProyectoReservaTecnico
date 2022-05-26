<div>
    <x-slot name="header">
        <h1 class="text-gray-900">Calendario técnico</h1>
    </x-slot>

    <div class="py-3">
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
            </div>
        </div>
    </div>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <label class="inline-block w-32 font-bold">Técnico:</label>
                <select id="tecnicoSelect" name="tecnico_id" wire:model="tecnico_id" wire:change="seleccionarTecnico()" wire:click="refrescarCalendario" 
                    class="w-full leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                    <option value="">Seleccione un técnico:</option>
                    @foreach($tecnicos as $tecnico)
                        <option value="{{ $tecnico->id }}">{{ $tecnico->nombre }} {{ $tecnico->apellido }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">            
                <div id='calendar-container' wire:ignore>
                    <div id='calendar'></div>
                </div>        
            </div>
        </div>
    </div>
</div>


@push('scripts')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.js'></script>
    <script>                     
        const selectElement = document.getElementById('tecnicoSelect');
        selectElement.addEventListener('change', function() {
            // setTimeout(function () {                          
                var Calendar = FullCalendar.Calendar;
                var Draggable = FullCalendar.Draggable;
                var calendarEl = document.getElementById('calendar');
                var checkbox = document.getElementById('drop-remove');        
                var data =   @this.programacionesJson;
                var calendar = new Calendar(calendarEl, {
                events: JSON.parse(data),
                editable: true,
                selectable: true,
                displayEventTime: false,
                droppable: true,        
                loading: function(isLoading) {
                        if (!isLoading) {                        
                            this.getEvents().forEach(function(e){
                                if (e.source === null) {
                                    e.remove();
                                }
                            });
                        }
                    }
                });
                calendar.render();
                @this.on(`refrescarCalendario`, () => {
                     calendar.refetchEvents()
                });                  
            // }, 500);            
        });
    </script>
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.css' rel='stylesheet' />
@endpush
