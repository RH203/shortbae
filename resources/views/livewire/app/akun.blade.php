<div class="max-w-2xl mx-auto py-10 px-4 space-y-10">

  {{-- Profil --}}
  <div class="border rounded-xl p-6 shadow-sm space-y-4">
    <h2 class="text-xl font-semibold">Informasi Akun</h2>

    <div>
      <label class="block text-sm font-medium mb-1">Nama</label>
      <input type="text" wire:model.defer="name" class="input input-bordered w-full" placeholder="Nama lengkap">
      @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <div>
      <label class="block text-sm font-medium mb-1">Email</label>
      <input type="email" wire:model.defer="email" class="input input-bordered w-full" placeholder="email@example.com">
      @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

      @if (!$this->emailVerified)
        <div class="mt-2 text-sm text-yellow-600" wire:poll>
          Email belum diverifikasi.
          <button wire:click="sendEmailVerification" class="underline ml-2 text-sm">Kirim ulang verifikasi</button>
        </div>
      @else
        <div class="mt-2 text-sm text-green-600">Email terverifikasi</div>
      @endif
    </div>

    <button wire:click="updateProfile" class="btn w-full">Simpan Perubahan</button>
  </div>

  {{-- Ubah Password (jika user sudah pernah set password) --}}
  @if ($this->hasPassword)
    <div class="border rounded-xl p-6 shadow-sm space-y-4">
      <h2 class="text-xl font-semibold">Ubah Password</h2>

      <div>
        <label class="block text-sm font-medium mb-1">Password Saat Ini</label>
        <input type="password" wire:model.defer="current_password" class="input input-bordered w-full">
        @error('current_password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
      </div>

      <div>
        <label class="block text-sm font-medium mb-1">Password Baru</label>
        <input type="password" wire:model.defer="new_password" class="input input-bordered w-full">
        @error('new_password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
      </div>

      <div>
        <label class="block text-sm font-medium mb-1">Konfirmasi Password Baru</label>
        <input type="password" wire:model.defer="new_password_confirmation" class="input input-bordered w-full">
      </div>

      <button wire:click="updatePassword" class="btn w-full">Update Password</button>
    </div>
  @endif

</div>
