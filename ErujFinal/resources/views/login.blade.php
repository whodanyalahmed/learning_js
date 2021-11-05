@extends('layouts.base')

@section('title')
    Login | GMS 
@endsection

@section('content')
    <style>
    .divider:after,
    .divider:before {
    content: "";
    flex: 1;
    height: 1px;
    background: #eee;
    }
    </style>
    {{-- login UI --}}
    <x-navbar/>
    <section class="vh-100">

        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
              {{-- <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="img-fluid" alt="Phone image">
               --}}
               <img src="img/trash.svg " alt="trash and guy" >
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1 ">
                <h1 class="fw-bolder mt-5 text-center "><i>Login !</i> </h1>
              
                
              <form id="userform">
                @csrf
                <!-- Email input -->
                <div class="form-outline mb-4 mt-lg-4 mt-sm-4">
                  <input type="email" id="form1Example13" class="form-control form-control-lg" name="email" autocomplete="email"/>
                  <label class="form-label" for="form1Example13">Email address</label>
                </div>
      
                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" current-password id="form1Example23" class="form-control form-control-lg" name="pass" autocomplete="current-password"/>
                  <label class="form-label" for="form1Example23">Password</label>
                </div>
      
                <div class="d-flex justify-content-around align-items-center mb-4">
                  <!-- Checkbox -->
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      type="checkbox"
                      value=""
                      id="form1Example3"
                      checked
                    />
                    <label class="form-check-label" for="form1Example3"> Remember me </label>
                  </div>
                  <a href="#!">Forgot password?</a>
                </div>
      
                <!-- Submit button -->
                <button onclick="return CheckIfUserExist()" class="btn btn-success btn-lg btn-block">Sign in</button>
      
              </form>
              
            </div>  

            </div>
          </div>
        </div>
      </section>




      <script>
          
          function CheckIfUserExist(){
              
              var starCountRef = firebase.database().ref('users');
              starCountRef.on('value', (snapshot) => {
                const data = snapshot.val();
                var email = document.getElementById('form1Example13').value
                var password = document.getElementById('form1Example23').value
    
                
              for (const item in data) {
                    emailF = data[item]['email']
                    passF = data[item]['password']
                    if(emailF == email && passF == password){
                        console.log('success: logged in...')

                        $.ajax({
                            type: 'POST',
                            url: 'dashboard',
                            data: $("#userform").serialize()

                        })
                        .done(function(data){
                            // show the response
                            console.log('successfully session set');
                            
                        })
                        .fail(function() {
                            // just in case posting your form failed
                            alert( "Posting failed." );
                        });

                    }

                }
                
              });
              return false;
        }
      </script>
@endsection