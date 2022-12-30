
<div class="row">
    @foreach ($services as $service)

        <div class="col-md-4 mb-5">
            <div class="ts-service-box-bg text-center h-100">
            <span class="ts-service-icon icon-round">
                <i class="fas fa-map-marker-alt mr-0"></i>
            </span>
            <div class="ts-service-box-content">
                <h4>
                    <a href="{{ route('places.show', $service->place_id) }} ">
                        {{$service->title}}
                    </a>
                </h4>
                <p>De <strong>{{$service->min_price}}</strong>Fc à <strong>{{$service->max_price}}</strong>Fc</p>
                    <br>
                <p>
                    <span class="badge badge-success">
                        @foreach ($types as $type )
                            @if ($type->id == $service->type_id)
                            {{$type->name}}
                            @endif
                        @endforeach
                    </span>
                </p>
            </div>
            </div>
        </div>
    @endforeach
</div><!-- 1st row end -->
