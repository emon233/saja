@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('instructions.update', $instructions->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="home" class="col-md-3 col-form-label text-md-right">{{ __('Home Page') }}</label>

                        <div class="col-md-9">
                            <textarea class="form-control" rows="6" id="home" name="home">{{ $instructions->home }}</textarea>
                            @error('home')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary float-right" value="UPDATE">
                </form>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('instructions.update', $instructions->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="guideline" class="col-md-3 col-form-label text-md-right">{{ __("Author's Guideline") }}</label>

                        <div class="col-md-9">
                            <textarea class="form-control" rows="6" id="guideline" name="guideline">{{ $instructions->guideline }}</textarea>
                            @error('guideline')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary float-right" value="UPDATE">
                </form>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('instructions.update', $instructions->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="publication_fee" class="col-md-3 col-form-label text-md-right">{{ __("Publication Fees") }}</label>

                        <div class="col-md-9">
                            <textarea class="form-control" rows="6" id="publication_fee" name="publication_fee">{{ $instructions->publication_fee }}</textarea>
                            @error('publication_fee')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary float-right" value="UPDATE">
                </form>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('instructions.update', $instructions->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="payment_method" class="col-md-3 col-form-label text-md-right">{{ __("Payment Method") }}</label>

                        <div class="col-md-9">
                            <textarea class="form-control" rows="6" id="payment_method" name="payment_method">{{ $instructions->payment_method }}</textarea>
                            @error('payment_method')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary float-right" value="UPDATE">
                </form>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('instructions.update', $instructions->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="publication_ethics" class="col-md-3 col-form-label text-md-right">{{ __("Publication Ethics") }}</label>

                        <div class="col-md-9">
                            <textarea class="form-control" rows="6" id="publication_ethics" name="publication_ethics">{{ $instructions->publication_ethics }}</textarea>
                            @error('publication_ethics')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary float-right" value="UPDATE">
                </form>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('instructions.update', $instructions->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="contact" class="col-md-3 col-form-label text-md-right">{{ __("Contact") }}</label>

                        <div class="col-md-9">
                            <textarea class="form-control" rows="6" id="contact" name="contact">{{ $instructions->contact }}</textarea>
                            @error('contact')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary float-right" value="UPDATE">
                </form>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('instructions.update', $instructions->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="advisors" class="col-md-3 col-form-label text-md-right">{{ __("Advisors") }}</label>

                        <div class="col-md-9">
                            <textarea class="form-control" rows="6" id="advisors" name="advisors">{{ $instructions->advisors }}</textarea>
                            @error('advisors')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary float-right" value="UPDATE">
                </form>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('instructions.update', $instructions->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="chief_editor" class="col-md-3 col-form-label text-md-right">{{ __("Chief Editor") }}</label>

                        <div class="col-md-9">
                            <textarea class="form-control" rows="6" id="chief_editor" name="chief_editor">{{ $instructions->chief_editor }}</textarea>
                            @error('chief_editor')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary float-right" value="UPDATE">
                </form>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('instructions.update', $instructions->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="executive_editor" class="col-md-3 col-form-label text-md-right">{{ __("Executive Editor") }}</label>

                        <div class="col-md-9">
                            <textarea class="form-control" rows="6" id="executive_editor" name="executive_editor">{{ $instructions->executive_editor }}</textarea>
                            @error('executive_editor')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary float-right" value="UPDATE">
                </form>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('instructions.update', $instructions->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="asso_exe_editor" class="col-md-3 col-form-label text-md-right">{{ __("Associate Executive Editor") }}</label>

                        <div class="col-md-9">
                            <textarea class="form-control" rows="6" id="asso_exe_editor" name="asso_exe_editor">{{ $instructions->asso_exe_editor }}</textarea>
                            @error('asso_exe_editor')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary float-right" value="UPDATE">
                </form>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('instructions.update', $instructions->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="editors" class="col-md-3 col-form-label text-md-right">{{ __("Editors") }}</label>

                        <div class="col-md-9">
                            <textarea class="form-control" rows="6" id="editors" name="editors">{{ $instructions->editors }}</textarea>
                            @error('editors')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary float-right" value="UPDATE">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection