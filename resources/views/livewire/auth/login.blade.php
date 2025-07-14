<div class="min-h-screen flex items-center justify-center px-4">
  <div class="w-full max-w-md space-y-6">
    <div class="text-center">
      <h2 class="text-3xl font-bold">Masuk ke Shortbae</h2>
      <p class="mt-2 text-sm">Selamat datang kembali!</p>
    </div>

    <form wire:submit.prevent="login" class="space-y-4">
      <div>
        <label class="label" for="email">Email</label>
        <input id="email" type="email" wire:model.defer="email" class="input input-bordered w-full" >
        @error('email')
        <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
        @enderror
      </div>

      <div>
        <label class="label" for="password">Password</label>
        <input id="password" type="password" wire:model.defer="password" class="input input-bordered w-full" >
        @error("password")
        <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
        @enderror
      </div>

      <div class="flex justify-between items-center text-sm">
        <label class="cursor-pointer flex items-center gap-2">
          <input type="checkbox" wire:model="remember" class="checkbox checkbox-sm">
          Ingat saya
        </label>
        <a href="#" class="link" wire:navigate>Lupa password?</a>
      </div>

      <button class="btn btn-primary w-full">
        <span class="loading loading-spinner" wire:loading></span>
        Masuk
      </button>
    </form>

    <p class="text-sm text-center">
      Belum punya akun?
      <a href="{{ route('register') }}" class="link">Daftar sekarang</a>
    </p>
  </div>
</div>
