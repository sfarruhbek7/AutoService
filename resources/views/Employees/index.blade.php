<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avtoservis Ishchilar ro'yxati</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<body>

<div class=" mb-3" role="document">
    <nav class="navbar navbar-expand-lg bg-light " style="box-shadow: 0px 0px 10px 10px #bcbcbc">
        <div class="container-fluid d-flex justify-content-between " style="width: 600px;">
            <a class="navbar-brand " href="/dashboard">Home</a>
            <div class="navbar-nav">
                <a class="nav-link" aria-current="page" href="/index">Navbat</a>
                <a class="nav-link active" style="color: blue" href="/ishchilar">Ishchilar</a>
                <a class="nav-link" href="/service">Servis</a>

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
</div>

<div class="container card pt-3 mt-4" style="box-shadow: 0px 0px 10px 10px #9e9e9e">

    <div class="modal fade" id="NewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"></button>
                </div>
                <div class="modal-body" >
                    <form action="{{route('employees.store')}}" method="post" class="w-100" style="">
                        @csrf
                        <div class="mb-3" class="container">
                            <div class="mb-3">
                                <input type="hidden" required name="id">
                                <label class="container">Familiya Ism Sharif</label>
                                <input type="text" class="form-control" placeholder="FIO" required name="FIO">
                            </div>
                            <div class="mb-3">
                                <label class="container">Telefon raqami</label>
                                <input type="text" class="form-control" placeholder="phone" required name="phone">
                            </div>
                            <div class="mb-3">
                                <label class="container">Manzili</label>
                                <input type="text" class="form-control" placeholder="Address" required name="address">
                            </div>
                            <div class="mb-3">
                                <label class="container">Pasporti</label>
                                <input type="text" class="form-control" placeholder="passport" required name="passport">
                            </div>

                            <div class="mb-3">
                                <label class="container">
                                    Fililal
                                </label>
                                <select class="form-control" required name="branch_id">
                                    @foreach($branches as $val)
                                        <option value="{{$val->id}}">{{$val->Name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" value="true" name = "add">Qo`shish</button>
                        </div>
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
                    <form action="{{route('employees.update',1)}}" method="post" class="w-100" style="">
                        @csrf
                        @method('PUT')
                        <div class="mb-3" class="container">
                            <div class="mb-3">
                                <input id="employeeid" type="hidden" required name="id">
                                <label class="container">Familiya Ism Sharif</label>
                                <input id="FIO" type="text" class="form-control" placeholder="FIO" required name="FIO">
                            </div>
                            <div class="mb-3">
                                <label class="container">Telefon raqami</label>
                                <input id="phone" type="text" class="form-control" placeholder="phone" required name="phone">
                            </div>
                            <div class="mb-3">
                                <label class="container">Manzili</label>
                                <input id="address" type="text" class="form-control" placeholder="Address" required name="address">
                            </div>
                            <div class="mb-3">
                                <label class="container">Pasporti</label>
                                <input id="passport" type="text" class="form-control" placeholder="passport" required name="passport">
                            </div>

                            <div class="mb-3">
                                <label class="container">
                                    Fililal
                                </label>
                                <select id="select_br" class="form-control" required name="branch_id">
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary" value="true" name = "update">Qo`shish</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"  data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <h2 class="text text-info text-center">Ishchilar</h2>
    <div align="end">
        <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#NewModal">Ishchi Qo`shish</button>
    </div>
    <br>
    <table class="table table-bordered border-1 table-striped table-hover ">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Fio</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Passport</th>
            <th scope="col">Sana</th>
            <th scope="col">Amallar</th>
        </tr>
        <?php e($i=0); ?>
        @foreach($data as $val)
        <tr>
            <?php e($i++); ?>
            <td>{{$i}}</td>
            <td>{{$val->FIO}}</td>
            <td>{{$val->phone}}</td>
            <td>{{$val->address}}</td>
            <td>{{$val->passport}}</td>
            <td>{{$val->updated_at}}</td>
            <td>
                <form action="{{route('employees.destroy',$val->id)}}" method="post">
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
<script src="{{asset('build/jquery.js')}}"></script>
<script>
    let data=@json($data);
    let br=@json($branches);
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
        document.getElementById('employeeid').value=data[i]['id'];
        document.getElementById('FIO').value=data[i]['FIO'];
        document.getElementById('phone').value=data[i]['phone'];
        document.getElementById('address').value=data[i]['address'];
        document.getElementById('passport').value=data[i]['passport'];
        option="";
        for (j=0;j<br.length;j++)
        {
            if(br[j]['id']==data[i]['branch_id'])
            {
                option+="<option value='"+br[j]['id']+"' selected>"+br[j]['Name']+"</option>";
            }
            else
            {
                option+="<option value='"+br[j]['id']+"'>"+br[j]['Name']+"</option>";
            }
        }
        $("#select_br").html(option);
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
</script>
</body>
</html>
