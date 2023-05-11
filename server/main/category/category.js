var cId = '';


var displayEdit = (id, name) => {
    cId = id;
    const element = document.querySelector('.cname');
    const action = document.querySelector('.action');
    element.value = name;
    action.value = 'Update'
}

var resetForm = () => {
    const element = document.querySelector('.cname');
    const inp = document.querySelector('.action');
    element.value = '';
    inp.value = 'Add'
}

var submit = () => {
    const action = document.querySelector('.action').value;
    const name = document.querySelector('.cname').value;
    if (action == 'Add') {
        // add category
        $.ajax({
            url: 'main/category/new.php',
            type: 'post',
            dataType: 'json',
            data: ({name}),
            success: (status) => {
                if (status == 201) {
                    window.location.reload();
                }
            }
        });
    }
    else {
        // update category
        $.ajax({
            url: 'main/category/update.php',
            type: 'post',
            dataType: 'json',
            data: ({id: cId, name}),
            success: (status) => {
                if (status == 201) {
                    window.location.reload();
                }
            }
        });
    }
}

var confirmRemoval = (e, id) => {
    const parent = e.parentElement.parentElement;
    const name = parent.querySelector('td').innerHTML;
    document.getElementById("producer-name").innerHTML = name;
    $('#confirm-removal-modal').modal({show: true});

    $("#delete-button").click(function () {
        $.ajax({
            url: 'main/category/delete.php',
            type: 'post',
            dataType: 'json',
            data: ({id}),
            success: (status) => {
                if (status == 201) {
                    $('.alert-success').fadeIn();
                    setTimeout(function() {
                        $('.alert-success').fadeOut();
                        window.location.reload();
                    }, 1500);
                }
            }
        });
    });
}
$('.alert-success').fadeOut();