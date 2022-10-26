
<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('build/bootstrap.min.css')}}" rel="stylesheet"
          crossorigin="anonymous">
    <script src="{{asset('build/choices/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('build/choices/choices.min.css')}}">
    <script src="{{asset('build/choices/choices.min.js')}}"></script>

    <title>Avto servis</title>
</head>
<body>

<div class=" mb-3" role="document">
    <nav class="navbar navbar-expand-lg bg-light " style="box-shadow: 0px 0px 10px 10px #bcbcbc">
        <div class="container-fluid d-flex justify-content-between " style="width: 600px;">
            <a class="navbar-brand " href="/dashboard">Home</a>


            <div class="navbar-nav">
                <a class="nav-link  active" style="color: blue" aria-current="page" href="/index">Navbat</a>
                <a class="nav-link" href="/ishchilar">Ishchilar</a>
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
    <h2 class="text text-info text-center">Buyurtmalar ro'yhati</h2>
    <div class="d-flex justify-content-end">
            <input onclick="NewCustomer()" class="btn btn-success" type="button" value="Buyurtma Qo`shish" data-bs-toggle="modal" data-bs-target="#exampleModal">
    </div>
    <br>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="width: 30%">
            <div class="modal-content" style="background-color: rgba(0,255,255)">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"></button>
                </div>
                <div class="modal-body" >
                    <form action="{{route('customers.store')}}" method="post" class="w-100" style="">
                        @csrf
                        <div class="mb-3" class="container">
                            <div class="mb-3">
                                <label class="container">Car number</label>
                                <input type="text" class="form-control"  required name="car_number">
                            </div>
                            <div class="mb-3">
                                <label class="container">
                                    Servis Ishchilari
                                </label>
                                <select class="form-control" required name="employee">
                                    @foreach($emp as $val)
                                    <option id="{{ $val->id }}" value="{{$val->id}}">{{$val->FIO}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="container">
                                Servis Xizmatlar
                            </label>
                            <div id="select_1">
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-success" value="Ro`yhatga olish" name="submit">
                        </div>

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"  data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="width: 30%">
            <div class="modal-content" style="background-color: rgba(0,255,255)">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"></button>
                </div>
                <div class="modal-body" >
                    <form action="{{route('customers.update',1)}}" method="post" class="w-100" style="">
                        @csrf
                        @method('PUT')
                        <div class="mb-3" class="container">
                            <div class="mb-3">
                                <input id="customerid" type="hidden" required name="id">
                                <label class="container">Car number</label>
                                <input id="carnumber" type="text" class="form-control"  required name="car_number">
                            </div>
                            <div class="mb-3">
                                <label class="container">
                                    Servis Ishchilari
                                </label>
                                <select id="select-emp" class="form-control" required name="employee">
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="container">
                                Servis Xizmatlar
                            </label>
                            <div id="select_2">
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-success" value="Tahrirlash"  value="True" name="update">
                        </div>

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"  data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ModalPay" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="width: 30%">
            <div class="modal-content" style="background-color: rgba(0,255,255)">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"></button>
                </div>
                <div class="modal-body" >
                    <form action="{{route('customers.update',1)}}" method="post" class="w-100" style="">
                        @csrf
                        @method('PUT')
                        <div class="mb-3" class="container">
                            <div class="mb-3">
                                <input id="cusid" type="hidden" required name="id">
                                    Car number:
                                <input id="carnum" style="border: solid 0px; background-color: unset; color: blue" type="button" required name="car_number">
                            </div>
                            <div class="mb-3">
                                    Servis Xizmatchi:
                                <input id="seremp" type="button" style="border: solid 0px; background-color: unset; color: blue" required name="seremp">
                            </div>
                            <div class="mb-3">
                                    Umumiy Narxi:
                                <input id="serpr" type="button" style="border: solid 0px; background-color: unset; color: blue" required name="seremp">
                            </div>
                            <div class="mb-3">
                                    Chegirma:
                                <input id="sersal" type="button" style="border: solid 0px; background-color: unset; color: blue" required name="sale">
                            </div>
                            <div class="mb-3">
                                    Servis narxi(Chegirma bilan):
                                <input id="paysal" type="button" style="border: solid 0px; background-color: unset; color: blue" required name="pay">
                            </div>
                            <div class="mb-3">
                                    To`lanishi kerak:
                                <input id="payed" type="button" style="border: solid 0px; background-color: unset; color: blue" required name="pay">
                            </div>
                        </div>

                        <label style="padding-right: 30px">To`lash:</label>
                        <br>
                        <div class="d-flex" >
                        <input id="cusin" type="number" name="pay" style="width: 50%;" class="form-control" min="0" placeholder="Kiriting...(so`m)">
                        <button type="submit" class="btn btn-success" value="true" name="paysum">To`lash</button>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"  data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal"  aria-label="Close"></button>
                </div>
                <div class="modal-body" >
                    <form action="" method="post">
                        <label style="padding-right: 30px">Summani kiriting</label><br>
                        <input type="text" name="summa" class="form-control">
                        <input type="hidden"  id="nani_idsi" name="id"  class="form-control">
                        <input type="hidden" id="narx" name="narx" class="form-control"><br>
                        <button type="submit"  class="btn btn-success" style="margin-left: 88%" >Yuborish</button>
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
            <th scope="col">Mashina raqami</th>
            <th scope="col">Xodim</th>
            <th scope="col">Xizmat turi</th>
            <th scope="col">Umumiy Narxi</th>
            <th scope="col">Chegirma</th>
            <th scope="col">Narxi</th>
            <th scope="col">To'langan</th>
            <th scope="col">Holat</th>
            <th scope="col">Sana</th>
            <th scope="col">Amal</th>

        </tr>
        <?php e($i=0); ?>
        @foreach($data as $val)
        <tr>
            <?php e($i++); ?>
            <td>{{$i}}</td>
            <td>{{$val->car_number}}</td>
            <td>@if(empty($val->employees->FIO))
                    <div style="color: #c97631">Null</div>
                @else
                    {{$val->employees->FIO}}
                @endif
            </td>
            <td>
                @foreach($val->price_name as $key=>$v)
                {{$v->Name}}<br>
                @endforeach
            </td>
            <td>{{$val->paysum}} so`m</td>
            <td>{{$val->sale}}%</td>
            <td>{{$val->paysum*(100-$val->sale)/100}} so`m</td>
            <td>{{$val->payedsum}}</td>
            <td><?php if(e($val->status)==1){ echo "To'langan"; } else { echo "To'lanmagan"; } ?>
            </td>
            <td>{{$val->updated_at}}</td>
            <td>
                <form action="{{route('customers.destroy',$val->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" style="border: none">
                        <svg xmlns="http://www.w3.org/2000/svg" color="white" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                        </svg>
                    </button>
                <?php if(e($val->status!=1)){?>
                <?php if(e($val->payedsum==0)){?>
                    <a onclick="edit({{$val->id}})" class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#ModalEdit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                        </svg>
                    </a>
                <?php }?>
                    <a onclick="pay({{$val->id}})" class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#ModalPay">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
                        <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
                    </svg>
                </a>
                <?php } ?>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    @if(!empty($mes))
        <script language="javascript">
            alert("Bunday nomer mavjud");
        </script>
    @endif
</div>
<script src="{{asset('build/jquery.js')}}"></script>
<script>
    let data=@json($data);
    let emp=@json($emp);
    let pr=@json($pr);

    console.log(data);
    console.log(emp);
    console.log(pr);
    var i;
    function edit(i)
    {
        var j;
        var employe_id;
        var price_ides;
        for (j=0;j<data.length;j++)
        {
            if(data[j]['id']==i)
            {
                document.getElementById("carnumber").value=data[j]['car_number'];
                document.getElementById("customerid").value=data[j]['id'];
                employe_id=data[j]['employee_id'];
                price_ides=data[j]['price_id'];
                break;
            }

        }
        let options="";
        for (j=0;j<emp.length;j++)
        {
            if(employe_id==emp[j]['id'])
            {
                options+="<option value='"+emp[j]['id']+"' selected >"+emp[j]['FIO']+"</option>";
            }
            else
            {
                options+="<option value='"+emp[j]['id']+"'>"+emp[j]['FIO']+"</option>";
            }
        }
        $("#select-emp").html(options);

        let opt="";
        var l;
        var k;
        var bool;

        opt='<select id="choices-multiple-remove-button" placeholder="Select services" multiple required name="price[]">';
        for (j=0;j<pr.length;j++)
        {
            for(k=0;k<data.length;k++)
            {
                if(data[k]['id']==i)
                {
                    i=k;
                    break;
                }
            }
            bool=false;
            for(l=0;l<data[i]['price_id'].length;l++)
            {
                if(pr[j]['id']==data[i]['price_id'][l])
                {
                    bool=true;
                    break;
                }
            }
            if(bool)
            {
                opt+="<option value='"+pr[j]['id']+"' selected >"+pr[j]['Name']+"</option>";
            }
            else
            {
                opt+="<option value='"+pr[j]['id']+"'>"+pr[j]['Name']+"</option>";
            }
        }
        opt+='</select>';
        $("#select_2").html(opt);
        $(document).ready(function(){
            var multipleCancelButton = new Choices('#choices-multiple-remove-button',{removeItemButton: true});
        });
    }
    function pay(i)
    {
        var j;
        for (j=0;j<data.length;j++)
        {
            if(data[j]['id']==i)
            {
                document.getElementById("cusid").value=data[j]['id'];
                document.getElementById("carnum").value=data[j]['car_number'];
                document.getElementById("seremp").value=data[j]['employees']['FIO'];
                document.getElementById("serpr").value=data[j]['paysum'];
                document.getElementById("sersal").value=data[j]['sale'];
                document.getElementById("paysal").value=(100-data[j]['sale'])*data[j]['paysum']/100;
                document.getElementById("payed").value=(100-data[j]['sale'])*data[j]['paysum']/100-data[j]['payedsum'];
                document.getElementById("cusin").max=(100-data[j]['sale'])*data[j]['paysum']/100-data[j]['payedsum'];
                break;
            }

        }
    }
    function NewCustomer(i)
    {
        var j;
        let opti="";

        opti='<select id="choices-multiple-remove-button" placeholder="Select services" multiple required name="price[]">';
        for (j=0;j<pr.length;j++)
        {
            opti+="<option value='"+pr[j]['id']+"'>"+pr[j]['Name']+"</option>";
        }
        opti+='</select>';
        $("#select_1").html(opti);
        $(document).ready(function(){
            var multipleCancelButton = new Choices('#choices-multiple-remove-button',{removeItemButton: true});
        });
    }
</script>
<script src="{{asset('build/sweetalert2@11')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>
