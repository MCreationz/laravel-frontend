@extends('auth.auth_layout')

@section('title', 'Login')
@section('heading', 'Login Your Account')

@section('content')

   

<script>
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
</script>
@endsection
