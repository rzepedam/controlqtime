
    $(document).ready(function(){
        $('#rootwizard').bootstrapWizard({

            'tabClass': 'nav nav-tabs',

            onTabClick: function(tab, navigation, index) {
                return false;
            },

            onNext: function(tab, navigation, index) {
                switch (index)
                {
                    case 1:
                        $.ajax({
                            type: "POST",
                            url: "/human-resources/manpowers/step1",
                            data: $("#step1").serialize(),
                            success: function(data)
                            {
                                console.log('test');
                                //At this point you will need to call the show method with index of tab you want to move to.
                                //wizard.show(2);
                            },

                            error: function(error)
                            {
                                var errors = data.responseJSON;
                                console.log(errors);
                            },

                            complete: function(data)
                            {

                            }
                        });

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
            }
        });
    });
