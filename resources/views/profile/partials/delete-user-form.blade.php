<section>
    <header style="margin-bottom: 24px;">
        <h2 style="font-size: 1.25rem; font-weight: 600; color: var(--text-main);">
            {{ __('Delete Account') }}
        </h2>
        <p style="color: var(--text-muted); font-size: 0.9rem; margin-top: 4px;">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <button type="button" class="btn btn-danger" onclick="document.getElementById('confirm-user-deletion').style.display='block'">
        {{ __('Delete Account') }}
    </button>

    <!-- Modal -->
    <div id="confirm-user-deletion" style="display: {{ $errors->userDeletion->isNotEmpty() ? 'block' : 'none' }}; position: fixed; z-index: 1000; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5);">
        <div class="card" style="margin: 10% auto; max-width: 500px; position: relative;">
            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')

                <h2 style="font-size: 1.25rem; font-weight: 600; color: var(--text-main); margin-bottom: 12px;">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>

                <p style="color: var(--text-muted); font-size: 0.9rem; margin-bottom: 24px;">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>

                <div class="form-group">
                    <label for="password" class="form-label sr-only">{{ __('Password') }}</label>
                    <input id="password" name="password" type="password" class="form-control" placeholder="{{ __('Password') }}">
                    @if($errors->userDeletion->has('password'))
                        <span class="text-danger">{{ $errors->userDeletion->first('password') }}</span>
                    @endif
                </div>

                <div style="display: flex; justify-content: flex-end; gap: 12px; margin-top: 24px;">
                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('confirm-user-deletion').style.display='none'">
                        {{ __('Cancel') }}
                    </button>

                    <button type="submit" class="btn btn-danger">
                        {{ __('Delete Account') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
