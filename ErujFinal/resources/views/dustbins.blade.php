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
<h1>Add Dustbin: </h1>
<div class="container mt-3 mx-3">
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <div class="row mb-4">
      <div class="col">
        <div class="form-outline">
          <input type="text" id="namebox" class="form-control" />
          <label class="form-label" for="namebox">Dustbin title </label>
        </div>
      </div>
      <div class="col">
        <div class="form-outline">
          <input type="text" id="dustbinLocation" class="form-control" />
          <label class="form-label" for="dustbinLocation">Dustbin location</label>
        </div>
      </div>
    </div>
  
    <!-- Number input -->
    <div class="form-outline mb-4">
        <input type="text" id="DustbinArea" class="form-control" />
        <label class="form-label" for="DustbinArea">Dustbin area </label>
      </div>
    <!-- Number input -->
    <div class="form-outline mb-4">
        <input type="number" id="dustbinID" class="form-control" />
        <label class="form-label" for="dustbinID">Dustbin ID </label>
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
            <th>Dustbin Location</th>
            <th>Dustbin Area</th>
            <th>Dustbin Id</th>
            <th>Dustbin Percentage</th>
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

<!-- Delete Modal -->
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
<!-- Delete Modal -->
<div
  class="modal fade"
  id="updateModal"
  tabindex="-1"
  aria-labelledby="updateModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateModalLabel">Update</h5>
        <button
          type="button"
          class="btn-close"
          data-mdb-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">
        <div class="form-outline mb-4">
          <input type="text" class="form-control" id="updatename" name="updatename">
          <label for="updatename" class="form-label">Name </label>
        </div>
        <div class="form-outline mb-4">
          <input type="text" class="form-control" id="updateDustbinLocation" name="updateDustbinLocation">
          <label for="updateDustbinLocation" class="form-label">Dustbin Location </label>
        </div>
        <div class="form-outline mb-4">
          <input type="text" class="form-control" id="updateDustbinArea" name="updateDustbinArea">
          <label for="updateDustbinArea" class="form-label">Dustbin Area </label>
        </div>
        <div class="form-outline ">
          <input type="text" class="form-control" id="updateDustbinId" name="updateDustbinId">
          <label for="updateDustbinId" class="form-label">Dustbin Id</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-mdb-dismiss="modal">
          Close
        </button>

            <input type="hidden" name="id" id="updateid" value="">
            <button onclick="updateNewData()" class="btn btn-secondary">update</button>
        
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
        firebase.database().ref('dustbin/' + id).remove();
        
        $('#exampleModal').modal('toggle');  
        
    }

    function updateNDelete(id,name) {
        // alert(id)
        document.getElementById('id').value = id;
        document.getElementById('data').innerHTML = id;
        document.getElementById('name').innerHTML = name;

        $('#exampleModal').modal('toggle');

    }
    function updateData(id,name,DustbinLocation,DustbinArea,DustbinId) {
        // alert(id)
        document.getElementById('updateid').value = id;
        // document.getElementById('updatedata').innerHTML = id;
        document.getElementById('updatename').value = name;
        document.getElementById('updateDustbinLocation').value = DustbinLocation;
        document.getElementById('updateDustbinArea').value = DustbinArea;
        document.getElementById('updateDustbinId').value = DustbinId;

        $('#updateModal').modal('toggle');

    }
    function updateNewData() {
        id = document.getElementById('updateid').value;
        console.log(id)
        // firebase.database().ref('dustbin/' + id).remove();
        name = document.getElementById('updatename').value
        DustbinLocation = document.getElementById('updateDustbinLocation').value
        DustbinArea = document.getElementById('updateDustbinArea').value
        dustbinID = document.getElementById('updateDustbinId').value
        console.log(name)
        console.log(dustbinID)
        ref = firebase.database().ref('dustbin').child(id)
        // .child('employerName').setValue(name)
        ref.update({
            DustbinName:name,
                DustbinLocation:DustbinLocation,
                DustbinArea:DustbinArea,
                dustbinID:dustbinID,
      });
          
        $('#updateModal').modal('toggle');  
        
    }




// var nameV,fnameV,ageV,workV;
// function Ready(){
// }
// // //insert work//
var starCountRef = firebase.database().ref('dustbin');
starCountRef.on('value', (snapshot) => {
  const data = snapshot.val();
  StrData = JSON.stringify(data);
  jsonData = JSON.parse(StrData);

  console.log(data)
  

  var key = [];
  var value = [];
  for (const item in data) {
        id = item;
        DustbinLocation = data[item]['DustbinLocation']
        name = data[item]['DustbinName']
        dustbinID = data[item]['dustbinID']
        DustbinArea = data[item]['DustbinArea']
        dustbinPercentage = data[item]['dustbinPercentage']
        updateBTN = `<button class='btn btn-primary' onclick='updateData("`+id+`","`+name+`","`+DustbinLocation+`","`+DustbinArea+`","`+dustbinID+`")'  data-id=`+id+`>update</button>`;
        deleteBTN = `<button class='btn btn-danger' onclick='updateNDelete("`+id+`","`+name+`")' data-id=`+id+` >delete</button>`;
        value.push([name,DustbinLocation,DustbinArea,dustbinID,dustbinPercentage,updateBTN,deleteBTN])
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
dlocation=document.getElementById('dustbinLocation').value;
darea=document.getElementById('DustbinArea').value;
did=document.getElementById('dustbinID').value;
        console.log(nameV)
        console.log(dlocation)
        try {
            
            firebase.database().ref('dustbin').push().set({
                DustbinName:nameV,
                DustbinLocation:dlocation,
                DustbinArea:darea,
                dustbinID:did,
                dustbinPercentage : 0,
            });
        } catch (error) {
            alert("cant insert the data...")
        }
        finally{
            
        document.getElementById('namebox').value = "";
        document.getElementById('dustbinLocation').value ="";
        document.getElementById('DustbinArea').value = "";
        document.getElementById('dustbinID').value ="";
        }
    }
    // document.getElementById('insert').onclick=function(){
    //     DOMRectReadOnly();
    //     firebase.database().ref('dustbin/'+rollV.set({
    //         employnamnpme:nameV,
    //         fname:fnameV,
    //         age:ageV,
    //         workingarea:work,
    //     });

    // }
    </script> 
@endsection

