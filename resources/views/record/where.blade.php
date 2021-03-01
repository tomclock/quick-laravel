<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>速習Laravel</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
</head>
<body>
<table class="table">
<tr>
  <th>出版社</th>
  <th>価格</th>
</tr>
@foreach ($records as $record) 
  <tr>
    <td>{{ $record->publisher }}</td>
    <td>{{ $record->price_avg }}円</td>
  </tr>
@endforeach
</table>
</body>
</html>