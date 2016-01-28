
    $(document).ready(function(){

        $.getScript("/me/js/manpowers/validate_base.js", function(){});

        $('#rootwizard').bootstrapWizard({

            'tabClass': 'nav nav-tabs',

            onTabClick: function(tab, navigation, index) {
                return false;
            },

            onNext: function(tab, navigation, index) {

                switch (index)
                {
                    case 1:
                        $.getScript("/me/js/manpowers/personal_data_rules.js", function(){});
                        var $valid = $("#step1").valid();

                        break;

                    case 2:
                        alert('case 2');
                        break;

                    case 3:
                        alert('case 3');
                        break;

                    case 4:
                        alert('case 4');
                        break;
                }

                if(!$valid) {
                    $validator.focusInvalid();
                    return false;
                }
            }
        });
    });
