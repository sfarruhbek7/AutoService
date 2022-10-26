<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ishchi qo'shish</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>

<body>
<div class="mb-5"></div>
<div class="container card" style="width: 500px">
    <form action="{{route('employees.update',$data->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>FIO</label>
            <input type="text" class="form-control" value="{{$data->FIO}}" placeholder="FIO" autocomplete = "off" required name="FIO">
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input class ="form-control" value="{{$data->phone}}" placeholder="Phone" autocomplete = "off" required name="phone">
        </div>

        <div class="mb-3">
            <label>Address:</label>
            <input type="text" class="form-control" value="{{$data->address}}" placeholder="address" autocomplete = "off" required name="address">
        </div>

        <div class="mb-3">
            <label>Passport</label>
            <input type="text" class="form-control" value="{{$data->passport}}" placeholder="passport" autocomplete = "off" required name="passport">
        </div>

        <div class="mb-3">
            <label>Branch_id</label>
            <select class="form-control" required name="branch_id">
                @foreach($branch as $val)
                    <option value="{{$val->id}}">{{$val->Name}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3" align="center">
            <button type="submit" class="btn btn-primary" value="true" value="true" name = "update">Tahrirlash</button>
        </div>
    </form>
</div>
</body>

</html>
