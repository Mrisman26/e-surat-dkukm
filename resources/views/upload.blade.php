<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File PDF</title>
</head>
<body>
    <form action="{{ route('uploadpdf') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="pdf">Pilih File PDF:</label>
        <input type="file" name="pdf" accept=".pdf" required>
        <button type="submit">Upload</button>
    </form>

</body>
</html>
