<div class="min-h-screen flex items-center justify-center px-4">
  <div class="w-full max-w-md space-y-6">
    <div class="text-center">
      <h2 class="text-3xl font-bold">Buat Short URL</h2>
      <p class="mt-2 text-sm">Masukkan link dan tanggal kedaluwarsa opsional.</p>
    </div>

    <form wire:submit.prevent="shorten" class="space-y-4">
      <div>
        <label class="label" for="url">Link Panjang</label>
        <input type="url" id="url" wire:model.defer="url" class="input input-bordered w-full" placeholder="https://example.com/12314534">
        @error('url')
        <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
        @enderror
      </div>

      <div>
        <label class="label" for="custom_code">Custom Short Link (opsional)</label>
        <input type="text" id="custom_code" wire:model.defer="custom_code" class="input input-bordered w-full" placeholder="misalnya: abc123">
        @error('custom_code')
        <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
        @enderror
      </div>

      <div>
        <label class="label" for="password">Password (opsional)</label>
        <input type="text" id="password" wire:model.defer="password" class="input input-bordered w-full">
        @error('password')
        <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
        @enderror
      </div>

      <div>
        <label class="label" for="expired_at">Tanggal Kedaluwarsa (opsional)</label>
        <input type="text" class="input w-full" placeholder="YYYY-MM-DD" id="flatpickr-date" />
        @error('expired_at')
        <span class="text-sm text-red-500 mt-1">{{ $message }}</span>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary w-full">
        <span class="loading loading-spinner" wire:loading></span>
        Pendekin!
      </button>
    </form>

    <p class="text-sm text-center">
      <a href="{{ route('index') }}" class="link">Kembali ke dashboard</a>
    </p>
  </div>
</div>


