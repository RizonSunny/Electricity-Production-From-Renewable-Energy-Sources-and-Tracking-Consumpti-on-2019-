<!DOCTYPE html>
<html lang="en">
<head>
  <title>add and select</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<style>
#tt table {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 500px;
}

#tt td,#tt th {
    border: 1px solid #ddd;
    padding: 8px;
}

#tt tr:nth-child(even){background-color: #f2f2f2;}

#tt tr:hover {background-color: #ddd;}

#tt th {
    padding-top: 10px;
    padding-bottom: 10px;
    text-align: center;
    background-color: #4CAF50;
    color: white;
}
#tt tbody{
  overflow-y: scroll;
  overflow-x: scroll;
  height: 150px;
  width: 1000px;
}
</style>

<body>

<div class="container">
  <h2>VOltage of Solar Panel from FireBase</h2>


<!-- <form method="post">
  @csrf
  <button class="btn btn-sccess" type="submit" formaction="ADD">Add Data</button>
</form>
<form method="get">
  <button class="btn btn-success" type="submit" formaction="SEE">See Data</button>
</form> -->



@if($emps)

		<table id="tt" style="margin-left:300px" >
      <tr>
        <!-- <td>Serial</td> -->
          <td>Voltage</td>
          <!-- <td>Two</td> -->
  			</tr>

  			@foreach($emps as $res)

  				<tr>
            <td>{{ $res}} volt </td>
  				</tr>

  			@endforeach

  </table>

  @else
      <h5  style="margin-left:300px">No Data</h5>
    @endif

</table>
</div>

</body>

<script type="text/javascript">
   setTimeout(function(){
       location.reload();
   },10000);
</script>
</html>
