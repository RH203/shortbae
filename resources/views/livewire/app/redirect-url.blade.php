<div class=" flex items-center justify-center p-4">
  <div class="w-full max-w-md space-y-6">
    <div class="text-center">
      <h2 class="text-2xl font-semibold">Protected Link</h2>
      <p class="text-sm mt-2">This shortened link requires a password.</p>
    </div>

    <form wire:submit.prevent="verifyPassword" class="space-y-4">
      <div>
        <label for="password" class="label">Password</label>
        <input id="password" type="password" wire:model.defer="password" class="input input-bordered w-full">
        @error('password')
        <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror
      </div>

      <button type="submit" class="btn btn-block">
        <span class="loading loading-spinner" wire:loading></span>
        Unlock & Redirect
      </button>
    </form>

    @if($errorMessage)
      <div class="text-center text-sm text-red-500">
        {{ $errorMessage }}
      </div>
    @endif
  </div>
</div>
