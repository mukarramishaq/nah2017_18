var ext;
$('.overlay').hide();

function readURL(input) {
    if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function(e) {
            $('#imgViewer')
                .attr('src', e.target.result);

        };

        reader.readAsDataURL(input.files[0]);


        var file = document.getElementById('imagePicker').files[0];
        var res = file.name.split(".");
        ext = res[1];
        if (file) {
            getAsText(file);
        }

    }
}

function pivf() {
    $('.ajax-info').hide();
    if (document.getElementById('id-is-picture-uploaded').value.indexOf('.png') !== -1 || document.getElementById('id-is-picture-uploaded').value != "") {
        //out= confirm('Once submitted, you cannot access this section anymore! Do you want to submit?');	
        //return out;
        return true;
    } else {
        $('.ajax-info').addClass('label-info').text('Upload your picture please!');
        $('.ajax-info').show();
        return false;
    }

}

function saveAndNext() {
    $('.overlay').show();
    $('.ajax-info').addClass('label-info').text('Sending data ...');
    $('.ajax-info').show(500);
    var data = {

        'name': $('#name').val(),
        'gender': $('#gender').val(),
        'cNIC': $('#cNIC').val(),
        'dob': $('#datepicker').val(),
        'email': $('#email').val(),
        'phoneNumber': $('#phoneNumber').val(),
        'emergencyPhoneNumber': $('#emergencyPhoneNumber').val(),
        'disability': $('input[name=disability]:checked').val(),
    };

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/personalInformation/saveAndNext',
        type: 'POST',
        data: data,
        dataType: 'json',
        success: function(data) {
            $('.overlay').hide();
            if (data.type == 'success') {
                $('.ajax-info').removeClass('label-info').addClass('label-success').text(data.msg);
                window.location.reload();
                setTimeout(function() {
                    $('.ajax-info').hide().removeClass('label-success').addClass('label-info');
                }, 3000);
            } else {
                $('.ajax-info').removeClass('label-info').addClass('label-danger').text(data.msg);
                setTimeout(function() {
                    $('.ajax-info').hide().removeClass('label-danger').addClass('label-info');
                }, 3000);
            }
        },

        error: function(jqXhr) {
            $('.overlay').hide();
            console.log(jqXhr);
            if (jqXhr.status === 401) //redirect if not authenticated user.
                $(location).prop('', '/login');
            if (jqXhr.status === 422) {
                //process validation errors here.
                $errors = jqXhr.responseJSON; //this will get the errors response data.
                //show them somewhere in the markup
                //e.g
                errorsHtml = '<ul>';

                $.each($errors, function(key, value) {
                    errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
                });
                errorsHtml += '</ul>';

                //$( '#form-errors' ).html( errorsHtml ); //appending to a <div id="form-errors"></div> inside form
                $('.ajax-info').removeClass('label-info').addClass('label-danger').html(errorsHtml);
            } else {
                /// do some thing else
                $('.ajax-info').removeClass('label-info').addClass('label-danger').text('Error: somethig else went wrong. Make sure you have a valid internet connection');
                setTimeout(function() {
                    $('.ajax-info').hide().removeClass('label-danger').addClass('label-info');
                }, 5000);
            }
            console.log(jqXhr);
        },

    });
}

function save() {
    $('.overlay').show();
    $('.ajax-info').addClass('label-info').text('Sending data ...');
    $('.ajax-info').show(500);
    var data = {

        'name': $('#name').val(),
        'gender': $('#gender').val(),
        'cNIC': $('#cNIC').val(),
        'dob': $('#datepicker').val(),
        'email': $('#email').val(),
        'phoneNumber': $('#phoneNumber').val(),
        'emergencyPhoneNumber': $('#emergencyPhoneNumber').val(),
        'disability': $('input[name=disability]:checked').val(),
    };

    $.ajax({
        url: '/personalInformation/save',
        type: 'GET',
        data: data,
        dataType: 'json',
        success: function(data) {
            $('.overlay').hide();
            if (data.type == 'success') {
                $('.ajax-info').removeClass('label-info').addClass('label-success').text(data.msg);
                setTimeout(function() {
                    $('.ajax-info').hide().removeClass('label-success').addClass('label-info');
                }, 3000);
            } else {
                $('.ajax-info').removeClass('label-info').addClass('label-danger').text(data.msg);
                setTimeout(function() {
                    $('.ajax-info').hide().removeClass('label-danger').addClass('label-info');
                }, 3000);
            }
        },

        error: function(jqXhr) {
            $('.overlay').hide();
            console.log(jqXhr);
            if (jqXhr.status === 401) //redirect if not authenticated user.
                $(location).prop('', '/login');
            if (jqXhr.status === 422) {
                //process validation errors here.
                $errors = jqXhr.responseJSON; //this will get the errors response data.
                //show them somewhere in the markup
                //e.g
                errorsHtml = '<ul>';

                $.each($errors, function(key, value) {
                    errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
                });
                errorsHtml += '</ul>';

                //$( '#form-errors' ).html( errorsHtml ); //appending to a <div id="form-errors"></div> inside form
                $('.ajax-info').removeClass('label-info').addClass('label-danger').html(errorsHtml);
            } else {
                /// do some thing else
                $('.ajax-info').removeClass('label-info').addClass('label-danger').text('Error: somethig else went wrong. Make sure you have a valid internet connection');
                setTimeout(function() {
                    $('.ajax-info').hide().removeClass('label-danger').addClass('label-info');
                }, 5000);
            }
        },

    });
}

function getAsText(readFile) {

    var reader = new FileReader();

    // Read file into memory as UTF-16
    reader.readAsArrayBuffer(readFile);
    console.log(reader);
    reader
    // Handle progress, success, and errors
    reader.onprogress = updateProgress;
    reader.onload = loaded;
    reader.onerror = errorHandler;

}


function updateProgress(evt) {
    if (evt.lengthComputable) {
        // evt.loaded and evt.total are ProgressEvent properties
        var loaded = (evt.loaded / evt.total);
        if (loaded < 1) {
            // Increase the prog bar length
            // style.width = (loaded * 200) + "px";
        }
    }
}

function loaded(evt) {
    // Obtain the read file data
    var fileString = evt.target.result;
    // Handle UTF-16 file dump\
    var data = {
        "ext": ext,
        "content": fileString,
    };

    console.log(data);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: '/personalInformation/saveImage',
        type: 'POST',
        data: data,
        dataType: 'json',
        success: function(data) {

        },
        error: function(request, error) {

        },

    });
}

function errorHandler(evt) {
    if (evt.target.error.name == "NotReadableError") {
        // The file could not be read
    }
}