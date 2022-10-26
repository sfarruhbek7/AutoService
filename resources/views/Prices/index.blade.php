<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Servis xizmati</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>

<div class=" mb-3" role="document">
    <nav class="navbar navbar-expand-lg bg-light " style="box-shadow: 0px 0px 10px 10px #bcbcbc">
        <div class="container-fluid d-flex justify-content-between " style="width: 600px;">
            <a class="navbar-brand " href="/dashboard">Home</a>


            <div class="navbar-nav">
                <a class="nav-link" aria-current="page" href="/index">Navbat</a>
                <a class="nav-link" href="/ishchilar">Ishchilar</a>
                <a class="nav-link active" style="color: blue" href="/service">Servis</a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link style="color: red;" class="nav-link active" :href="route('logout')"
                                           onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>

        </div>
    </nav>

<div class="container card pt-3 mt-4" style="box-shadow: 0px 0px 10px 10px #9e9e9e">
    <h2 class="text text-info text-center">Service Xizmatlari</h2>
    <div class="d-flex justify-content-end">
        <!--        <a href="add.php" class="btn btn-success" style="margin-bottom: 3px">Ma'lumot qo'shish</a>-->
        <button  class="btn btn-success" type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal">
            Ma`lumot Qo`shish
        </button>
    </div>
    <br>

    <!--    //modal: malumot qoshish-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"></button>
                </div>
                <div class="modal-body" >
                    <form action="{{route('prices.store')}}" method="post">
                        @csrf
                        <label style="padding-right: 30px">Xizmat turi</label><br>
                        <input type="text" class="form-control" placeholder="Xizmat turi" required name="xizmat">
                        <label style="padding-right: 30px">Narxi</label>
                        <input type="text" class="form-control ; mb-3" placeholder="Narxi" required name="narxi">
                        <button type="submit" name="submit"  class="btn btn-success ; mb-5" value="true" name="price">Qo'shish</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"  data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"></button>
                </div>
                <div class="modal-body" >
                    <form action="{{route('prices.update',1)}}" method="post">
                        @csrf
                        @method('PUT')
                        <input id="priceid" type="hidden" required name="id">
                        <label style="padding-right: 30px">Xizmat turi</label><br>
                        <input id="Xizmat" type="text" class="form-control" placeholder="Xizmat turi" required name="xizmat">
                        <label style="padding-right: 30px">Narxi</label>
                        <input id="Narxi" type="text" class="form-control ; mb-3" placeholder="Narxi" required name="narxi">
                        <button type="submit" name="update"  class="btn btn-success ; mb-5" value="true" name="price">Qo'shish</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"  data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-bordered border-1 table-striped table-hover ">

        <tr>
            <th scope="col">#</th>
            <th scope="col">Xizmat turi</th>
            <th scope="col">Narxi</th>
            <th scope="col">Amallar</th>
        </tr>
        <?php e($i=0); ?>
        @foreach($data as $val)
        <tr>
            <?php e($i++); ?>
            <td>{{$i}}</td>
            <td>{{$val->Name}}</td>
            <td>{{$val->price}}</td>
            <td>
                <form action="{{route('prices.destroy',$val->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" style="border: none">
                        <svg xmlns="http://www.w3.org/2000/svg" color="white" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                        </svg>
                    </button>
                    <a onclick="edit({{$val->id}})" class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#EditModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                        </svg>
                    </a>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
</script>
<script src="{{asset('build/jquery.js')}}"></script>
<script>
    let data=@json($data);
    console.log(data);
    function edit(i)
    {
        var j;
        for(j=0;j<data.length;j++)
        {
            if(data[j]['id']==i)
            {
                i=j;
                break;
            }
        }
        document.getElementById('priceid').value=data[i]['id'];
        document.getElementById('Xizmat').value=data[i]['Name'];
        document.getElementById('Narxi').value=data[i]['price'];
    }
</script>
</body>
</html>
