$(document).ready(function (){
    $(".navbar-brand").html("jQuery");
    $(".navbar-brand").click(welcome);

    function welcome(){
        alert("welcome")
    }



    $.ajax(
        {
            url:"https://api.github.com/users/Tran-Anh-Duc/repos",
            type:"GET",
            dataType:"json",
        }
    ).done(function (response){
        console.log(response)
    })
});
