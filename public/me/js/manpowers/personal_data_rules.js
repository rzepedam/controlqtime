$(document).ready(function() {

    $("#step1").validate({

        rules: {
            male_surname: {
                required: true,
                maxlength: 30
            },

            female_surname: {
                required: true,
                maxlength: 30
            },

            first_name: {
                required: true,
                maxlength: 30
            },

            second_name: {
                maxlength: 30
            },

            rut: {
                required: true,
                maxlength: 12
            },

            birthday: {
                required: true
            },

            gender_id: {
                required: true
            },

            country_id: {
                required: true
            },

            raking_id: {
                required: true
            },

            subarea_id: {
                required: true
            },

            commune_id: {
                required: true
            },

            address: {
                required: true,
            },

            phone1: {
                required: true,
                maxlength: 20
            },

            phone2: {
                maxlength: 20
            },

            email: {
                required: true,
                email: true,
                maxlength: 100
            }
        },
    });

});
