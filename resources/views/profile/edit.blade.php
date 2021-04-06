@extends('layouts.app', ['titlePage' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Hello') . ' '. auth()->user()->name,
        'description' => __('"Kesehatan yang baik bukanlah sesuatu yang dapat kita beli. Namun, sesuatu yang dapat menjadi tabungan yang sangat berharga." '),
        'description1' => __('- Anne Wilson Schaef'),
        'class' => 'col-lg-7'
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            {{-- <div class="col-xl-5 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-info mr-4">{{ __('Connect') }}</a>
                            <a href="#" class="btn btn-sm btn-default float-right">{{ __('Message') }}</a>
                        </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                    <div>
                                        <span class="heading">{{$last_suhu_user->suhu}}</span>
                                        <span class="description">{{ __('Suhu') }}</span>
                                    </div>
                                    <div>
                                        <span class="heading">{{$last_detak_user->bpm}}</span>
                                        <span class="description">{{ __('Detak Jantung') }}</span>
                                    </div>
                                    <div>
                                        <span class="heading">{{$last_detak_user->oksigen}}</span>
                                        <span class="description">{{ __('Oksigen') }}</span>
                                    </div>
                                    <div>
                                        <span class="heading">{{$last_tekanan_user->sistole}}/{{$last_tekanan_user->diastole}}</span>
                                        <span class="description">{{ __('Tekanan Darah') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3>
                                {{ auth()->user()->name }}<span class="font-weight-light">, 27</span>
                            </h3>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>{{ __('Bucharest, Romania') }}
                            </div>

                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Edit Profile') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>

                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif


                            <div class="pl-lg-4">
                                <div class="row">

                                    @if (auth()->user()->is_admin == 1)
                                        <div></div>
                                    @else
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-pasien">{{ __('No Pasien') }}</label>
                                                <input type="text"  id="input-no_pasien" class="form-control form-control-alternative}" value="{{ auth()->user()->no_pasien }}" disabled>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="col-lg-6">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                            <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                            <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group{{ $errors->has('nik') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-nik">{{ __('NIK') }}</label>
                                            <input type="text" name="nik" id="input-nik" class="form-control form-control-alternative{{ $errors->has('nik') ? ' is-invalid' : '' }}" placeholder="{{ __('NIK') }}" value="{{ old('nik', auth()->user()->nik) }}" required autofocus>

                                            @if ($errors->has('nik'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('nik') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group{{ $errors->has('golongan_darah') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-golongan_darah">{{ __('Golongan Darah') }}</label>
                                            <select name="golongan_darah" id="input-golongan_darah" class="form-control">
                                                <option value="" selected disabled>Pilih Golongan Darah</option>
                                                {{-- @foreach (auth()->user()['golongan_darah'] as $goldar)
                                                    <option value="{{$goldar}}" @if ($goldar == auth()->user()->golongan_darah) "selected" @endif >{{$goldar}}</option>
                                                @endforeach --}}
                                                <option value="A" {{(auth()->user()->golongan_darah == 'A') ? 'selected' : ''}} >A</option>
                                                <option value="B" {{(auth()->user()->golongan_darah == 'B') ? 'selected' : ''}}>B</option>
                                                <option value="AB" {{(auth()->user()->golongan_darah == 'AB') ? 'selected' : ''}}>AB</option>
                                                <option value="O" {{(auth()->user()->golongan_darah == 'O') ? 'selected' : ''}}>O</option>
                                            </select>

                                            @if ($errors->has('golongan_darah'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('golongan_darah') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('alamat') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-alamat">{{ __('Alamat') }}</label>
                                    <input type="text" name="alamat" id="input-alamat" class="form-control form-control-alternative{{ $errors->has('alamat') ? ' is-invalid' : '' }}" placeholder="{{ __('alamat') }}" value="{{ old('alamat', auth()->user()->alamat) }}" required>

                                    @if ($errors->has('alamat'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('alamat') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group{{ $errors->has('no_telp') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-no_telp">{{ __('No. Telp') }}</label>
                                            <input type="text" name="no_telp" id="input-no_telp" class="form-control form-control-alternative{{ $errors->has('no_telp') ? ' is-invalid' : '' }}" placeholder="{{ __('No. Telp') }}" value="{{ old('no_telp', auth()->user()->no_telp) }}" required autofocus>

                                            @if ($errors->has('no_telp'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('no_telp') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group{{ $errors->has('tanggal_lahir') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-tanggal_lahir">{{ __('Tanggal Lahir') }}</label>
                                            <input type="date" name="tanggal_lahir" id="input-tanggal_lahir" class="form-control form-control-alternative{{ $errors->has('tanggal_lahir') ? ' is-invalid' : '' }}" placeholder="{{ __('Tanggal_lahir') }}" value="{{ old('tanggal_lahir', auth()->user()->tanggal_lahir) }}" required>

                                            @if ($errors->has('tanggal_lahir'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                        <hr class="my-4" />
                        <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Password') }}</h6>

                            @if (session('password_status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('password_status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-current-password">{{ __('Current Password') }}</label>
                                    <input type="password" name="old_password" id="input-current-password" class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="" required>

                                    @if ($errors->has('old_password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('New Password') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm New Password') }}" value="" required>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Change password') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
