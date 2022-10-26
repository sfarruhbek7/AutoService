<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<script src="https://code.jquery.com/jquery-2.2.4.js"></script>
<link href="https://rawgit.com/select2/select2/master/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://rawgit.com/select2/select2/master/dist/js/select2.js"></script>

<select id="example" style="width: 300px">
    <option></option>
    <option value="JAN">January</option>
    <option value="FEB">February</option>
    <option value="MAR">March</option>
    <option value="APR">April</option>
    <option value="MAY">May</option>
    <option value="JUN">June</option>
    <option value="JUL">July</option>
    <option value="AUG">August</option>
    <option value="SEP">September</option>
    <option value="OCT">October</option>
    <option value="NOV">November</option>
    <option value="DEC">December</option>
</select>

<script>
    window.onpageshow = function() {
        $('#example').select2({
            allowClear: true,
            placeholder: 'Select a month'
        });
    };
</script>
</body>
</html>
