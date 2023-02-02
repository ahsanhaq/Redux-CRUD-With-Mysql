//========================= Overriding jQuery Validator's default messages =========================//

jQuery.extend(jQuery.validator.messages, {
    //required: "This field is required",
    // remote: "Please fix this field",
    email: "Email Address - is invalid",
    // url: "Only letters and numbers are allowed",
    // date: "Please enter a valid date",
    // dateISO: "Please enter a valid date (ISO)",
    // number: "Please enter a valid number",
    // digits: "Please enter only digits",
    // creditcard: "Please enter a valid credit card number",
    // equalTo: "Please enter the same value again",
    // accept: "Please enter a value with a valid extension",
    // maxlength: jQuery.validator.format("Please enter no more than {0} characters"),
    // minlength: jQuery.validator.format("Please enter at least {0} characters"),
    // rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long"),
    // range: jQuery.validator.format("Please enter a value between {0} and {1}"),
    // max: jQuery.validator.format("Please enter a value less than or equal to {0}"),
    // min: jQuery.validator.format("Please enter a value greater than or equal to {0}")
});

//========================= Overriding Validator's default methods =========================//

$.validator.methods.url = function (value, element) {
    return /^[A-Za-z0-9]+$/.test(value)
}
$.validator.methods.email = function (value, element) {
    return this.optional(element) || /^[a-zA-Z0-9_+&*-]+(?:\.[a-zA-Z0-9_+&*-]+)*@(?:[a-zA-Z0-9]+\.)+[a-zA-Z]{2,7}$/.test(value);
}

//========================= Custom methods for validations =========================//

$.validator.addMethod("passwordcheck", function (value) {
    return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,15}$/.test(value) // Minimum eight and maximum 10 characters, at least one uppercase letter, one lowercase letter, one number and one special character
}, 'Your password must include at least:<br><span class="reduced">- One Uppercase character<br>- One Lowercase character<br>- One number<br>- One Special Character');

$.validator.addMethod("alphabetsonly", function (value) {
    return /^[A-Za-z ]+$/.test(value)
});

$.validator.addMethod("alphanumericonly", function (value) {
    return /^[A-Za-z0-9 ]+$/.test(value);
});

$.validator.addMethod("usernamecheck", function (value) {
    return /^[A-Za-z0-9]+$/.test(value) || /^[a-zA-Z0-9_+&*-]+(?:\.[a-zA-Z0-9_+&*-]+)*@(?:[a-zA-Z0-9]+\.)+[a-zA-Z]{2,7}$/.test(value);
});

$.validator.addMethod("domaincheck", function (value) {
    return /^[a-zA-Z0-9]+[\.-]?[a-zA-Z0-9]+$/.test(value);
});

$.validator.addMethod("nospacetostartorend", function (value, element) {
    return /^\S+(?: \S+)*$/.test(value);
});

$.validator.addMethod("checkusers", function (value, element) {
    return $(element).children('option').length;
});

//========================= Password Form Validation =========================//

$("#set-password").validate({
    rules: {
        createnewpassword: {
            required: true,
            minlength: 8,
            maxlength: 15,
            passwordcheck: true
        },
        confirmnewpassword: {
            required: true,
            minlength: 8,
            maxlength: 15,
            equalTo: "#createnewpassword",
            passwordcheck: true
        }
    },
    messages: {
        createnewpassword: {
            required: "Password - is required",
            minlength: "Password - is invalid. At least 8 characters are required",
            maxlength: "Password - is invalid. Maximum 15 characters are allowed",
        },
        confirmnewpassword: {
            required: "Confirm Password - is required",
            minlength: "Confirm Password - is invalid. At least 8 characters are required",
            maxlength: "Confirm Password - is invalid. Maximum 15 characters are allowed",
            equalTo: "Confirm Password - is invalid. Please enter the same password as above"
        }
    }
});

//========================= Login Form Validation =========================//

$("#login-form").validate({
    rules: {
        username: {
            required: true,
        },
        password: {
            required: true,
        }
    },
    messages: {
        username: {
            required: "Username - is required",
            usernamecheck: "Username - is invalid",
        },
        password: {
            required: "Password - is required",
        }
    },
    invalidHandler: function (event, validator) {
        // normalize bootstrap carousel items
        setTimeout(function () {
            $('#myCarousel .item').carouselHeights();
        }, 100);
    }
});

//========================= Forgot Username Form Validation =========================//

$("#forgot-username-form").validate({
    rules: {
        forgotemail: {
            required: true,
        }
    },
    messages: {
        forgotemail: {
            required: "Email Address - is required",
        }
    },
    invalidHandler: function (event, validator) {
        // normalize bootstrap carousel items
        setTimeout(function () {
            $('#myCarousel .item').carouselHeights();
        }, 100);
    }
});

//========================= Forgot Password Form Validation =========================//

