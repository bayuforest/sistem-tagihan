<section>
    <header style="margin-bottom: 24px;">
        <h2 style="font-size: 1.25rem; font-weight: 600; color: var(--text-main);">
            {{ __('Update Password') }}
        </h2>
        <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 4px;">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        @if (session('status') === 'password-updated')
            <div id="password-updated-alert" style="background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 12px 16px; border-radius: 8px; margin-bottom: 24px; display: flex; justify-content: space-between; align-items: center;">
                <span>{{ __('Password updated successfully.') }}</span>
                <button type="button" onclick="document.getElementById('password-updated-alert').style.display='none'" style="background: none; border: none; font-size: 1.25rem; font-weight: bold; line-height: 1; color: #155724; cursor: pointer;">&times;</button>
            </div>
        @endif

        <div class="form-group">
            <label for="update_password_current_password" class="form-label">{{ __('Current Password') }}</label>
            <input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password">
            @if($errors->updatePassword->has('current_password'))
                <span class="text-danger">{{ $errors->updatePassword->first('current_password') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="update_password_password" class="form-label">{{ __('New Password') }}</label>
            <input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password">
            @if($errors->updatePassword->has('password'))
                <span class="text-danger">{{ $errors->updatePassword->first('password') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="update_password_password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password">
            @if($errors->updatePassword->has('password_confirmation'))
                <span class="text-danger">{{ $errors->updatePassword->first('password_confirmation') }}</span>
            @endif
        </div>

        <div style="display: flex; align-items: center; gap: 16px;">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        </div>
    </form>
</section>
