@extends('auth.auth_layout')

@section('title', 'Login')
@section('heading', 'Login Your Account')

@section('content')


    <div class="form-heading mb-4 pb-lg-2">
        <h1 class="">Get Started Now!</h1>
        <p class="font-small">Please Login to your account to continue.</p>
    </div>
    <form class="register-form row form-fields-wrap d-flex flex-wrap justify-content-between flex-column">
        <div class="fields-wrap">
            <div class="col-12 mb-md-3 mb-2">
                <div>
                    <label class="form-label">Your Email address</label>
                    <input type="email" class="form-control" placeholder="Email address">
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">Enter Password</label>
                <input type="password" class="form-control" placeholder="Password">
            </div>
            <p class="forget-pass text-end mt-2 mt-md-4"><a href="#">Forget Password</a></p>
        </div>
        <div class="account-wrap">
            <div class="col-12 btn-wrap mt-5 pt-xl-4">
                <button type="submit" class="btn btn-primary w-100">Register</button>
            </div>
            <p class="text-center my-2 my-md-3">or</p>
            <div class="col-12 btn-wrap secondary-btn">
                <button type="submit" class="btn btn-secondary w-100">Login with one-time code</button>
            </div>
            <div class="col-12 login-text text-center mt-3 mt-md-5 pt-xl-4">
                <p>Don’t have an account? <a href="#">Register</a></p>
            </div>
        </div>

    </form>

    {{-- <script>
document.querySelectorAll(".select-wrapper").forEach(function(wrapper) {
    const selectBox = wrapper.querySelector(".custom-select");
    const optionsList = wrapper.querySelector(".select-list");
    const hiddenInput = wrapper.querySelector(".hidden-select");
    // toggle dropdown
    selectBox.addEventListener("click", function(e) {
        e.stopPropagation();
        document.querySelectorAll(".select-list").forEach(list => {
            if(list !== optionsList) list.style.display = "none";
        });
        optionsList.style.display =
            optionsList.style.display === "block" ? "none" : "block";
    });
    // select option
    optionsList.querySelectorAll("li").forEach(function(option) {
        option.addEventListener("click", function() {
            selectBox.textContent = this.textContent;
            hiddenInput.value = this.getAttribute("data-value");
            optionsList.style.display = "none";
        });
    });

});
// close when clicking outside
document.addEventListener("click", function() {
    document.querySelectorAll(".select-list").forEach(list => {
        list.style.display = "none";
    });
});
</script> --}}
@endsection
