@extends('admin.app')

@section('pageTitle', 'Types')

@section('content')

    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">types Table</h4>
                </p>
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
                                        Description
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
                            @foreach ($types as $type)
                                <tr>
                                    <td style="border: solid;">
                                        <h5 class="text-center">
                                            {{ $loop->index+1 }}
                                        </h5>
                                    </td>
                                    <td style="border: solid;">
                                        {{ $type->name }}
                                    </td>
                                    <td style="border: solid;">
                                        {{  Str::limit($type->description, 25) }}
                                    </td>
                                    <td style="width: 200px; border: solid;">
                                        <div class="d-flex justify-content-around flex-nowrap">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('type.edit', $type->id) }}" type="button" class="btn">
                                                    <i class="mdi mdi-pencil"></i>
                                                </a>
                                                <a href="{{ route('type.show', $type->id) }}" type="button" class="btn">
                                                    <i class="mdi mdi-eye"></i>
                                                </a>
                                                <form method="post" action="{{route('type.destroy', ['type' => $type->id])}}">
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
                    {{ $types->links() }}
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Hoverable Table</h4>
                </p>
                <form class="forms-sample" method="POST" action="{{Route('type.store')}}">
                    @csrf
                    <div class="form-group row">
                      <label for="name" class="col-sm-3 col-form-label">Nom</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" placeholder="nom" name="name" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="description" class="col-sm-3 col-form-label">Description</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" id="description" rows="4" name="description" required></textarea>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  </form>
              </div>
            </div>
          </div>
    </div>
    

@endsection