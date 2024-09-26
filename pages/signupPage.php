<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./styles/styles.css">
    <title>ProjectView Sign Up</title>
</head>
<body id="signup-body">
    <header class="header h-con va-center ha-end">
        <h1>ProjectView.</h1>
    </header>
    <main id="signup-main">
        <div class="h-con ha-center va-center" id="demo">
            <p id="demo-p">Demo Video w/ description</p>
        </div>
        <div class="v-con va-center ha-center full" id="mobile-landing">
            <button>Sign Up</button>
            <button>Sign In</button>
        </div>
        <div class="h-con ha-center va-center full" id="signup-form-con">
            <form action="" class="v-con va-center ha-center" id="signup-form">
                <h2>Sign Up</h2>
                <div class="form-elements v-con">
                    <label for="email">Email</label>
                    <input required type="email" autocomplete="off" id="email" placeholder="Enter your email">
                </div>
                <div class="form-elements v-con">
                    <label for="password">Password</label>
                    <input required type="text" autocomplete="off" id="password" placeholder="Eneter your password">
                </div>
                <div class="form-elements v-con">
                    <label for="verify">Re-Enter Password</label>
                    <input required type="text" autocomplete="off" id="verify" placeholder="Re-enter password">
                </div>
                <button class="button" id="signup-button">Sign Up</button>
                <span class="h-con ha-center va-center wide">Already have an account?<a id="signin-link" href="">Sign In.</a></span>
            </form>
        </div>
    </main>
</body>
</html>