@extends('admin.app')

@section('pageTitle', 'Places')

@section('content')

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        Places
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
                                            Actions
                                        </h4>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($places as $place)
                                    <tr>
                                        <td style="border: solid;">
                                            <h5 class="text-center">
                                                {{ $loop->index+1 }}
                                            </h5>
                                        </td>
                                        <td style="border: solid;">
                                            {{ $place->name }}
                                        </td>
                                        <td style="border: solid;">
                                            @if (count($place->categories) == 0)
                                                <p>
                                                    No categories
                                                </p>
                                            @else
                                                @foreach ($place->categories as $category)
                                                    <label class="badge badge-info">
                                                        {{ $category->name }}
                                                    </label>
                                                @endforeach
                                            
                                            @endif
                                        </td>
                                        <td style="width: 200px; border: solid;">
                                            <div class="d-flex justify-content-around flex-nowrap">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ route('place.edit', $place->id) }}" type="button" class="btn">
                                                        <i class="mdi mdi-pencil"></i>
                                                    </a>
                                                    <a href="{{ route('place.show', $place->id) }}" type="button" class="btn">
                                                        <i class="mdi mdi-eye"></i>
                                                    </a>
                                                    <form method="post" action="{{route('place.destroy', ['place' => $place->id])}}">
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
                        {{ $places->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
    

@endsection