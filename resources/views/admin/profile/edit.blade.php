@extends('admin.layouts.layout')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Hi, {{ $user->name }}</h2>
            <p class="section-lead">
                Change information about yourself on this page.
            </p>

            <div class="row mt-sm-4">


                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        @if (session('profile'))
                        <div class="text-success">{{ session('profile') }}</div>
                        @endif
                        <form method="post" class="needs-validation" action="{{ route('profile.update') }}">
                            @csrf
                            @method('patch')
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name', $user->name) }}" required>
                                        <x-input-error class="mt-2" :messages="$errors->get('name')" />

                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control"
                                            value="{{ old('email', $user->email) }}" required="">
                                        <x-input-error class="mt-2" :messages="$errors->get('email')" />

                                    </div>
                                </div>

                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        @if (session('password'))
                        <div class="text-success">{{ session('password') }}</div>
                        @endif
                        <form method="post" class="needs-validation" action="{{ route('password.update') }}">
                            @csrf
                            @method('put')
                            <div class="card-header">
                                <h4>update password</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Current Password</label>
                                        <input type="password" name="current_password" class="form-control" required>
                                        <x-input-error class="mt-2" :messages="$errors->get('current_password')" />

                                    </div>
                                    <div class="form-group col-md-12 col-12">
                                        <label>New Password</label>
                                        <input type="password" name="password" class="form-control" required="">
                                        <x-input-error class="mt-2" :messages="$errors->get('password')" />

                                    </div>


                                    <div class="form-group col-md-12 col-12">
                                        <label>Password Confirmation</label>
                                        <input type="password" name="password_confirmation" class="form-control"
                                            required="">
                                        <x-input-error class="mt-2" :messages="$errors->get('password_confirmation')" />

                                    </div>


                                </div>

                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
