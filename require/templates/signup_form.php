<form method="post" class="v-con va-center ha-center" id="signup-form">
                <h2>Sign Up</h2>
                <?php
                    if ($error !== ''){
                        echo "<p style='color: red'>$error</p>";
                    }
                ?>
                <div class="form-elements v-con">
                    <label for="name">Name</label>
                    <input name="name"required type="text" autocomplete="off" id="email" placeholder="Enter your email">
                </div>
                <div class="form-elements v-con">
                    <label for="email">Email</label>
                    <input name="email"required type="email" autocomplete="off" id="email" placeholder="Enter your email">
                </div>
                <div class="form-elements v-con">
                    <label for="password">Password</label>
                    <input name="password" required type="text" autocomplete="off" id="password" placeholder="Eneter your password">
                </div>
                <div class="form-elements v-con">
                    <label for="verify">Re-Enter Password</label>
                    <input name="verify" required type="text" autocomplete="off" id="verify" placeholder="Re-enter password">
                </div>
                <button class="button" type="submit" id="signup-button">Sign Up</button>
                <span class="h-con ha-center va-center wide">Already have an account?<a id="signin-link" href="">Sign In.</a></span>
            </form>