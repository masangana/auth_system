<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    @foreach ($services as $service)
        <div class="col-lg-4 col-md-6 mb-5">
            <div class="ts-service" >
                <p>
                    <a href="{{ route('places.show', $service->place_id) }} ">
                        {{$service->title}}
                    </a> 
                </p>
                <ul>
                    <li>
                        MAx : {{$service->max_price}}
                    </li>
                    <li>
                       Min : {{$service->min_price}}
                    </li>
                    <li>
                        @foreach ($types as $type )
                            @if ($type->id == $service->type_id)
                             {{$type->name}}
                            @endif
                        @endforeach
                        
                    </li>
                </ul>
            </div>
        </div>
        
    @endforeach
</div>
