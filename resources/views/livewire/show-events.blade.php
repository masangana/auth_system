
<div class="row">
    @foreach ($events as $event)

        <div class="col-md-4 mb-5">
            <div class="ts-service-box-bg text-center h-100">
            <span class="ts-service-icon icon-round">
                <i class="fas fa-photo-video mr-0"></i>
            </span>
            <div class="ts-service-box-content">
                <h4>
                    <a href="">
                        {{$event->title}}
                    </a>
                </h4>
            </div>
            </div>
        </div>
    @endforeach
</div>
