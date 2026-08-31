@extends('layouts.admin', ['header' => __('Profile')])

@section('content')
    <div style="display: flex; flex-direction: column; gap: 24px; max-width: 800px; margin: 0 auto;">
        <div class="card">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="card">
            @include('profile.partials.update-password-form')
        </div>

        <div class="card">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
@endsection
