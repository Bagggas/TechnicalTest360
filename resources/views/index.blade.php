<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
      <div class="container">
        <form action="/book/create" method="post">
            @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">nama buku</label>
              <input name="nama_buku" class="form-control" type="text" placeholder="Default input" aria-label="default input example">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">penulis</label>
              <input name="penulis_buku" class="form-control" type="text" placeholder="Default input" aria-label="default input example">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Buku</th>
                <th scope="col">Penulis</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($books as  $v)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{ $v->nama_buku }}</td>
                        <td>{{ $v->penulis_buku }}</td>
                        <td>
                            <form id="form" class="delete-form" action="/book/delete/{{$v->id}}"
                                method="POST">
                              @csrf
                              <a href="/book/edit/{{$v->id}}"><button type="button" class="btn btn-outline-warning btn-sm">Edit</button></a>
                              <a href="/book/pinjam/{{$v->id}}"><button type="button" class="btn btn-outline-success btn-sm">Pinjam</button></a>
                              @method('DELETE')
                              <button type="submit" class="btn btn-outline-danger btn-sm" onclick="deleteFunction()">Hapus</button>
                          </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>

          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Buku</th>
                <th scope="col">Peminjam</th>
                <th scope="col">No Hp</th>
                <th scope="col">email</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($borrow as  $v)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$v->nama_buku}}</td>
                    <td>{{$v->nama_peminjam}}</td>
                    <td>{{$v->no_hp}}</td>
                    <td>{{$v->email}}</td>
                  </tr>
                @endforeach
            </tbody>
          </table>
      </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