$("#forgot-password-form").validate({
    rules: {
        forgotusername: {
            required: true,
            usernamecheck: true,
            maxlength: 20
        },
    },
    messages: {
        forgotusername: {
            required: "Username - is required",
            usernamecheck: "Username - is invalid",
        }
    },
    invalidHandler: function (event, validator) {
        // normalize bootstrap carousel items
        setTimeout(function () {
            $('#myCarousel .item').carouselHeights();
        }, 100);
    }
});

//========================= Organisation Form Validation =========================//

$("#organisation-formvalidation").validate({
    rules: {
        name: {
            alphabetsonly: true,
            nospacetostartorend: true,
            maxlength: 50
        }
    },
    messages: {
        name: {
            required: "Name - is required",
            alphabetsonly: "Name - is invalid. Alphabets are allowed only",
            nospacetostartorend: "Name - is invalid. Cannot start or end with a space and cannot have multiple spaces between words",
            maxlength: "Name - is invalid. Maximum 50 characters are allowed",

        },
        chooserootorganisation: {
            required: "Choose Root Organisation - is required",
        }
    }
});

//========================= User Form Validation =========================//

$("#user-formvalidation").validate({
    rules: {
        firstname: {
            alphabetsonly: true,
            nospacetostartorend: true,
            maxlength: 25,
        },
        surname: {
            alphabetsonly: true,
            nospacetostartorend: true,
            maxlength: 25
        },
        username: {
            usernamecheck: true,
            maxlength: 20
        },
    },
    messages: {
        firstname: {
            required: "First Name - is required",
            alphabetsonly: "First Name - is invalid. Alphabets are allowed only",
            nospacetostartorend: "First Name - is invalid. Cannot start or end with a space and cannot have multiple spaces between words",
            maxlength: "First Name - is invalid. Maximum 25 characters are allowed",
        },
        surname: {
            required: "Surname - is required",
            alphabetsonly: "Surname - is invalid. Alphabets are allowed only",
            nospacetostartorend: "Surname - is invalid. Cannot start or end with a space and cannot have multiple spaces between words",
            maxlength: "Surname - is invalid. Maximum 25 characters are allowed"
        },
        username: {
            required: "Username - is required",
            usernamecheck: "Username - is invalid",
            minlength: "Username - is invalid. Username should be atleast 3 characters long",
            maxlength: "Username - is invalid. Maximum 20 characters are allowed"
        },
        emailaddress: {
            required: "Email Address - is required",
            email: "Email Address - is invalid"
        },
        assignorganisation: {
            required: "Assign Organisation - is required",
        },
        status: {
            required: "Status - is required",
        },
        securityprofile: {
            required: "Security Profile - is required",
        }
    }
});

//========================= Device Form Validation =========================//

