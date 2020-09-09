$('#createWorker').hide();
$(document).on('click', '#buttonCreateWorker', function (e) {
    $('#createOperation').hide();
    $('#modifyRoleWorker').hide();
    $('#displayAvailableOperation').hide();
    $('#updateOperation').hide();
    $("#tbodyAvailable").empty();
    $('#tbodyDone').empty();
    $('#tbodyProgress').empty();
    $('#type').empty();
    $("#typeUpdate").empty();
    $('#displayInProgressOperation').hide();
    $('#displayOperationDone').hide()
    $('#addOperationType').hide()
    $('#createWorker').fadeIn();
});

$('#createOperation').hide();
$(document).on('click', '#buttonCreateOperation', function (e) {
    $('#createWorker').hide();
    $('#modifyRoleWorker').hide();
    $('#displayAvailableOperation').hide();
    $('#updateOperation').hide();
    $("#tbodyAvailable").empty();
    $('#tbodyDone').empty();
    $('#tbodyProgress').empty();
    $('#type').empty();
    $("#typeUpdate").empty();
    $('#displayInProgressOperation').hide();
    $('#displayOperationDone').hide()
    $('#addOperationType').hide()
    $('#createOperation').fadeIn();
});


$('#modifyRoleWorker').hide();
$(document).on('click', '#buttonWorkersRole', function (e) {
    $('#createWorker').hide();
    $('#createOperation').hide();
    $('#displayAvailableOperation').hide();
    $('#updateOperation').hide();
    $("#tbodyAvailable").empty();
    $('#tbodyDone').empty();
    $('#tbodyProgress').empty();
    $('#type').empty();
    $("#typeUpdate").empty();
    $('#displayInProgressOperation').hide();
    $('#displayOperationDone').hide()
    $('#addOperationType').hide()
    $('#modifyRoleWorker').fadeIn();
});

$('#displayAvailableOperation').hide();
$(document).on('click', '#buttonDisplayAvailableOperation', function (e) {
    $('#createWorker').hide();
    $('#createOperation').hide();
    $('#modifyRoleWorker').hide();
    $('#updateOperation').hide();
    $("#tbodyAvailable").empty();
    $('#tbodyDone').empty();
    $('#tbodyProgress').empty();
    $('#type').empty();
    $("#typeUpdate").empty();
    $('#displayInProgressOperation').hide();
    $('#displayOperationDone').hide()
    $('#addOperationType').hide()
    $('#displayAvailableOperation').fadeIn();
});


$('#updateOperation').hide();
$(document).on('click', '#buttonUpdateOperation', function (e) {
    $('#createWorker').hide();
    $('#createOperation').hide();
    $('#modifyRoleWorker').hide();
    $('#displayAvailableOperation').hide();
    $("#tbodyAvailable").empty();
    $('#tbodyDone').empty();
    $('#tbodyProgress').empty();
    $('#type').empty();
    $("#typeUpdate").empty();
    $('#displayInProgressOperation').hide();
    $('#displayOperationDone').hide()
    $('#addOperationType').hide();
    $('#updateOperation').fadeIn();
})

$('#displayInProgressOperation').hide();
$(document).on('click', '#buttonDisplayInProgressOperation', function (e) {
    $('#createWorker').hide();
    $('#createOperation').hide();
    $('#modifyRoleWorker').hide();
    $('#displayAvailableOperation').hide();
    $("#tbodyAvailable").empty();
    $('#tbodyDone').empty();
    $('#tbodyProgress').empty();
    $('#type').empty();
    $("#typeUpdate").empty();
    $('#updateOperation').hide();
    $('#displayOperationDone').hide()
    $('#addOperationType').hide()
    $('#displayInProgressOperation').fadeIn();
})

$('#displayOperationDone').hide()
$(document).on('click', '#buttonDisplayDoneOperation', function (e) {
    $('#createWorker').hide();
    $('#createOperation').hide();
    $('#modifyRoleWorker').hide();
    $('#displayAvailableOperation').hide();
    $("#tbodyAvailable").empty();
    $('#tbodyDone').empty();
    $('#tbodyProgress').empty();
    $('#type').empty();
    $("#typeUpdate").empty();
    $('#updateOperation').hide();
    $('#displayInProgressOperation').hide();
    $('#addOperationType').hide()
    $('#displayOperationDone').fadeIn();
})

