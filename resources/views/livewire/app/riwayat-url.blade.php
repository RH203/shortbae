<div>
  <div class=" overflow-x-auto border-base-content/25 w-full rounded-lg border">
    <table class="table">
      <thead>
      <tr>
{{--        <th>Real URL</th>--}}
        <th>Short URL</th>
        <th>Visit Count</th>
        <th>Expired At</th>
        <th>Aksi</th>
      </tr>
      </thead>
      <tbody>
      @foreach($datas as $data)
      <tr class="row-hover">
{{--        <td>{{ $data->url }}</td>--}}
        <td>{{ config('app.url') . '/' . $data->short_url }}</td>
        <td>{{ $data->visit_count ?? '0' }}</td>
        <td>{{ $data->expired_at ?? 'null' }}</td>
        <td>
          <a class="btn btn-circle btn-text btn-sm" aria-label="Action button" href="{{ route('result', ['id' => $data->id]) }}" wire:navigate><span class="icon-[tabler--eye] size-5 border-1"></span></a>
          <button class="btn btn-circle btn-text btn-sm" aria-label="Action button" onclick="copyToClipboard('{{  config('app.url') . '/' . $data->short_url }}')"><span class="icon-[tabler--copy] size-5 border-1"></span></button>
        </td>
      </tr>
      @endforeach
      </tbody>
    </table>
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
