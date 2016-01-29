
    $(document).ready(function(){

        $.getScript("/me/js/manpowers/validate_base.js", function(){});

        $('#rootwizard').bootstrapWizard({

            'tabClass': 'bwizard-steps',

            onTabClick: function(tab, navigation, index) {
                return false;
            },

            onNext: function(tab, navigation, index) {

                var currentTab = index + 1;

                switch (currentTab)
                {
                    case 1:
                        //$.getScript("/me/js/manpowers/personal_data_rules.js", function(){});
                        //var $valid = $("#step1").valid();

                        break;

                    case 2:
                        $('#paso1').replaceWith('<i id="paso1" class="fa fa-check"></i>');
                        break;

                    case 3:

                        $.getScript("/me/js/manpowers/disabilities.js", function(){});
                        $('#paso2').replaceWith('<i id="paso2" class="fa fa-check"></i>');
                        break;

                    case 4:
                        $('#paso3').replaceWith('<i id="paso3" class="fa fa-check"></i>');
                        break;
                }

                /*if(!$valid) {
                    $validator.focusInvalid();
                    return false;
                }*/
            },

            onPrevious: function(tab, navigation, index) {

                var currentTab = index + 1;

                switch (currentTab)
                {
                    case 1:
                        $('#paso1').replaceWith('<i id="paso1" class="fa fa-clock-o"></i>');
                        //$.getScript("/me/js/manpowers/personal_data_rules.js", function(){});
                        //var $valid = $("#step1").valid();

                        break;

                    case 2:
                        $('#paso2').replaceWith('<i id="paso2" class="fa fa-clock-o"></i>');
                        break;

                    case 3:
                        $('#paso3').replaceWith('<i id="paso3" class="fa fa-clock-o"></i>');
                        break;

                    case 4:
                        alert('paso 4');

                        break;
                }

                /*if(!$valid) {
                 $validator.focusInvalid();
                 return false;
                 }*/
            },
        });
    });
