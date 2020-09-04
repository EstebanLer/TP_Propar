$('#createWorker').hide()
$(document).on('click', '#buttonCreateWorker', function (e) {
    $('#createOperation').hide()
    $('#modifyRoleWorker').hide()
    $('#createWorker').fadeIn()
})

$('#createOperation').hide()
$(document).on('click', '#buttonCreateOperation', function (e) {
    $('#createWorker').hide()
    $('#modifyRoleWorker').hide()
    $('#createOperation').fadeIn()
})


$('#modifyRoleWorker').hide()
$(document).on('click', '#buttonWorkersRole', function (e) {
    $('#createWorker').hide()
    $('#createOperation').hide()
    $('#modifyRoleWorker').fadeIn()
})