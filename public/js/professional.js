function save() {
    var data;
    $('.overlay').show();
    $('.ajax-info').addClass('label-info').text('Sending data ...');
    $('.ajax-info').show(500);

    if ($('#employed').val() == 'unemployed') {
        data = {
            'employed': $('#employed').val(),
            'country': $('#currentCountry').val(),
            'city': $('#currentCity').val(),
            'address': $('#currentAddress').val()

        };
    } else if ($('#employed').val() == 'employed') {
        data = {
            'employed': $('#employed').val(),
            'country': $('#currentCountry').val(),
            'city': $('#currentCity').val(),
            'address': $('#currentAddress').val(),
            'industry': $('#eIndustry').val(),
            // 'otherIndustry': $('#otherIndustry').val(),
            'organization': $('#eOrganization').val(),
            'designation': $('#eDesignation').val(),
            // 'otherDesignation': $('#otherDesignation').val(),



        };
    } else if ($('#employed').val() == 'selfemployed') {
        data = {


            'employed': document.getElementById("employed").value,
            'country': document.getElementById("currentCountry").value,
            'city': document.getElementById("currentCity").value,
            'address': document.getElementById("currentAddress").value,
            'selfIndustry': document.getElementById("seIndustry").value,
            // 'selfOtherIndustry': document.getElementById("eOtherIndustry").value,
            'ecompany': document.getElementById("seCompany").value,
            // 'date': document.getElementById("datepicker").value,
            'selfDesignation': document.getElementById("seDesignation").value,
            // 'selfOtherDesignation': document.getElementById("eOtherDesignation").value,
            // 'logo': document.getElementById("seCompanyLogo").value,
            //'totalEmployes': document.getElementById("eTotalEmployes").value,
            //'nustians': document.getElementById("eTotalNustEmployes").value,
            //'link': document.getElementById("eWebsite").value,

        };
    } else if ($('#employed').val() == 'highereducation') {
        data = {
            'employed': $('#employed').val(),
            'country': $('#currentCountry').val(),
            'city': $('#currentCity').val(),
            'address': $('#currentAddress').val(),
            'universityName': $('#heUniversityName').val(),
            'degreeName': $('#heDegreeName').val(),



        };
    }


    console.log(data);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/professionalInformation/save',
        type: 'POST',
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


function saveAndNext() {
    var data;
    $('.overlay').show();
    $('.ajax-info').addClass('label-info').text('Sending data ...');
    $('.ajax-info').show(500);

    if ($('#employed').val() == 'unemployed') {
        data = {
            'employed': $('#employed').val(),
            'currentCountry': $('#currentCountry').val(),
            'currentCity': $('#currentCity').val(),
            'currentAddress': $('#currentAddress').val()

        };
    } else if ($('#employed').val() == 'employed') {
        data = {
            'employed': $('#employed').val(),
            'currentCountry': $('#currentCountry').val(),
            'currentCity': $('#currentCity').val(),
            'currentAddress': $('#currentAddress').val(),
            'eIndustry': $('#eIndustry').val(),
            // 'otherIndustry': $('#otherIndustry').val(),
            'eOrganization': $('#eOrganization').val(),
            'eDesignation': $('#eDesignation').val(),
            // 'otherDesignation': $('#otherDesignation').val(),



        };
    } else if ($('#employed').val() == 'selfemployed') {
        data = {


            'employed': document.getElementById("employed").value,
            'currentCountry': document.getElementById("currentCountry").value,
            'currentCity': document.getElementById("currentCity").value,
            'currentAddress': document.getElementById("currentAddress").value,
            'seIndustry': document.getElementById("seIndustry").value,
            // 'selfOtherIndustry': document.getElementById("eOtherIndustry").value,
            'seCompany': document.getElementById("seCompany").value,
            // 'date': document.getElementById("datepicker").value,
            'seDesignation': document.getElementById("seDesignation").value,
            // 'selfOtherDesignation': document.getElementById("eOtherDesignation").value,
            // 'logo': document.getElementById("seCompanyLogo").value,
            //'totalEmployes': document.getElementById("eTotalEmployes").value,
            //'nustians': document.getElementById("eTotalNustEmployes").value,
            //'link': document.getElementById("eWebsite").value,

        };
    } else if ($('#employed').val() == 'highereducation') {
        data = {
            'employed': $('#employed').val(),
            'currentCountry': $('#currentCountry').val(),
            'currentCity': $('#currentCity').val(),
            'currentAddress': $('#currentAddress').val(),
            'universityName': $('#heUniversityName').val(),
            'degreeName': $('#heDegreeName').val(),



        };
    }


    console.log(data);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/professionalInformation/saveAndNext',
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
        },

    });
}