@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('新規登録') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf


                        <div class="row mb-3 mt-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('メールアドレス') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('パスワード') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('パスワード(確認用)') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="country" class="col-md-4 col-form-label text-md-end">{{ __('滞在国') }}</label>

                            <div class="col-md-6">
                                <select name="country" id="country" class="form-select">
                                    <option value="" hidden>--</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Canada">Canada</option>
                                    <option value="New Zealand">New Zealand</option>
                                </select>
                            </div>

                            @error('country')
                                <span class="invalid-feedback" role="alert" style="display:inline;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-5">
                            <label for="stay_year" class="col-md-4 col-form-label text-md-end">{{ __('滞在期間') }}</label>

                            <div class="col-md-2">
                                <input id="stay_year" type="number" class="form-control" name="stay_year" required>
                            </div>
                            <div class="col-md-1 my-auto">
                                <span>年</span>
                            </div>

                            <div class="col-md-2">
                                <input id="stay_month" type="number" class="form-control" name="stay_month" required>
                            </div>

                            <div class="col-md-1 my-auto">
                                <span>ヶ月</span>
                            </div>

                            <div class="offset-md-4">
                            @error('stay_year')
                                <span class="invalid-feedback" role="alert" style="display:inline;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>

                            <div class="offset-md-4">
                            @error('stay_month')
                                <span class="invalid-feedback" role="alert" style="display:inline;">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary form-control">
                                    {{ __('登録') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
