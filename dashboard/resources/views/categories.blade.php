<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>

  <body>
    <div class="container">      
      <h1 class="text-center mb-5 pb-2">categories</h1>
      <button type="button" class="btn btn-success">Add New Categories</button>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">category_name</th>
            <th scope="col">description</th>
            <th scope="col">aksi</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($data as $row)
          <tr>
            <th scope="row">{{$row->id}}</th>
            <td>{{$row->category_name}}</td>
            <td>{{$row->description}}</td>
            <td>
              <button type="button" class="btn btn-primary">Edit</button>
              <button type="button" class="btn btn-danger">Delete</button>
            </td>
          </tr>  
        @endforeach
        </tbody>
      </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>