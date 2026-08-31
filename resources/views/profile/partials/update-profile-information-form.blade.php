<section>
    <header style="margin-bottom: 24px;">
        <h2 style="font-size: 1.25rem; font-weight: 600; color: var(--text-main);">
            {{ __('Profile Information') }}
        </h2>
        <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 4px;">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        @if (session('status') === 'profile-updated')
            <div id="profile-updated-alert" style="background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 12px 16px; border-radius: 8px; margin-bottom: 24px; display: flex; justify-content: space-between; align-items: center;">
                <span>{{ __('Profile updated successfully.') }}</span>
                <button type="button" onclick="document.getElementById('profile-updated-alert').style.display='none'" style="background: none; border: none; font-size: 1.25rem; font-weight: bold; line-height: 1; color: #155724; cursor: pointer;">&times;</button>
            </div>
        @endif

        <div class="form-group">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="username">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div style="margin-top: 12px;">
                    <p style="font-size: 0.9rem; color: var(--text-main);">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" style="background: none; border: none; color: var(--primary-color); text-decoration: underline; cursor: pointer; padding: 0;">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p style="margin-top: 8px; font-weight: 500; font-size: 0.9rem; color: #2ecc71;">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div style="display: flex; align-items: center; gap: 16px;">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        </div>
    </form>
</section>
