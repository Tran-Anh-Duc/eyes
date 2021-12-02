$(document).ready(function () {
    $(".navbar-brand").html("jQuery");
    $(".navbar-brand").click(welcome);

    function welcome() {
        alert("welcome")
    }


    $.ajax(
        {
            url: "https://api.github.com/users/Tran-Anh-Duc/repos",
            type: "GET",
            dataType: "json",
        }
    ).done(function (response) {
        console.log(response)
        let html = "";
        for (let i = 0; i < response.length; i++) {
            // document.write(response[i].name+" "+response[i].id+"<br>");
            html += `<tr>
                      <th scope="row">${response[i].id}</th>
                      <td>${response[i].name}</td>
                    </tr>`
        }
        $(".list-git").html(html);
    })

    function showError(error) {
        if (error.status === 404) {
            alert("sai duong dan")
        }
    }

});
