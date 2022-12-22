@extends('admin.app')

@section('pageTitle', 'events')

@section('content')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        events
                    </h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 100px">
                                        <h4 class="text-primary text-center text-capitalize">
                                            #
                                        </h4>
                                    </th>
                                    <th>
                                        <h4 class="text-primary text-center text-capitalize">
                                            Name
                                        </h4>
                                    </th>
                                    <th>
                                        <h4 class="text-primary text-center text-capitalize">
                                            Categories
                                        </h4>
                                    </th>

                                    <th>
                                        <h4 class="text-primary text-center text-capitalize">
                                            Status
                                        </h4>

                                    <th>
                                        <h4 class="text-primary text-center text-capitalize">
                                            Actions
                                        </h4>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <td style="border: solid;">
                                            <h5 class="text-center">
                                                {{ $loop->index+1 }}
                                            </h5>
                                        </td>
                                        <td style="border: solid;">
                                            {{ $event->title }}
                                        </td>
                                        <td style="border: solid;">
                                            {{  Str::limit($event->description, 100) }}
                                        </td>

                                        <td style="border: solid;">
                                            @if ($event->finished == 0)
                                                <span class="badge badge-success">Pas Fini</span>
                                            @else
                                                <span class="badge badge-danger">Finished</span>
                                            @endif
                                        </td>
                                        <td style="width: 200px; border: solid;">
                                            <div class="d-flex justify-content-around flex-nowrap">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ route('event.edit', $event->id) }}" type="button" class="btn">
                                                        <i class="mdi mdi-pencil"></i>
                                                    </a>
                                                    <a href="{{ route('event.show', $event->id) }}" type="button" class="btn">
                                                        <i class="mdi mdi-eye"></i>
                                                    </a>
                                                    <form method="post" action="{{route('event.destroy', ['event' => $event->id])}}">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="btn ">
                                                            <i class="mdi mdi-delete"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            
                                        </td>
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div class="d-flex justify-content-end">
                        {{ $events->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
    

@endsection