<!DOCTYPE html>
<html>
    <head>
       <title>Login to Task management App</title>
       <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
       <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>
       <link href='https://fonts.googleapis.com/css?family=Hind:300' rel='stylesheet' type='text/css'>
       <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>

        <link href="{{ asset('assets/css/login.css') }}" rel="stylesheet">
<style>
     html, body {
      height: 100%;
      margin: 0;
    }

    @import url('https://rsms.me/inter/inter-ui.css');

body {
  background: white;
  font-family: 'Inter UI', sans-serif;
  margin: 0;
  padding: 20px;
}
.page {
    background: linear-gradient(to right,#17225e,#8b5d8b, #677bad);
  display: flex;
  flex-direction: column;
  height: calc(100% - 40px);
  position: absolute;
  place-content: center;
  width: calc(100% - 40px);
}

.container {
  display: flex;
  height: 76%;
  margin: 0 auto;
  width: 65%;
}

.left {
  background: white;
  height: calc(100% - 40px);
  top: 20px;
  position: relative;
  width: 70%;
}

.login {
  font-size: 50px;
  font-weight: 900;

  margin: 50px 50px 60px;
}
.eula {
  color: #999;
  font-weight: 400
  font-size: 14px;
  line-height: 1.5;
  margin: 70px;
}
.left img{

      width: 100%;
      height: 100%;
      object-fit: cover;

}
.right {
      width: 100%;

       background: #ffffff;
  box-shadow: 0px 0px 40px 16px rgba(0,0,0,0.22);
  color: #000000;
      display: block;
      justify-content: center;
      align-items: center;
    }

    .form {
        margin-left:30px;
        width:80%;
padding:40px;
      background-color: #ffffffa2;

    }
    #email{
        color:#8e8e8e;

    }
label {
  color:  #000000;
  display: block;
  font-weight: 700;
  font-size: 14px;
  height: 16px;
  margin-top: 20px;
  margin-bottom: 5px;
}
input {

  border: 0;
  color: #000000;
  font-size: 20px;
  height: 40px;
  background-color: #e2e2e5;
  margin-top: 20px;
  line-height: 30px;
  outline: none !important;
  width: 100%;
}

#submit {
color:#ffffff;
font-weight: 800;
font-size: 18px;
height: 70px;
margin-top: 50px;
float:right;
line-height: 30px;
outline: none !important;
width: 40%;
background-color: #17225e;
border: 0;
border-radius: 5px;
cursor: pointer;

}

</style>


    </head>


</head>
<body>
    <div class="page">
        <div class="container">
          <div class="left">
            <img src="https://i.pinimg.com/474x/11/97/38/119738ad834664469439e3dd8b34a37d.jpg">
          </div>
          <div class="right">
            <div class="login">Login</div>
            <div class="form">
                <form method="POST" action="{{ route('login') }}" >
                  @csrf
              <label for="email">email</label>
              <input type="email" id="email" name="email" value="">
              @error('email')
              <span class="text-danger">{{ $message }}</span>
          @enderror
              <label for="password">Password</label>
              <input type="password" id="password" name="password" >
              @error('password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
              <button type="submit" id="submit" value="Submit">Login</button>
            </form>
            </div>
          </div>
        </div>
      </div>
<script>

</script>
   

</body>
</html>
