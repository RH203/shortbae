<div class="min-h-screen flex items-center justify-center px-4">
  <div class="w-full max-w-md space-y-6">
    <div class="text-center">
      <h2 class="text-3xl font-bold">Daftar ke Shortbae</h2>
      <p class="mt-2 text-sm">Yuk mulai persingkat link kamu!</p>
    </div>

    <form wire:submit.prevent="register" class="space-y-4">
      <div>
        <label class="label" for="name">Nama</label>
        <input id="name" type="text" wire:model.defer="name" class="input input-bordered w-full">
        @error("name")
        <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
        @enderror
      </div>

      <div>
        <label class="label" for="email">Email</label>
        <input id="email" type="email" wire:model.defer="email" class="input input-bordered w-full">
        @error("email")
        <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
        @enderror
      </div>

      <div>
        <label class="label" for="password">Password</label>
        <input id="password" type="password" wire:model.defer="password" class="input input-bordered w-full">
        @error("password")
        <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
        @enderror
      </div>

      <div>
        <label class="label" for="password_confirmation">Konfirmasi Password</label>
        <input id="password_confirmation" type="password" wire:model.defer="password_confirmation"
               class="input input-bordered w-full" required>
        @error('password_confirmation')
        <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary w-full">
        <span class="loading loading-spinner" wire:loading></span>
        Daftar
      </button>
    </form>

    <p class="text-sm text-center">
      Sudah punya akun?
      <a href="{{ route('login') }}" class="link" wire:navigate>Masuk</a>
    </p>
  </div>
</div>
