$('#createWorker').hide();
$(document).on('click', '#buttonCreateWorker', function (e) {
    $('#createOperation').hide();
    $('#modifyRoleWorker').hide();
    $('#displayAvailableOperation').hide();
    $('#updateOperation').hide();
    $("#tbodyAvailable").empty();
    $('#displayInProgressOperation').hide();
    $('#createWorker').fadeIn();
});

$('#createOperation').hide();
$(document).on('click', '#buttonCreateOperation', function (e) {
    $('#createWorker').hide();
    $('#modifyRoleWorker').hide();
    $('#displayAvailableOperation').hide();
    $('#updateOperation').hide();
    $("#tbodyAvailable").empty();
    $('#displayInProgressOperation').hide();
    $('#createOperation').fadeIn();
});


$('#modifyRoleWorker').hide();
$(document).on('click', '#buttonWorkersRole', function (e) {
    $('#createWorker').hide();
    $('#createOperation').hide();
    $('#displayAvailableOperation').hide();
    $('#updateOperation').hide();
    $("#tbodyAvailable").empty();
    $('#displayInProgressOperation').hide();
    $('#modifyRoleWorker').fadeIn();
});

$('#displayAvailableOperation').hide();
$(document).on('click', '#buttonDisplayAvailableOperation', function (e) {
    $('#createWorker').hide();
    $('#createOperation').hide();
    $('#modifyRoleWorker').hide();
    $('#updateOperation').hide();
    $("#tbodyAvailable").empty();
    $('#displayInProgressOperation').hide();
    $('#displayAvailableOperation').fadeIn();
});


$('#updateOperation').hide();
$(document).on('click', '#buttonUpdateOperation', function (e) {
    $('#createWorker').hide();
    $('#createOperation').hide();
    $('#modifyRoleWorker').hide();
    $('#displayAvailableOperation').hide();
    $("#tbodyAvailable").empty();
    $('#displayInProgressOperation').hide();
    $('#updateOperation').fadeIn();
})

$('#displayInProgressOperation').hide();
$(document).on('click', '#buttonDisplayInProgressOperation', function (e) {
    $('#createWorker').hide();
    $('#createOperation').hide();
    $('#modifyRoleWorker').hide();
    $('#displayAvailableOperation').hide();
    $("#tbodyAvailable").empty();
    $('#updateOperation').hide();
    $('#displayInProgressOperation').fadeIn();
})



$(document).ready(function () {

    $("#submitCreateWorker").click(function (e) {
        e.preventDefault();

        $.ajax({
            url : '/TP_Propar/controller/createWorker.action.php',
            type: 'POST',
            data: {
                login : $("#login").val(),
                password : $("#password").val(),
                firstName : $("#firstName").val(),
                lastName : $("#lastName").val(),
                birthday : $("#birthday").val(),
                email : $("#email").val(),
                role : $("#role").val()
            },
            success:function (data) {

                alert("L'employé a été créé");

            },
            error:function () {
                alert('Un employé existe déjà ')
            }
        });
        $("#createWorkerForm")[0].reset();

    });

    $('#submitNewOperation').click(function (e) {
        e.preventDefault();

        $.ajax({
            url : '/TP_Propar/controller/addOperation.action.php',
            type: 'POST',
            data: {
                firstName : $('#clientFirstName').val(),
                lastName : $('#clientLastName').val(),
                city : $('#city').val(),
                zipCode : $('#inputZip').val(),
                street : $('#street').val(),
                number : $('#number').val(),
                email : $('#clientEmail').val(),
                type : $('#type').val(),
                description : $('#description').val(),

            },
            success:function () {
                alert("L'opération a été ajouté avec succès");
            },
            error:function () {
                alert('erreur')
            }
        });
        $("#addOperationForm")[0].reset();
    });

    $('#submitModifyRoleWorker').click(function (e) {
        e.preventDefault();

        $.ajax({
            url : '/TP_Propar/controller/modifyWorkersRole.php',
            type: 'POST',
            data: {
                firstName : $('#workerFirstName').val(),
                lastName : $('#workerLastName').val(),
                id_worker : $('#workerID').val(),
                role : $('#modifyRole').val()

            },
            success:function () {
                alert("Le rôle a été modifié");
            },
            error:function () {
                alert('erreur')
            }
        });
        $("#modifyRoleWorkerForm")[0].reset();
    });

    $('#submitUpdateOperation').click(function (e) {
        e.preventDefault();

        $.ajax({
            url : '/TP_Propar/controller/updateOperation.action.php',
            type: 'POST',
            data: {
                // Management::updateOperation($_POST['firstName'], $_POST['lastName'], $_POST['typeUpdate'], $_POST['description']);
                firstName : $('#clientFirstNameUpdate').val(),
                lastName : $('#clientLastNameUpdate').val(),
                typeUpdate : $('#typeUpdate').val(),
                description : $('#updateDescription').val()

            },
            success:function () {
                alert("L'opération a été mise à jour");
            },
            error:function () {
                alert('erreur')
            }
        });
        $("#updateForm")[0].reset();
    });

    $('#submitNewOperation').click(function (e) {
        e.preventDefault();

        $.ajax({
            url : '/TP_Propar/controller/displayIncomesByMonth.action.php',
            type: 'POST',
            dataType : 'json',
            success:function (data) {
                $("#incomesByMonth").html(data + " €")
            },
            error:function () {
                alert('erreur')
            }
        });
    });

});

$(document).ready(function () {
        $.ajax({
                url : '/TP_Propar/controller/displayIncomesByMonth.action.php',
                type: 'POST',
                dataType : 'json',
                success:function (data) {
                    $("#incomesByMonth").html(data + " €")
                },
                error:function () {
                    alert('erreur')
                }
            });
});

$(document).ready(function () {
    $.ajax({
        url : '/TP_Propar/controller/displayIncomesByYear.action.php',
        type: 'POST',
        dataType : 'json',
        success:function (data) {
            $("#incomesByYear").html(data + " €")
        },
        error:function () {
            alert('erreur')
        }
    });
});

$(document).on('click', '#buttonDisplayAvailableOperation', function (e) {

    $.ajax({
        url : '/TP_Propar/controller/displayAvailableOperation.action.php',
        method: 'POST',
        dataType : 'json',
        success:function (data) {
            data.forEach(element => {
                $("#tbodyAvailable").append("<tr id='trBody'></tr>")
                $('#tableOperation tbody>tr:last').append("<td>" + element.lastName + "</td>")
                $('#tableOperation tbody>tr:last').append("<td>" + element.firstName + "</td>")
                $('#tableOperation tbody>tr:last').append("<td>" + element.id_operation + "</td>")
                $('#tableOperation tbody>tr:last').append("<td>" + element.description + "</td>")
                $('#tableOperation tbody>tr:last').append("<td>" + element.email + "</td>")
                $('#tableOperation tbody>tr:last').append("<td>" + element.creation_date + "</td>")
                $('#tableOperation tbody>tr:last').append("<td>" + element.date_start + "</td>")
                $('#tableOperation tbody>tr:last').append("<td>" + element.type + "</td>")

                $(document).ready( function () {
                    $('#tableOperation').DataTable();
                } );
            })

            // pour chaque tr il faut ajouter des td
        },
        error:function () {
            alert('erreur')
        }
    });
});

