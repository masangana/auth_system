@extends('admin.app')

@section('pageTitle', 'show ')

@section('content')

    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card overflow-auto">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">{{ $place->name }}</h4>
                <p class="card-description"> Details relatifs à <code>{{ $place->name }}</code>
                </p>
                <hr style="border: 0; border-top: 1px solid #ccc;">
                <p class="overflow-auto">
                    <strong>Description : </strong> 
                    <br>
                    {{ $place->description }}
                </p>
                <br>

                <hr style="border: 0; border-top: 1px solid #ccc;">
                <h5>Adresse </h5>
                <p>
                    <strong>Commune : </strong>{{ $place->adress[0]->town }}
                    <br>
                    <strong>Quartier : </strong>{{ $place->adress[0]->district }}
                    <br>
                    <strong>Avenue : </strong>{{ $place->adress[0]->avenue }}, Nº {{ $place->adress[0]->number }}
                    <br>
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Ajout d'un Service</h4>
                <p class="card-description"> Add class <code>.table-hover</code>
                </p>
                <form class="forms-sample">
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Username">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputMobile" placeholder="Mobile number">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Re Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" id="exampleInputConfirmPassword2" placeholder="Password">
                      </div>
                    </div>
                    <div class="form-check form-check-flat form-check-primary">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input"> Remember me </label>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-dark">Cancel</button>
                  </form>
              </div>
            </div>
          </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xl-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-row justify-content-between">
                <h4 class="card-title">Contact</h4>
              </div>
              <div class="preview-list">
                <div class="preview-item border-bottom">
                  <div class="preview-item-content d-flex flex-grow">
                    <div class="flex-grow">
                      <div class="d-flex d-md-block d-xl-flex justify-content-between">
                        <h6 class="preview-subject">Téléphone</h6>
                      </div>
                      <a class="text-muted" href="tel:{{ $place->contacts[0]->phone }}" >{{ $place->contacts[0]->phone }}</a>
                    </div>
                  </div>
                </div>
                <div class="preview-item border-bottom">
                    <div class="preview-item-content d-flex flex-grow">
                      <div class="flex-grow">
                        <div class="d-flex d-md-block d-xl-flex justify-content-between">
                          <h6 class="preview-subject">Mail</h6>
                        </div>
                        <a class="text-muted" href="mailto:{{ $place->contacts[0]->mail }}" >{{ $place->contacts[0]->mail }}</a>
                      </div>
                    </div>
                  </div>
                <div class="preview-item border-bottom">
                    <div class="preview-item-content d-flex flex-grow">
                      <div class="flex-grow">
                        <div class="d-flex d-md-block d-xl-flex justify-content-between">
                          <h6 class="preview-subject">Site Web</h6>
                        </div>
                        <a class="text-muted" href="{{ $place->contacts[0]->web_site }}" target="_blank">{{ $place->contacts[0]->web_site }}</a>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Images Slide</h4>
              <div class="owl-carousel owl-theme full-width owl-carousel-dash portfolio-carousel" id="owl-carousel-basic">
                @foreach ($place->images as $image )
                    <div class="item">
                        <img src="{{asset("images/".$image->link)}}" class="img-fluid img-thumbnail" alt="{{$image->link}} ">
                        <form method="post" action="{{route('image.destroy', ['image' => $image->id])}}">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn ">
                                <i class="mdi mdi-delete"></i>
                            </button>
                        </form> 
                    </div>
                    
                @endforeach
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 col-xl-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">To do list</h4>
              <div class="add-items d-flex">
                <input type="text" class="form-control todo-list-input" placeholder="enter task..">
                <button class="add btn btn-primary todo-list-add-btn">Add</button>
              </div>
              <div class="list-wrapper">
                <ul class="d-flex flex-column-reverse text-white todo-list todo-list-custom">
                  <li>
                    <div class="form-check form-check-primary">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox"> Create invoice </label>
                    </div>
                    <i class="remove mdi mdi-close-box"></i>
                  </li>
                  <li>
                    <div class="form-check form-check-primary">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox"> Meeting with Alita </label>
                    </div>
                    <i class="remove mdi mdi-close-box"></i>
                  </li>
                  <li class="completed">
                    <div class="form-check form-check-primary">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox" checked> Prepare for presentation </label>
                    </div>
                    <i class="remove mdi mdi-close-box"></i>
                  </li>
                  <li>
                    <div class="form-check form-check-primary">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox"> Plan weekend outing </label>
                    </div>
                    <i class="remove mdi mdi-close-box"></i>
                  </li>
                  <li>
                    <div class="form-check form-check-primary">
                      <label class="form-check-label">
                        <input class="checkbox" type="checkbox"> Pick up kids from school </label>
                    </div>
                    <i class="remove mdi mdi-close-box"></i>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection