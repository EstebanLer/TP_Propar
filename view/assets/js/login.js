$(document).on('click', "#loginUser" ,function (e) {
    e.preventDefault();

    $.ajax({
        url : '../controller/login.action.php',
        type : 'POST',
        dataType: 'json',
        data : {
            // Management::updateOperation($_POST['firstName'], $_POST['lastName'], $_POST['typeUpdate'], $_POST['description']);
            password : $('#exampleInputPassword').val(),
            username : $('#login').val()
        },
        success : function (data) {
            if (data.empty == false) {
                alert("Veuillez remplir les champs")
            }

            if (data.return == false){
                alert("Mot de passe incorrect")
            }


            if (data.return == true) {
                window.location.href = "index.php";
            }

        },
        error : function () {
            alert('erreur')
        }
    });
})
