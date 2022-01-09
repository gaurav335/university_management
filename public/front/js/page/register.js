$(document).ready(function () {
    $.validator.addMethod('latCoord', function (value, element) {
        console.log(this.optional(element))
        return this.optional(element) ||
            value.length >= 4 && /^(?=.)-?((8[0-5]?)|([0-7]?[0-9]))?(?:\.[0-9]{1,20})?$/.test(value);
    }, 'Latitude format invalid.')

    jQuery.validator.addMethod("noSpace", function(value, element) { 
        return value.indexOf(" ") < 0 && value != ""; 
      }, "No space please and don't leave it empty");
      
    $.validator.addMethod('longCoord', function (value, element) {
        console.log(this.optional(element))
        return this.optional(element) ||
            value.length >= 4 && /^(?=.)-?((0?[8-9][0-9])|180|([0-1]?[0-7]?[0-9]))?(?:\.[0-9]{1,20})?$/.test(value);
    }, 'Longitude format invalid')
    // Add Customer From Validation and Ajax
    $("#frm_register").validate({
        errorClass: "text-danger",
        rules: {
            'acceptTC': { required: true },
            'zipcode': { required: true },
            'email': {
                required: true,
                email: true,
                remote: {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url_checkemail,
                    type: "post",
                    data: {
                        email: function () {
                            return $("#email").val();
                        }
                    }

                }
            },
            // latitude: {
            //     required: true,
            //     latCoord:true
            // },
            // longitude: {
            //     required: true,
            //     longCoord:true
            // },
            'name': { required: true, lettersonly: true, minlength: 2, maxlength: 20,noSpace:true },
            'last_name': { required: true, lettersonly: true, minlength: 2, maxlength: 20 ,noSpace:true},
            'phone': {
                required: true,
                number: true,
                remote: {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url_checkmobile,
                    type: "post",
                    data: {
                        phone: function () {
                            return $("#phone").val();
                        }
                    }

                },
                minlength: 8,
                maxlength: 10,
            },
            'password': { required: true, minlength: 8, pwcheck: true },
        },
        messages: {
            latitude: {
                required: "Latitude required",
            },
            longitude: {
                required: "Longitude required",
            },
            'zipcode': {
                required: "Zipcode required",
            },
            'name': {
                required: "First name required",
                lettersonly: "First name only allow alphabets",
                minlength: "Minimum 2 char. long first name",
                maxlength: "Maximum 20 char. long first name",
            },
            'last_name': {
                required: "Last Name required",
                lettersonly: "Last name only allow alphabets",
                minlength: "Minimum 2 char. long last name",
                maxlength: "Maximum 20 char. long last name",
            },
            'email': {
                required: "Email required",
                email: "Email must have valid format",
                remote: "Email already register"
            },
            'phone': {
                required: "Mobile number required",
                remote: "Mobile number already register",
                number: "Mobile Number must be enter valid"
            },
            'password': {
                required: "Password required",
                minlength: "Password minimum 8 character long",
                pwcheck: "Password should be least one Upper case,Lower case and digit."

            },
            'acceptTC': {
                required: "Please accept Privacy Policy and T&C"
            }
        },
        submitHandler: function (form, event) {
            event.preventDefault();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url_register,
                type: "POST",
                data: new FormData(form),
                processData: false,
                contentType: false,
                cache: false,
                dataType: "json",
                beforeSend: function () {
                    $(document).find('.loader-icon').show();
                },
                success: function (res) {
                    $(document).find('.loader-icon').hide();
                    if (res.status) {
                        window.location.href = res.url;
                    } else {
                        flashMessage('error', res.message);
                    }
                },
                compelete: function () {
                    $(document).find('.loader-icon').hide();
                },
                error: function (jqXHR, exception) {
                    $(document).find('.loader-icon').hide();
                    $.each(jqXHR.responseJSON.error, function (field_name, error) {
                        flashMessage('error', error);
                    });
                }
            });
        },
    });
    $.validator.addMethod("pwcheck", function (value) {
        return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
            && /[a-z]/.test(value) // has a lowercase letter
            && /\d/.test(value) // has a digit
    });
    $.validator.addMethod("lettersonly", function (value, element) {
        return this.optional(element) || /^[a-z\s]+$/i.test(value);
    })


    // Product Search
    $(document).on('keyup', '.location_search', function () {
        if ($(this).val().length >= 2) {
            $(".location_search").autocomplete({
                source: function (request, response) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: url_location,
                        type: 'post',
                        dataType: "json",
                        data: { keyword: $('.location_search').val() },
                        beforeSend: function () {

                        },
                        success: function (data) {
                            response(data);
                        }
                    });
                },
                select: function (event, ui) {
                    $('.location_search').val(ui.item.label);
                    $('.postcode').val(ui.item.value);
                    return false;
                },
                search: function (e, u) {
                    $(document).find('.loader-icon').show();
                },
                response: function (e, u) {
                    $(document).find('.loader-icon').hide();
                }
            });
        }
    });
    if ($("#myMaps").length != 0) {

        var map = null;
        var myMarker;
        var myLatlng;

        function initializeGMap(lat, lng) {
            myLatlng = new google.maps.LatLng(lat, lng);

            //   var myOptions = {
            //     zoom: 5,
            //     zoomControl: true,
            //     center: myLatlng,
            //     mapTypeId: google.maps.MapTypeId.ROADMAP
            // };

            // map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

            // myMarker = new google.maps.Marker({
            //     position: myLatlng
            // });
            // myMarker.setMap(map);
            var map = new google.maps.Map(
                document.getElementById('map_canvas'), { zoom: 6, center: myLatlng });

            // Create the initial InfoWindow.
            var infoWindow = new google.maps.InfoWindow(
                { content: 'Click the map to get Lat/Lng!', position: myLatlng });
            infoWindow.open(map);

            // Configure the click listener.
            map.addListener('click', function (mapsMouseEvent) {
                var str = mapsMouseEvent.latLng.toString().replace(')', '');
                str = str.replace('(', '');
                console.log(mapsMouseEvent)
                $("#latitude").val(str.split(', ')[0]);
                $("#longitude").val(str.split(', ')[1]);
                // Close the current InfoWindow.
                infoWindow.close();

                // Create a new InfoWindow.
                infoWindow = new google.maps.InfoWindow({ position: mapsMouseEvent.latLng });
                infoWindow.setContent(mapsMouseEvent.latLng.toString());
                infoWindow.open(map);
            });
        }
        $('#myMaps').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            initializeGMap(-25.363, 131.044);
            $("#location-map").css("width", "100%");
            $("#map_canvas").css("width", "100%");
        });


        $('#myMaps').on('shown.bs.modal', function () {
            google.maps.event.trigger(map, "resize");
            map.setCenter(myLatlng);
        });
    }
});
