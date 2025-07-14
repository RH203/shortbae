<div class="mt-6 space-y-3 p-4 border rounded-xl shadow-sm">
  <h3 class="text-lg font-semibold">URL Berhasil Dipendekkan</h3>

  <div class="flex flex-col md:flex-row gap-3 md:items-center">
    <!-- Input readonly -->
    <div class="input-group w-full">
      <input type="text"
             class="input w-full"
             id="shortened-url"
             value="{{ config('app.url') . '/' . $shortenedUrl->short_url }}"
             readonly />
    </div>

    <!-- Action buttons -->
    <div class="flex gap-2">
      <a href="{{ $shortenedUrl->url }}" target="_blank" class="btn btn-ghost text-sm">
        Buka
      </a>
      <button type="button" class="btn btn-ghost text-sm" onclick="copyToClipboard('{{  config('app.url') . '/' . $shortenedUrl->short_url }}')">
        Salin
      </button>
    </div>
  </div>
</div>


<script>
  function copyToClipboard(text) {
    navigator.clipboard.writeText(text)
      .then(() => {
        Swal.fire({
          icon: 'success',
          title: 'Disalin!',
          text: 'URL berhasil disalin ke clipboard',
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3500,
        });
      })
      .catch(() => {
        Swal.fire({
          icon: 'error',
          title: 'Oops!',
          text: 'Gagal menyalin URL',
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 2000
        });
      });
  }
</script>
