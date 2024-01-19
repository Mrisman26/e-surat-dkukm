@foreach ($data as $file)
    <tr>
        <td>{{ $file->original_name }}</td>
        <td>
            <a href="{{ route('delete.pdf', ['id' => $file->id]) }}" onclick="return confirm('Anda yakin ingin menghapus file ini?')">Hapus</a>
        </td>
    </tr>
@endforeach
