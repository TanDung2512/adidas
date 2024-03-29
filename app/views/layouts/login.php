<div class="container" id="login-container">
    <div class="logo-big">
        <img src="app/assets/images/logo-02.png" alt="logo" />
    </div>
    <div class="login-wrapper">
        <h2 class="txt--big-heading">Login</h2>
        <p class="">Welcome back, please log in</p>
        <form action="login-authen" method="POST" class="form-control">
            <label for="email">
                Email
            </label>
            <input type="email" name="email" id="email" class="mb-2" />
            <label for="password">
                Password
            </label>
            <input type="password" name="password" id="password" />
            <div class="form-bottom mt-5">
                <a id="login" class="btn pl-2">Log in</a>
            </div>
        </form>
    </div>
</div>
<script>
$("#loading").css("display", "none");
$(document).ready(function(){
  $("#login").on("click" ,function(e){
    $("#loading").css("display", "block"); 
    $.ajax({
        url:"/web-assignment/login-authen",
        type: "POST",
        crossDomain: true,
        data: {
            mail: $("#email").val(),
            password: $("#password").val(),
        },
        success: function(result){
            if (result == 1) {
                document.location.href = '/web-assignment/landing';
            } else {
                window.reload();
            }
        }
    });
    e.preventDefault();
  });
});
</script>