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
                @if (count($place->adress) == 0)
                  <p>
                    Aucune information actuellement
                  </p>
                @else
                  <p>
                      <strong>Commune : </strong>{{ $place->adress[0]->town }}
                      <br>
                      <strong>Quartier : </strong>{{ $place->adress[0]->district }}
                      <br>
                      <strong>Avenue : </strong>{{ $place->adress[0]->avenue }}, Nº {{ $place->adress[0]->number }}
                      <br>
                  </p>
                @endif
                
              </div>
            </div>
          </div>
          <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Ajout d'un Service</h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                </p>
                <form class="forms-sample" method="POST" action="{{Route('service.store', ['place'  => $place])}} ">
                    @csrf
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nom</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Nom du service" name="title" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Type</label>
                      <div class="col-sm-9">
                          <select class="js-example-basic-multiple form-control"  name="type" style="width:100%" required>
                              <option value="">Selectionner un type</option>
                              @foreach ($types as $type)
                                  <option value="{{$type->id}}">{{$type->name}}</option>
                              @endforeach
                          </select>
                      </div> 
                    </div>
                    <div class="form-group row">
                      <label for="minPrice" class="col-sm-3 col-form-label">Prix Minimum</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" id="minPrice" placeholder="Prix min" name="minPrice" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="maxPrice" class="col-sm-3 col-form-label">Prix Maximal</label>
                      <div class="col-sm-9">
                        <input type="number" class="form-control" id="maxPrice" placeholder="Prix max" name="maxPrice" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="description" class="col-sm-3 col-form-label">Description du Service</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" id="description" rows="4" name="description" ></textarea>
                      </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
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
                @if ( count($place->contacts) == 0 )
                  <div class="preview-item">
                    <p>
                      Pas d'information
                    </p>
                  </div>
                @else
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
                @endif

                </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xl-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Images Slide</h4>
              <div class="owl-carousel owl-theme full-width owl-carousel-dash portfolio-carousel" id="owl-carousel-basic">
                @if (count($place->images) == 0)
                  Aucne image
                @else
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
                @endif
                
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 col-xl-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Liste des Services</h4>
              <div class="list-wrapper">
                <ul class="d-flex flex-column-reverse text-white todo-list todo-list-custom">
                  @if ( count($place->services) == 0)
                    <h5 class="text-danger">
                      Pas de service
                    </h5>
                  @else
                    @foreach ($place->services as $service )
                      <li class="border-bottom" >
                        <div class="form-check form-check-primary">
                          <label class="form-check-label"> {{ $service->title }}  </label>
                        </div>
                        
                          <form class="remove" method="post" action="{{route('service.destroy', ['service' => $service->id])}}" >
                              @method('delete')
                              @csrf
                              <button type="submit" class="btn ">
                                  <i class=" mdi mdi-close-box"></i>
                              </button>
                          </form>
                        
                      </li>
                    @endforeach
                    
                  @endif
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection