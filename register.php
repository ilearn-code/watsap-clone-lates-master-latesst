<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Chatting - APP</title>
    <link rel="shortcut icon" href="#" type="image/x-icon">
    <link rel="stylesheet" href="css/registration_form.css">
</head>

<body>

    <div class="registeration__wrapper">


        <div class="registeration">
            <div class="registeration__image">
                <img src="/photo/form-image.jpg" alt="">
            </div>
            <div class="registeration__form">
                <h1>Realtime Chat App</h1>
                <form name="register" enctype="multipart/form-data">

                    <label for="username">Enter Username</label>
                    <input type="text" id="username" name="username" placeholder="Username" required />
                    <br>
                    <label for="email">Enter Email</label>
                    <input type="email" id="email" name="email" placeholder="Email" required />
                    <br>
                    <label for="pass">Enter Passowrd</label>
                    <input type="password" id="pass" name="password" placeholder="Password" required />
                    <br>
                    <label for="repass">Enter Re-enter Password</label>
                    <input type="password" id="repass" name="confirm" placeholder="Confirm Password" required />
                    <br>
                    <label for="profile_pic">Select Profile Picture</label>
                    <input type="file" name="profile_pic" id="profile_pic" accept="image/*" placeholder="hahah">

                    <br>

                    <button type="submit" name="submit">Continue to chat</button>

                </form>
                <span>already signed up? <a href="/login">Signed Now</a></span>
                <span id="errorMessage"></span>
            </div>

        </div>
    </div>
</body>
<script src="script/register.js"></script>

</html>