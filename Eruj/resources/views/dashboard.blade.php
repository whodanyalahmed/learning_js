@extends('layouts.base')
@section('title')
    Dashboard
@endsection



@section('content')
{{-- name <input id="namebox" type ="text" ><br>
fname <input id="fnamebox" type ="text" ><br>
age <input id="agebox" type ="text" ><br>
workingarea <input id="workbox" type ="text" ><br>
<br>
<button id="insert" onclick="insertValue()">INSERT</button>
<button id="select">SELECT</button>
<button id="update">UPDATE</button>
<button id="delete">DELETE</button> --}}
<div class="container mt-5 ">
<h1>Add data to form: </h1>
<div class="container mt-3 mx-3">
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <div class="row mb-4">
      <div class="col">
        <div class="form-outline">
          <input type="text" id="namebox" class="form-control" />
          <label class="form-label" for="namebox">Full name </label>
        </div>
      </div>
      <div class="col">
        <div class="form-outline">
          <input type="text" id="fnamebox" class="form-control" />
          <label class="form-label" for="fnamebox">Father name </label>
        </div>
      </div>
    </div>
  
    <!-- Number input -->
    <div class="form-outline mb-4">
        <input type="number" id="agebox" class="form-control" />
        <label class="form-label" for="agebox">Phone </label>
      </div>
    <!-- Text input -->
    <div class="form-outline mb-4">
      <input type="text" id="workbox" class="form-control" />
      <label class="form-label" for="workbox">Working area </label>
    </div>
  
  
    <!-- Submit button -->
    <div class="row">
        <div class="col">

            <button class="btn btn-primary btn-block mb-4" onclick="insertValue()">Insert</button>
        </div>
    </div>
</div>



<h1>All data: </h1>

<table id="myTable" class="display">
    <thead>
        <tr>
            <th>Full name</th>
            <th>Father Name</th>
            <th>Phone</th>
            <th>Working Area</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        
    </tbody>
</table>
</div>



<script src="{{asset('js/firebase.js')}}"></script>
<!-- //ready data -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script id="mainscript">
var nameV,fnameV,ageV,workV;
// function Ready(){
// }
// // //insert work//
var starCountRef = firebase.database().ref('employ');
starCountRef.on('value', (snapshot) => {
  const data = snapshot.val();
  StrData = JSON.stringify(data);
  jsonData = JSON.parse(StrData);

  console.log(data)
  

  var key = [];
  var value = [];
  for (const item in data) {
        id = item;
        age = data[item]['age']
        name = data[item]['employerName']
        fname = data[item]['fname']
        workingarea = data[item]['workingarea']
        updateBTN = "<button class='btn btn-primary' data-id="+id+"></button>"
        updateBTN = "<button class='btn btn-danger' data-id="+id+"></button>"
        value.push([age,name,fname,workingarea,])
        key.push(id)

  }
  console.log(key)
  console.log(value)

  $('#myTable').DataTable({
    data : value
});
});


    function insertValue(){
        
nameV=document.getElementById('namebox').value;
fnameV=document.getElementById('fnamebox').value;
ageV=document.getElementById('agebox').value;
workV=document.getElementById('workbox').value;
        console.log(nameV)
        console.log(fnameV)
        try {
            
            firebase.database().ref('employ').push().set({
                employerName:nameV,
                fname:fnameV,
                age:ageV,
                workingarea:workV,
            });
        } catch (error) {
            alert("cant insert the data...")
        }
        finally{
            
        nameV=document.getElementById('namebox').value = "";
        fnameV=document.getElementById('fnamebox').value ="";
        ageV=document.getElementById('agebox').value = "";
        workV=document.getElementById('workbox').value ="";
        }
    }
    // document.getElementById('insert').onclick=function(){
    //     DOMRectReadOnly();
    //     firebase.database().ref('employ/'+rollV.set({
    //         employnamnpme:nameV,
    //         fname:fnameV,
    //         age:ageV,
    //         workingarea:work,
    //     });

    // }
    </script> 
@endsection

