@extends('admin.app')

@section('pageTitle', 'Add Place')

@section('content')

<div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        @if (count($errors)>0)

            <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
            </div>
            
        @endif
        <h4 class="card-title"> Nouveau Lieu</h4>
        <form class="form-sample" method="POST" action="{{Route('place.store')}} " enctype="multipart/form-data">
            @csrf
            <p class="card-description"> Place info </p>
            <div class="row">
                <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nom</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="name" />
                    </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Déscription</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="exampleTextarea1" rows="4" name="description"></textarea>
                    </div>
                </div>
                </div>
            </div>
            <p class="card-description"> Addresse </p>
            <div class="row">
                <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Commune</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="town" />
                    </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Quartier</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="district" />
                    </div>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Avenue</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="avenue" />
                    </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nº</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="number" />
                    </div>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Ville</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" name="city" />
                    </div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Pays</label>
                    <div class="col-sm-9">
                    <select class="form-control" name="country">
                        <option value="Congo-Kinshasa">Congo-Kinshasa</option>
                        <option value="Congo-Brazza">Congo-Brazza</option>
                        <option value="Cote d'Ivoire">Cote d'Ivoire</option>
                    </select>
                    </div>
                </div>
                </div>
            </div>
            <p class="card-description"> Categories </p>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Categorie</label>
                        <div class="col-sm-9">
                            <select class="js-example-basic-multiple form-control" multiple="multiple" name="categories[]" style="width:100%" required>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>   
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">File upload</label>
                        <div class="col-sm-9">
                            <input type="file" name="img[]" class="file-upload-default" accept=".jpg, .png, image/jpeg, image/png" multiple>
                            <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="card-description"> Contact </p>
            <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Telephone</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="phone" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="mail" />
                            </div>
                        </div>
                    </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Site Web</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="web_site" />
                        </div>
                    </div>
                </div>
            </div>

            <p class="card-description"> Horaire </p>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class=" col-form-label">Les controles pour créer l'horaire seront ici</label>
                        
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
      </div>
    </div>
</div>

@endsection