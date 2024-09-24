<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/styles.css">
    <title>Sign Up</title>
</head>
<body>
    <div id="signup-page">
        <header id="banner">
            <h1>ProjectView.</h1>
        </header>
        <main id="signup-main">
            <div class="demo"></div>
            <div class="mobile-landing">
                <button>
                    <a href="#form">Sign UP</a>
                </button>
                <button>Sign Up</button>
            </div>
            <div class="form-container">
                <form class="signup-form" id="form" action="">
                    <h2>Sign Up</h2>
                    <div class="form-elements">
                        <label for="email">Email</label>
                        <input name="email" required type="email" id="email" autocomplete="off">
                    </div>
                    <div class="form-elements">
                        <label for="password">Password</label>
                        <input name="password" required type="text" id="password">
                    </div>
                    <div class="form-elements">
                        <label for="verify">Re-Enter Password</label>
                        <input name="verify" required type="text" id="verify">
                    </div>
                    <button type="submit">Sign Up</button>
                </form>
            </div>
        </main>
    </div>
</body>
</html>