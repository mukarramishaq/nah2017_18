function save() {
    var data;
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
            'industry': $('#industry').val(),
            'otherIndustry': $('#otherIndustry').val(),
            'organization': $('#organization').val(),
            'designation': $('#designation').val(),
            'otherDesignation': $('#otherDesignation').val(),



        };
    } else if ($('#employed').val() == 'selfemployed') {
        data = {


            'employed': document.getElementById("employed").value,
            'country': document.getElementById("currentCountry").value,
            'city': document.getElementById("currentCity").value,
            'address': document.getElementById("currentAddress").value,
            'selfIndustry': document.getElementById("eIndustry").value,
            'selfOtherIndustry': document.getElementById("eOtherIndustry").value,
            'ecompany': document.getElementById("eCompany").value,
            'date': document.getElementById("datepicker").value,
            'selfDesignation': document.getElementById("eDesignation").value,
            'selfOtherDesignation': document.getElementById("eOtherDesignation").value,
            'logo': document.getElementById("eCompanyLogo").value,
            'totalEmployes': document.getElementById("eTotalEmployes").value,
            'nustians': document.getElementById("eTotalNustEmployes").value,
            'link': document.getElementById("eWebsite").value,

        };
    }


    // console.log(data);
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

        },
        error: function(request, error) {

        },

    });
}