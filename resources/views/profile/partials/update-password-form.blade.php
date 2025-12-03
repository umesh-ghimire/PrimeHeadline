<div class="mb-0">
    <h5 class="card-title mb-3 fw-semibold">{{ __('Update Password') }}</h5>
    <p class="text-muted mb-4">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </p>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <!-- Current Password -->
        <div class="mb-3">
            <label for="update_password_current_password" class="form-label fw-medium">{{ __('Current Password') }}</label>
            <input type="password"
                   class="form-control @error('current_password', 'updatePassword') is-invalid @enderror"
                   id="update_password_current_password"
                   name="current_password"
                   autocomplete="current-password">
            @error('current_password', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- New Password -->
        <div class="mb-3">
            <label for="update_password_password" class="form-label fw-medium">{{ __('New Password') }}</label>
            <input type="password"
                   class="form-control @error('password', 'updatePassword') is-invalid @enderror"
                   id="update_password_password"
                   name="password"
                   autocomplete="new-password">
            @error('password', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <label for="update_password_password_confirmation" class="form-label fw-medium">{{ __('Confirm Password') }}</label>
            <input type="password"
                   class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror"
                   id="update_password_password_confirmation"
                   name="password_confirmation"
                   autocomplete="new-password">
            @error('password_confirmation', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Save Button -->
        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary px-4">
                {{ __('Save') }}
            </button>

            <!-- Success Message -->
            @if (session('status') === 'password-updated')
                <div x-data="{ show: true }"
                     x-show="show"
                     x-transition
                     x-init="setTimeout(() => show = false, 2000)"
                     class="text-success fw-medium">
                    <i class="bi bi-check-circle-fill me-1"></i>{{ __('Saved.') }}
                </div>
            @endif
        </div>
    </form>
</div>
