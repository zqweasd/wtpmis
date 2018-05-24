

$(document).ready(function(){

    var url = "/ajax-crud/public/tasks";

    //display modal form for task editing
    $('.open-modal').click(function(){
        var trans_id = $(this).val();

        $.get(url + '/' + trans_id, function (data) {
            //success data
            console.log(data);
            $('#trans_id').val(data.id);
            $('#assistance_type').val(data.assistance_type);
            $('#assistance').val(data.assistance);
            $('#assistance_amount').val(data.assistance_amount);
            $('#btn-save').val("update");

            $('#editModal').modal('show');
        }) 
    });


    //delete task and remove it from list
    $('.delete-task').click(function(){
        var task_id = $(this).val();

        $.ajax({

            type: "DELETE",
            url: url + '/' + trans_id,
            success: function (data) {
                console.log(data);

                $("#assistance_type" + trans_id).remove();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    //create new task / update existing task
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        e.preventDefault(); 

        var formData = {
            task: $('#assistance_type').val(),
            description: $('#assistance').val(),
            description: $('#assistance_amount').val(),
        }

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();

        var type = "POST"; //for creating new resource
        var task_id = $('#trans_id').val();;
        var my_url = url;

        if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url += '/' + task_id;
        }

        console.log(formData);

        $.ajax({

            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);

                var task = '<tr id="task' + data.trans_id + '"><td>' + data.trans_id + '</td><td>' + data.assistance_type + '</td><td>' + data.assistance + '</td><td>' + data.assistance_amount + '</td>';
                task += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.id + '">Edit</button>';
                task += '<button class="btn btn-danger btn-xs btn-delete delete-task" value="' + data.id + '">Delete</button></td></tr>';

                if (state == "add"){ //if user added a new record
                    $('#tasks-list').append(task);
                }else{ //if user updated an existing record

                    $("#task" + task_id).replaceWith( task );
                }

                $('#frmTasks').trigger("reset");

                $('#editModal').modal('hide')
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});