$('#addOperationType').hide()
$(document).on('click', '#buttonAddOperationType', function (e) {
    $('#createWorker').hide();
    $('#createOperation').hide();
    $('#modifyRoleWorker').hide();
    $('#displayAvailableOperation').hide();
    $("#tbodyAvailable").empty();
    $('#tbodyDone').empty();
    $('#tbodyProgress').empty();
    $('#updateOperation').hide();
    $('#displayInProgressOperation').hide();
    $('#displayOperationDone').hide();
    $('#type').empty();
    $("#typeUpdate").empty();
    $('#addOperationType').fadeIn();
})


$(document).ready(function () {

    $("#submitCreateWorker").click(function (e) {
        e.preventDefault();

        $.ajax({
            url : '/TP_Propar/controller/createWorker.action.php',
            type: 'POST',
            dataType : 'json',
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

                if (data.workerExist === true) {
                    alert("L'employé a été créé");
                    $("#createWorkerForm")[0].reset();
                }

                if (data.loginExist === true) {
                    alert("Le login est déjà utilisé")
                }

                if (data.badEmail === false) {
                    alert("l'email est invalide");
                }

                if (data.empty === false) {
                    alert("Veuillez remplir les champs");
                }

                if (data.workerExist === false) {
                    alert("L'employé existe déjà");
                    $("#createWorkerForm")[0].reset();
                }
            },
            error:function () {
                alert('erreur')
            }
        });


    });

    $('#submitNewOperation').click(function (e) {
        e.preventDefault();

        $.ajax({
            url : '/TP_Propar/controller/addOperation.action.php',
            type: 'POST',
            dataType : 'json',
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
                date_start : $('#dateBegin').val()

            },
            success:function (data) {

                if (data.successOp === true) {
                    alert("L'opération a été ajouté avec succès");
                    $("#addOperationForm")[0].reset();
                }

                if (data.badEmail === false) {
                    alert("L'email saisie est invalide")
                }

                if (data.badDate === true) {
                    alert("Vous ne pouvez pas choisir une date antérieure comme date de départ")
                }

                if (data.nan === false) {
                    alert("Veuillez un numéro de rue valide !")
                }

                if (data.empty === false) {
                    alert("Veuillez saisir les champs")
                }
            },
            error:function () {
                alert('erreur')
            }
        });
    });

    $('#submitModifyRoleWorker').click(function (e) {
        e.preventDefault();

        $.ajax({
            url : '/TP_Propar/controller/modifyWorkersRole.php',
            dataType : 'json',
            type: 'POST',
            data: {
                firstName : $('#workerFirstName').val(),
                lastName : $('#workerLastName').val(),
                id_worker : $('#workerID').val(),
                role : $('#modifyRole').val()

            },
            success:function (data) {
                if (data.success === true) {
                    alert("Le rôle a été modifié");
                    $("#modifyRoleWorkerForm")[0].reset();
                }

                if (data.success === false) {
                    alert("L'employé n'existe pas");
                    $("#modifyRoleWorkerForm")[0].reset();
                }

                if (data.nan === false) {
                    alert("Veuillez renseigner un nombre pour 'Worker's ID'")
                }

                if (data.empty === false) {
                    alert("Veuillez remplir tous les champs")
                }

            },
            error:function () {
                alert('erreur')
            }
        });

    });

    $('#submitUpdateOperation').click(function (e) {
        e.preventDefault();

        $.ajax({
            url : '/TP_Propar/controller/updateOperation.action.php',
            type: 'POST',
            dataType : 'json',
            data: {
                // Management::updateOperation($_POST['firstName'], $_POST['lastName'], $_POST['typeUpdate'], $_POST['description']);
                firstName : $('#clientFirstNameUpdate').val(),
                lastName : $('#clientLastNameUpdate').val(),
                typeUpdate : $('#typeUpdate').val(),
                description : $('#updateDescription').val(),
                id_operation : $('#updateOperationID').val()

            },
            success:function (data) {

                if (data.success === true) {
                    alert("L'opération a été mise à jour");
                    $("#updateForm")[0].reset();
                }

                if (data.success === false) {
                    alert("L'opération n'existe pas")
                }

                if (data.nan === true) {
                    alert("Veuillez sasir un nombre pour l'ID")
                }

                if (data.empty === true) {
                    alert("Veuillez remplir les champs")
                }

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

$(document).on('click', '#buttonDisplayDoneOperation', function (e) {

    $.ajax({
        url : '/TP_Propar/controller/displayOperationDone.action.php',
        method: 'POST',
        dataType : 'json',
        success:function (data) {
            data.forEach(element => {
                $("#tbodyDone").append("<tr id='trBody'></tr>")
                $('#tableOperationDone tbody>tr:last').append("<td>" + element.lastName + "</td>")
                $('#tableOperationDone tbody>tr:last').append("<td>" + element.firstName + "</td>")
                $('#tableOperationDone tbody>tr:last').append("<td>" + element.id_operation + "</td>")
                $('#tableOperationDone tbody>tr:last').append("<td>" + element.description + "</td>")
                $('#tableOperationDone tbody>tr:last').append("<td>" + element.email + "</td>")
                $('#tableOperationDone tbody>tr:last').append("<td>" + element.creation_date + "</td>")
                $('#tableOperationDone tbody>tr:last').append("<td>" + element.date_start + "</td>")
                $('#tableOperationDone tbody>tr:last').append("<td>" + element.date_end + "</td>")
                $('#tableOperationDone tbody>tr:last').append("<td>" + element.type + "</td>")

                $(document).ready( function () {
                    $('#tableOperationDone').DataTable();
                } );
            })

            // pour chaque tr il faut ajouter des td
        },
        error:function () {
            alert('erreur')
        }
    });
});

$(document).ready(function (e) {
    $('#submitNewOperation').click(function (e) {
        e.preventDefault();

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
})

$(document).ready(function (e) {
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
})

$(document).ready(function (e) {
    $('#submitUpdateOperation').click(function (e) {
        e.preventDefault();

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
})

$(document).ready(function (e) {
    $('#submitUpdateOperation').click(function (e) {
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
})


$(document).on('click', '#buttonDisplayInProgressOperation', function (e) {

    $.ajax({
        url : '/TP_Propar/controller/displayInProgressOperation.action.php',
        method: 'POST',
        dataType : 'json',
        success:function (data) {
            data.forEach(element => {
                $("#tbodyProgress").append("<tr id='trBody'></tr>")
                $('#tableOperationInProgress tbody>tr:last').append("<td>" + element.lastName + "</td>")
                $('#tableOperationInProgress tbody>tr:last').append("<td>" + element.firstName + "</td>")
                $('#tableOperationInProgress tbody>tr:last').append("<td>" + element.id_operation + "</td>")
                $('#tableOperationInProgress tbody>tr:last').append("<td>" + element.type + "</td>")
                $('#tableOperationInProgress tbody>tr:last').append("<td>" + element.description + "</td>")
                $('#tableOperationInProgress tbody>tr:last').append("<td>" + element.date_start + "</td>")

                $(document).ready( function () {
                    $('#tableOperationInProgress').DataTable();
                } );

            })

            // pour chaque tr il faut ajouter des td
        },
        error:function () {
            alert('erreur')
        }
    });
});

$(document).ready(function (e) {
    $('#addOperationTypeSubmit').click(function (e) {
        e.preventDefault();

        $.ajax({
            url : '/TP_Propar/controller/addOperationType.action.php',
            type: 'POST',
            dataType : 'json',
            data: {
                // Management::updateOperation($_POST['firstName'], $_POST['lastName'], $_POST['typeUpdate'], $_POST['description']);
                type : $('#typeOperation').val(),
                price : $('#typeOperationPrice').val(),
            },
            success:function (data) {

                if (data.success === true) {
                    alert("Le type d'opération a été ajouté à la BDD");
                    $("#addOperationTypeForm")[0].reset();
                }

                if (data.success === false) {
                    alert("Veuillez remplir les champs");
                }

                if (data.nan === false) {
                    alert("Veuillez saisir des chiffres pour le prix !");
                }

                if (data.exist === false) {
                    alert("Le type d'opération est déjà présent en BDD");
                    $("#addOperationTypeForm")[0].reset();
                }

            },
            error:function () {
                alert('erreur')
            }
        });

    });
})

$(document).ready(function (e) {
    $('#endAnOperationSubmit').click(function (e) {
        e.preventDefault();
        $("#tbodyProgress").empty();

        $.ajax({
            url : '/TP_Propar/controller/endOperation.action.php',
            type: 'POST',
            dataType : 'json',
            data: {
                // Management::updateOperation($_POST['firstName'], $_POST['lastName'], $_POST['typeUpdate'], $_POST['description']);
                id_operation : $('#doneOperationId').val()
            },
            success:function (data) {

                if (data.success === true) {
                    alert("Vous avez cloturé l'opération");
                    $("#endOperationForm")[0].reset();
                }

                if (data.success === false) {
                    alert("L'id de l'opération n'existe pas")
                }

                if (data.nan === false) {
                    alert("Veuillez entrez un nombre pour l'ID")
                }

                if (data.empty === false) {
                    alert("Veuillez remplir les champs")
                }

            },
            error:function () {
                alert('erreur')
            }
        });

    })
})

$(document).ready(function (e) {
    $('#endAnOperationSubmit').click(function (e) {
        e.preventDefault();

        $.ajax({
            url : '/TP_Propar/controller/displayInProgressOperation.action.php',
            method: 'POST',
            dataType : 'json',
            success:function (data) {
                data.forEach(element => {
                    $("#tbodyProgress").append("<tr id='trBody'></tr>")
                    $('#tableOperationInProgress tbody>tr:last').append("<td>" + element.lastName + "</td>")
                    $('#tableOperationInProgress tbody>tr:last').append("<td>" + element.firstName + "</td>")
                    $('#tableOperationInProgress tbody>tr:last').append("<td>" + element.id_operation + "</td>")
                    $('#tableOperationInProgress tbody>tr:last').append("<td>" + element.type + "</td>")
                    $('#tableOperationInProgress tbody>tr:last').append("<td>" + element.description + "</td>")
                    $('#tableOperationInProgress tbody>tr:last').append("<td>" + element.date_start + "</td>")

                    $(document).ready( function () {
                        $('#tableOperationInProgress').DataTable();
                    } );

                })

                // pour chaque tr il faut ajouter des td
            },
            error:function () {
                alert('erreur')
            }
        });
    })
})

$(document).ready(function (e) {
    $('#takeAnOperationSubmit').click(function (e) {
        e.preventDefault();
        $("#tbodyAvailable").empty();

        $.ajax({
            url : '/TP_Propar/controller/takeOperation.action.php',
            type: 'POST',
            dataType : 'json',
            data: {
                // Management::updateOperation($_POST['firstName'], $_POST['lastName'], $_POST['typeUpdate'], $_POST['description']);
                id_operation : $('#operationId').val()
            },
            success:function (data) {
                if (data.success === true) {
                    alert("Vous avez pris l'opération");
                    $("#takeAnOperationForm")[0].reset();
                }

                if (data.success === false) {
                    alert("Vous ne pouvez pas prendre plus d'opérations");
                    $("#takeAnOperationForm")[0].reset();
                }

                if (data.nan === true) {
                    alert("Veuillez saisir un nombre pour l'id")
                }

                if (data.empty === true) {
                    alert("Veuillez remplir les champs")
                }



            },
            error:function () {
                alert('erreur')
            }
        });

    })
})


$(document).ready(function (e) {
    $('#takeAnOperationSubmit').click(function (e) {
        e.preventDefault();

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
    })
})



$(document).on('click', '#buttonCreateOperation', function (e) {

    $.ajax({
        url : '/TP_Propar/controller/howManyType.action.php',
        method: 'POST',
        dataType : 'json',
        success:function (data) {
            data.forEach(element => {
                $("#type").append("<option>" + element.type + "</option>")

            })

            // pour chaque tr il faut ajouter des td
        },
        error:function () {
            alert('erreur')
        }
    });
});

$(document).on('click', '#buttonUpdateOperation', function (e) {

    $.ajax({
        url : '/TP_Propar/controller/howManyIdOperationType.action.php',
        method: 'POST',
        dataType : 'json',
        success:function (data) {
            data.forEach(element => {
                $("#typeUpdate").append("<option>" + element.id_type + "</option>")

            })

            // pour chaque tr il faut ajouter des td
        },
        error:function () {
            alert('erreur')
        }
    });
});