$("#device-formvalidation").validate({
    rules: {
        deviceuniqueidentifier: {
            alphanumericonly: true,
            nospacetostartorend: true,
        },
        manufacturerofdevice: {
            alphanumericonly: true,
            nospacetostartorend: true,
        },
        modelname: {
            alphanumericonly: true,
            nospacetostartorend: true,
        },
        serialnumber: {
            alphanumericonly: true,
            nospacetostartorend: true,
        },
        pciptsstandardandversionofcompliance: {
            alphanumericonly: true,
            nospacetostartorend: true,
        },
        pciptsapproval: {
            alphanumericonly: true,
            nospacetostartorend: true,
        },
        pciptspoiproducttype: {
            alphanumericonly: true,
            nospacetostartorend: true,
        },
        acquiringfinancialinstitution: {
            alphanumericonly: true,
            nospacetostartorend: true,
        },
        assettagdetails: {
            alphanumericonly: true,
            nospacetostartorend: true,
        },
        customfieldname: {
            alphanumericonly: true,
            nospacetostartorend: true,
        },
        'brandschemesaccepted[]': {
            required: true
        },
        'paymenttypeacepted[]': {
            required: true
        },
    },
    messages: {
        deviceuniqueidentifier: {
            required: "Device Unique Identifier - is required",
            alphanumericonly: "Device Unique Identifier - is invalid. Only alphanumeric characters are allowed",
            nospacetostartorend: "Device Unique Identifier - is invalid. Cannot start or end with a space and cannot have multiple spaces between words"
        },
        manufacturerofdevice: {
            required: "Manufacturer of Device - is required",
            alphanumericonly: "Manufacturer of Device - is invalid.  Only alphanumeric characters are allowed",
            nospacetostartorend: "Manufacturer of Device - is invalid. Cannot start or end with a space and cannot have multiple spaces between words",
        },
        modelname: {
            required: "Model Name - is required",
            alphanumericonly: "Model Name - is invalid. Only alphanumeric characters are allowed",
            nospacetostartorend: "Model Name - is invalid. Cannot start or end with a space and cannot have multiple spaces between words",
        },
        serialnumber: {
            required: "Serial Number - is required",
            alphanumericonly: "Serial Number - is invalid. Only alphanumeric characters are allowed",
            nospacetostartorend: "Serial Number - is invalid. Cannot start or end with a space and cannot have multiple spaces between words",
        },
        pciptsstandardandversionofcompliance: {
            required: "PCI PTS Standard and Version of Compliance - is required",
            alphanumericonly: "PCI PTS Standard and Version of Compliance - is invalid. Only alphanumeric characters are allowed",
            nospacetostartorend: "PCI PTS Standard and Version of Compliance - is invalid. Cannot start or end with a space and cannot have multiple spaces between words",
        },
        pciptsapproval: {
            required: "PCI PTS Approval - is required",
            alphanumericonly: "PCI PTS Approval - is invalid. Only alphanumeric characters are allowed",
            nospacetostartorend: "PCI PTS Approval - is invalid. Cannot start or end with a space and cannot have multiple spaces between words",
        },
        pciptspoiproducttype: {
            required: "PCI PTS POI Product Type - is required",
            alphanumericonly: "PCI PTS POI Product Type - is invalid. Only alphanumeric characters are allowed",
            nospacetostartorend: "PCI PTS POI Product Type - is invalid. Cannot start or end with a space and cannot have multiple spaces between words",
        },
        assignorganisation: {
            required: "Assign Organisation - is required"
        },
        status: {
            required: "Status - is required"
        },
        purchasedate: {
            required: "Purchase Date - is required",
            nospacetostartorend: "Purchase Date - is invalid. Cannot start or end with a space and cannot have multiple spaces between words",
        },
        warrantyterm: {
            required: "Warranty Term - is required"
        },
        acquiringfinancialinstitution: {
            required: "Acquiring Financial Institution - is required",
            alphanumericonly: "Acquiring Financial Institution - is invalid. Only alphanumeric characters are allowed",
            nospacetostartorend: "Acquiring Financial Institution - is invalid. Cannot start or end with a space and cannot have multiple spaces between words",
        },
        assignedtouser: {
            required: "Choose Device Owner - is required"
        },
        assignedtogroup: {
            required: "Choose Device Owner - is required"
        },
        assettagdetails: {
            required: "Asset Tag Details - is required",
            alphanumericonly: "Asset Tag Details - is invalid. Only alphanumeric characters are allowed",
            nospacetostartorend: "Asset Tag Details - is invalid. Cannot start or end with a space and cannot have multiple spaces between words",
        },
        firmwareversion: {
            required: "Firmware Version - is required"
        },
        firmwarelastupdated: {
            required: "Firmware Last Updated - is required",
        },
        customfieldname: {
            alphanumericonly: "Custom Field Name - is invalid. Only alphanumeric characters are allowed",
            nospacetostartorend: "Custom Field Name - is invalid. Cannot start or end with a space and cannot have multiple spaces between words",
        },
        'brandschemesaccepted[]': {
            required: "Brand Schemes Accepted - is required"
        },
        'paymenttypeacepted[]': {
            required: "Payment Type Accepted - is required"
        }
    },
    errorPlacement: function (error, element) {
        if (element.attr('type') == 'checkbox') {
            $(element).closest('.checkbox-wrap').after(error);
        }
        else if (element.hasClass('editinput')) {
            $(element).closest('.form-group').append(error);
        }
        else {
            error.insertAfter(element);
        }
    }
});

// Make sure atleast one checkbox is checked in device form
$('#device-formvalidation input[type="checkbox"]').on('click', function () {
    var x = $(this).closest('.checkbox-wrap');
    if (x.find('input[type="checkbox"]:checked').length > 0) {
        x.next('label.error').hide();
    }
    else {
        x.next('label.error').show();
    }
});

//========================= Group Form Validation =========================//

$("#group-formvalidation").validate({
    rules: {
        groupname: {
            alphanumericonly: true,
            nospacetostartorend: true,
            maxlength: 25,
        },
    },
    messages: {
        groupname: {
            required: "Group Name - is required",
            nospacetostartorend: "Group Name - is invalid. Cannot start or end with whitespace",
            alphanumericonly: "Group Name - is invalid. Only alphanumeric characters are allowed",
            maxlength: "Group Name - is invalid. Maximum 25 characters are allowed",
        },
    },
});

//========================= Delete Popup Validation =========================//
jQuery.validator.addMethod("isText", function (value, element, param) {
    return this.optional(element) || value == param;
});
$("#confrimdelete-formvalidation").validate({
    rules: {
        typedeltetoconfirm: {
            required: true,
            maxlength: 10,
            isText: "DELETE"
        },
    },
    messages: {
        typedeltetoconfirm: {
            required: "Type DELETE to confirm - is required",
            maxlength: "Type DELETE to confirm - is invalid. Maximum 6 characters are allowed",
            isText: "Type DELETE to enable YES button",
        },
    },
});
$("#confrimdelete-formvalidation input").on('keyup', function () {
    if ($("#confrimdelete-formvalidation").valid()) {
        $(this).closest('.modal').find('.btn-yes').removeAttr('disabled')
    } else {
        $(this).closest('.modal').find('.btn-yes').attr('disabled', 'disabled')
    }
});