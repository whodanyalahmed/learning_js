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

<table id="myTable" >
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

<!-- Button trigger modal -->
{{-- <button
  type="button"
  class="btn btn-primary"
  data-mdb-toggle="modal"
  data-mdb-target="#exampleModal"
>
  Launch demo modal
</button> --}}

<!-- Modal -->
<div
  class="modal fade"
  id="exampleModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm delete?</h5>
        <button
          type="button"
          class="btn-close"
          data-mdb-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
          Do you really want to delete <span id="data" class="fw-bolder"></span> with name:  <span id="name" class="fw-bolder"></span> ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-mdb-dismiss="modal">
          Close
        </button>
        
            <input type="hidden" name="id" id="id" value="">
            <button onclick="deleteData()" class="btn btn-danger">Delete</button>
        
      </div>
    </div>
  </div>
</div>

<script src="{{asset('js/firebase.js')}}"></script>
<!-- //ready data -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script id="mainscript">

    function deleteData() {
        id = document.getElementById('id').value;
        console.log(id)
        firebase.database().ref('employ/' + id).remove();
        
        $('#exampleModal').modal('toggle');
        
    }
    function updateNDelete(id,name) {
        // alert(id)
        document.getElementById('id').value = id;
        document.getElementById('data').innerHTML = id;
        document.getElementById('name').innerHTML = name;

        $('#exampleModal').modal('toggle');

    }





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
        updateBTN = "<button class='btn btn-primary'  data-id="+id+">update</button>"
        deleteBTN = `<button class='btn btn-danger' onclick='updateNDelete("`+id+`","`+name+`")' data-id=`+id+` >delete</button>`
        value.push([name,fname,age,workingarea,updateBTN,deleteBTN])
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

