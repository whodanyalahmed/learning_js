@extends('layouts.base')
@section('title')
    Dustibins
@endsection



@section('content')

{{-- name <input id="namebox" type ="text" ><br>
fname <input id="dustbinLocation" type ="text" ><br>
age <input id="DustbinArea" type ="text" ><br>
workingarea <input id="DustbinId" type ="text" ><br>
<br>
<button id="insert" onclick="insertValue()">INSERT</button>
<button id="select">SELECT</button>
<button id="update">UPDATE</button>
<button id="delete">DELETE</button> --}}
<div class="container mt-5 ">



<h1>All collection data: </h1>

<table id="myTable" >
    <thead>
        <tr>
            <th>RFID</th>
            <th>Dustbin ID</th>
            <th>Dustbin Area</th>
            <th>Date & Time</th>
            
        </tr>
    </thead>
    <tbody>
        
    </tbody>
</table>
</div>

<!-- Button trigger modal -->
{{-- <button
  type="button"
  class="btn btn-primary"
  data-mdb-toggle="modal"
  data-mdb-target="#exampleModal"
>
  Launch demo modal
</button> --}}
<script src="{{asset('js/firebase.js')}}"></script>
<!-- //ready data -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script id="mainscript">

    




// var nameV,fnameV,ageV,workV;
// function Ready(){
// }
// // //insert work//
var starCountRef = firebase.database().ref('collection');
starCountRef.on('value', (snapshot) => {
  const data = snapshot.val();
  StrData = JSON.stringify(data);
  jsonData = JSON.parse(StrData);

  console.log(data)
  

  var key = [];
  var value = [];
  for (const item in data) {
        id = item;
        DustbinArea = data[item]['Area']
        DateTime = data[item]['DateTime']
        rfid = data[item]['RFID']
        dustbinID = data[item]['dustbinID']
        // updateBTN = `<button class='btn btn-primary' onclick='updateData("`+id+`","`+name+`","`+DustbinLocation+`","`+DustbinArea+`","`+dustbinID+`")'  data-id=`+id+`>update</button>`;
        // deleteBTN = `<button class='btn btn-danger' onclick='updateNDelete("`+id+`","`+name+`")' data-id=`+id+` >delete</button>`;
        value.push([rfid,dustbinID,DustbinArea,DateTime])
        key.push(id)

  }
  console.log(key)
  console.log(value)

datatable = $('#myTable').DataTable({
    data : value,
    "bDestroy": true
});
datatable.clear().rows.add(value).draw();
});


   
    </script> 
@endsection

