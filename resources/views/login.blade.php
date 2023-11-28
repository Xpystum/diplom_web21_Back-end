
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Login</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #080710;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    
}
form{
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(4px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
    z-index: 0;
}
form::before{
    content: '';
    position: absolute;
    height: 200px;
    width: 200px;
    right: -100px;
    top: -100px;
    background: #000;
    border-radius: 50%;
    
}
form::after{
    content: '';
    position: absolute;
    height: 200px;
    width: 200px;
    border-radius: 50%;
    border: 7px solid #000;
    box-shadow: -25px 25px 100px #222;
    opacity: 0.9;
    background: center / contain no-repeat url('https://banner2.cleanpng.com/20181115/xc/kisspng-ru-car-russia-website-windows-phone-mitsubishi-delica-5bed3d37e28462.2634841615422743599278.jpg');
    right: -100px;
    top: -100px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}

form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.social{
  margin-top: 30px;
  display: flex;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}
.error{
    margin: 0;
    padding: 0;
    color: #f00;
    text-align: center;
    background: rgba(255,0,0,0.07);

}
    </style>
</head>
<body>

    <form>
        <h3>Авторизация</h3>

        <label for="email">Почта</label>
        <input type="text" placeholder="example@mail.com" id="email">
        <label for="email" class="error error_email"></label>

        <label for="password">Пароль</label>
        <input type="password" placeholder="Ваш пароль" id="password">
        <label for="password" class="error error_password"></label>

        <button type="button" onClick='Check()'>Войти</button>
    </form>
    <script>
        function Check(){
            let email = document.querySelector('#email');
            let errorEmail = document.querySelector('.error_email');
            let errorPassword = document.querySelector('.error_password');
            let validation = true;

            errorEmail.innerHTML = '';
            errorPassword.innerHTML = '';


                if(email.value.length == 0){
                    errorEmail.innerHTML = "Ошибка логина";
                    validation = false;
                }
                if(password.value.length == 0){
                    errorPassword.innerHTML = "Ошибка пароля";
                    validation = false;
                }
                if(validation){
                    window.location.href = "{{ route('home') }}";
                }
            } 

    </script>
</body>
</html>