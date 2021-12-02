$(document).ready(function () {
    let data = [];
    $(".navbar-brand").html("jQuery");
    // $(".navbar-brand").click(welcome);

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
        data= response;
        displayGit(response)

    })

    function showError(error) {
        if (error.status === 404) {
            alert("sai duong dan")
        }
    }

    $("#search-input").on("input",search);

    function search(){
        let searchValue = $(this).val();
        let result = [];
        for (let i = 0; i < data.length; i++) {
            if (data[i].name.includes(searchValue)){
                result.push(data[i]);
            }
        }
        displayGit(result);
    }

    function displayGit(gits){
        let html = "";
        for (let i = 0; i < gits.length; i++) {
            // document.write(response[i].name+" "+response[i].id+"<br>");
            html += `<tr>
                      <th scope="row">${gits[i].id}</th>
                      <td>${gits[i].name}</td>
                    </tr>`
        }
        $(".list-git").html(html);
    }

});
