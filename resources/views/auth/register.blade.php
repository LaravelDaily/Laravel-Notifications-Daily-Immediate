@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">

        <div class="card mx-4">
            <div class="card-body p-4">

                <form method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <h1>{{ trans('panel.site_title') }}</h1>
                    <p class="text-muted">{{ trans('global.register') }}</p>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-user fa-fw"></i>
                            </span>
                        </div>
                        <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus placeholder="{{ trans('global.user_name') }}" value="{{ old('name', null) }}">
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-envelope fa-fw"></i>
                            </span>
                        </div>
                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-lock fa-fw"></i>
                            </span>
                        </div>
                        <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">
                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-lock fa-fw"></i>
                            </span>
                        </div>
                        <input type="password" name="password_confirmation" class="form-control" required placeholder="{{ trans('global.login_password_confirmation') }}">
                    </div>

                    <div class="form-group">
                        <select class="form-control select2 {{ $errors->has('skills') ? 'is-invalid' : '' }}" name="skills[]" id="skills" multiple>
                            @foreach($skills as $id => $skills)
                                <option value="{{ $id }}" {{ in_array($id, old('skills', [])) ? 'selected' : '' }}>{{ $skills }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('skills'))
                            <div class="invalid-feedback">
                                {{ $errors->first('skills') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.user.fields.skills_helper') }}</span>
                    </div>

                    <div class="form-group">
                        <label class="required">{{ trans('cruds.user.fields.notifications_frequency') }}</label>
                        @foreach(App\User::NOTIFICATIONS_FREQUENCY_RADIO as $key => $label)
                            <div class="form-check {{ $errors->has('notifications_frequency') ? 'is-invalid' : '' }}">
                                <input class="form-check-input" type="radio" id="notifications_frequency_{{ $key }}" name="notifications_frequency" value="{{ $key }}" {{ old('notifications_frequency', 'once') === (string) $key ? 'checked' : '' }} required>
                                <label class="form-check-label" for="notifications_frequency_{{ $key }}">{{ $label }}</label>
                            </div>
                        @endforeach
                        @if($errors->has('notifications_frequency'))
                            <div class="invalid-feedback">
                                {{ $errors->first('notifications_frequency') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.user.fields.notifications_frequency_helper') }}</span>
                    </div>

                    <button class="btn btn-block btn-primary">
                        {{ trans('global.register') }}
                    </button>
                </form>

            </div>
        </div>

    </div>
</div>

@endsection

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
<script>
$('.select2').select2({'placeholder': ' Skills'})
</script>
@endsection