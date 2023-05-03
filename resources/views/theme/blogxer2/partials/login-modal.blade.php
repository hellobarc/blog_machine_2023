<div class="modal fade" id="authenticationModal" tabindex="-1" role="dialog" aria-labelledby="authenticationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
            <h4 class="modal-title text-white" id="authenticationModalLabel">User Authentication</h4>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body text-center">
                <div id="login-registrartion-button">
                    <ul>
                        <li id="login-button">Login</li>
                        <li id="registration-button" class="ml-5">Registration</li>
                    </ul>
                </div>
                <div id="login-form">
                    <form id="userLogin" method="POST">
                        <div class="alert alert-danger" role="alert" id="errorMsg" style="display: none" >
                            Credentials does not match 
                        </div>
                        <input type="email" id="user_email" name="email" placeholder="Enter your email" required><br>
                        <input type="password" id="user_password" name="password" class="mt-3" placeholder="Password must be 8 character"><br>
                        <button type="submit" class="btn btn-success btn-lg mt-3" id="loginBtn">Login</button>
                    </form>
                </div>
                <div id="register-form">
                    <form id="userRegistration" method="POST">
                        <div class="alert alert-danger" role="alert" id="errorRegisterMsg" style="display: none" >
                            Give the valid information 
                        </div>
                        <input type="text" id="register_name" name="name" placeholder="Enter your name" required><br>
                        <input type="text" id="register_email" name="email" placeholder="Enter your email" class="mt-3" required><br>
                        <input type="password" id="register_password" name="password" class="mt-3" placeholder="Password must be 8 character" required><br>
                        <input id="password-confirm" type="password" class="mt-3" name="password_confirmation" required autocomplete="new-password" placeholder="Same as password"><br>
                        <button type="submit" class="btn btn-success btn-lg mt-3">Register</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>
