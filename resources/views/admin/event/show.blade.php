@extends('admin.app')

@section('pageTitle', 'Show Event ')

@section('content')

<div class="row">
    <div class="col-lg-6 grid-margin stretch-card overflow-auto">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">{{ $event->title }}</h4>
            <p class="card-description"> Details relatifs à <code>{{ $event->title }}</code>
            </p>
            <hr style="border: 0; border-top: 1px solid #ccc;">
            <p class="overflow-auto">
                <strong>Description : </strong> 
                <br>
                {{ $event->description }}
            </p>
            <br>

            <hr style="border: 0; border-top: 1px solid #ccc;">
            <h5>Adresse </h5>   
            @if (count($event->adress) == 0)
              <p>
                Aucune information actuellement
              </p>
            @else
              <p>
                  <strong>Commune : </strong>{{ $event->adress[0]->town }}
                  <br>
                  <strong>Quartier : </strong>{{ $event->adress[0]->district }}
                  <br>
                  <strong>Avenue : </strong>{{ $event->adress[0]->avenue }}, Nº {{ $event->adress[0]->number }}
                  <br>
              </p>
            @endif
            
          </div>
        </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
              <div class="d-flex flex-row justify-content-between">
                <h4 class="card-title">Contact</h4>
              </div>
              <div class="preview-list">
                @if ( count($event->contacts) == 0 )
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
                        <a class="text-muted" href="tel:{{ $event->contacts[0]->phone }}" >{{ $event->contacts[0]->phone }}</a>
                      </div>
                    </div>
                  </div>
                  <div class="preview-item border-bottom">
                      <div class="preview-item-content d-flex flex-grow">
                        <div class="flex-grow">
                          <div class="d-flex d-md-block d-xl-flex justify-content-between">
                            <h6 class="preview-subject">Mail</h6>
                          </div>
                          <a class="text-muted" href="mailto:{{ $event->contacts[0]->mail }}" >{{ $event->contacts[0]->mail }}</a>
                        </div>
                      </div>
                    </div>
                  <div class="preview-item border-bottom">
                      <div class="preview-item-content d-flex flex-grow">
                        <div class="flex-grow">
                          <div class="d-flex d-md-block d-xl-flex justify-content-between">
                            <h6 class="preview-subject">Site Web</h6>
                          </div>
                          <a class="text-muted" href="{{ $event->contacts[0]->web_site }}" target="_blank">{{ $event->contacts[0]->web_site }}</a>
                        </div>
                      </div>
                  </div>
                @endif

                </div>
            </div>
          </div>
      </div>
</div>

<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Horaire d'ouverture</h4>

        </div>
      </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Horaire des Activités</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

          <p class="card-description"> Horizontal form layout </p>
          <form class="forms-sample" method="POST" action="{{Route('schedule.event', ['event'  => $event])}} ">
            @csrf
            <div class="form-group row">
                <label for="dateStart" class="col-sm-3 col-form-label">Date de debut</label>
                <div class="col-sm-9">
                  <input type="date" class="form-control" id="dateStart" eventholder="Username" name="dateStart">
                </div>
            </div>

            <div class="form-group row">
                <label for="dateEnd" class="col-sm-3 col-form-label">Date de fin</label>
                <div class="col-sm-9">
                  <input type="date" class="form-control" id="dateEnd" name="dateEnd">
                </div>
            </div>

            <div class="form-group row">
                <label for="timeStart" class="col-sm-3 col-form-label">Heure de debut</label>
                <div class="col-sm-9">
                  <input type="time" class="form-control" id="timeStart" name="timeStart">
                </div>
            </div>

            <div class="form-group row">
                <label for="timeEnd" class="col-sm-3 col-form-label">Heure de fin</label>
                <div class="col-sm-9">
                  <input type="time" class="form-control" id="timeEnd" name="timeEnd">
                </div>
            </div>

            <div class="form-group row">
                <label for="title" class="col-sm-3 col-form-label">Titre</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="title" name="title">
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-9">
                  <textarea class="form-control" id="description" rows="4" name="description"></textarea>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection