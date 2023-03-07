{{-- dd($file) --}}

<div class="card">
{!! $file->img !!}
  <div class="card-body">
    <strong>File Name: </strong> {!! $file->original_file_name !!}
    <br>
    <strong>File Size: </strong>{{ $file->file_size }},
    <br>
    <strong>File Ext: </strong>{{ $file->file_ext }},
    <br>
    <strong>Hash: </strong> {{ $file->hash }}
  </div>
</div>