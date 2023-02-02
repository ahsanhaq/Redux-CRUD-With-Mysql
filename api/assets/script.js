$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
$(document).ready(function () {

    var customFieldCount = 0;
    // extending height to full viewport
    // $('.splash-wrap').height($('.splash-page main').height() - 30);


    // Tree view
    $('.tree-toggler>label').click(function (e) {
        if (e.target.tagName == "LABEL") {
            $(this).parent().children('ul.tree').slideToggle(300);
            $(this).parent('.tree-toggler').toggleClass('opened');
        }
    });

    $('.sidebarviewall').on("click", function (e) {
        e.preventDefault();
        $(".sidebar-collapse").toggleClass("sidebar-expanded");
    });


    $(".radio-main-block input[name$='value']").click(function () {
        var value = $(this).val();
        if (value == 'users') {
            window.location.assign("users.html");
        }
        else if (value == 'groups') {
            window.location.assign("groups.html");
        }
    });

    //Alert
    $('#save').click(function (e) {
        e.preventDefault()
        $('#success').show()
    });
    // Hide alert message
    $('.alert-messages .close').on('click', function () {
        $(this).closest('.alert-messages-block').hide();
    });
    // Handling delete modal
    $('#handleDeleteModal').click(function (e) {
        e.preventDefault();
        if ($('.dataTable input[type="checkbox"]').is(':checked')) {
            $('#deleteModal').modal();
        }
    });
    // Ownership dropdowns
    $('input[type=radio][name=choosedeviceowner]').on('change', function (e) {
        if (this.value == 'User') {
            $('#assignedtogroup').closest('div').hide()
            $('#assignedtouser').closest('div').show()
        }
        else if (this.value == 'Group') {
            $('#assignedtouser').closest('div').hide()
            $('#assignedtogroup').closest('div').show()
        }
    });

    //Custom Fields
    function registerCustomFieldsForValidation() {
        $('[name^="PinEntryDeviceCustomField"]').each(function () {
            $(this).rules("add", {
                required: true,
                alphanumericonly: true,
                nospacetostartorend: true,
                messages: {
                    required: $(this).closest('.form-group').find('label:first').text() + ' - is requried',
                    alphanumericonly: $(this).closest('.form-group').find('label:first').text() + ' - is invalid. Only alphanumeric characters are allowed',
                    nospacetostartorend: $(this).closest('.form-group').find('label:first').text() + ' - is invalid. Cannot start or end with space'
                }
            });
        });
    }

    $('#cflink').click(function (e) {
        e.preventDefault();
        $('.cf-name').show();
    });

    $('#cfadd').click(function (e) {
        e.preventDefault();
        if ($("#customfieldname").val() != '' && $("#customfieldname").valid()) {
            //PinEntryDeviceCustomField
            $('#cffields').append('<div class="form-group posrel"><div class="field-controls"> <label for="' + $("#customfieldname").val().replace(/\s/g, '') + '" >' + $("#customfieldname").val() + '</label><span class="label-edit" style="display:none;"><input type="text" class="editinput" name="editinput[' + customFieldCount + ']"> <i class="icon-tick done-editing"></i> </span> <span class="field-controls-icons"><i class="icon-x-circle cfremove"></i><i class="icon-edit cfedit"></i></span></div> <input type="text"   name="PinEntryDeviceCustomField[' + customFieldCount + '].Text"  class="form-control" id="' + $("#customfieldname").val().replace(/\s/g, '') + '"/>  <input type = "hidden" name="PinEntryDeviceCustomField[' + customFieldCount + '].Label" class= "form-control" value = "' + $("#customfieldname").val().replace(/\s/g, '') + '"/ > </div>');
            $('.cf-name').hide();
            $("#customfieldname").val('');
            customFieldCount++;
        }
        registerCustomFieldsForValidation();

        $('[name^="editinput"]').each(function () {
            $(this).rules("add", {
                required: true,
                alphanumericonly: true,
                nospacetostartorend: true,
                messages: {
                    required: 'Label Name - is requried',
                    alphanumericonly: 'Label Name - is invalid. Only alphanumeric characters are allowed',
                    nospacetostartorend: 'Label Name - is invalid. Cannot start or end with space'
                }
            });
        });
    });

    $(document).on('click', '.cfremove', function () {
        $(this).closest('.form-group').remove();
    });

    $(document).on('click', '.cfedit', function () {
        $(this).closest('.field-controls').addClass('editing');
        var x = $(this).closest('.field-controls').find('.label-edit');
        var y = $(this).closest('.field-controls').find('label');
        var text = y.text();
        x.find('input').val(text);
        y.hide();
        x.show();
        x.find('input').focus();

    });

    $(document).on('click', '.done-editing', function () {

        // Validation
        var isValid = $(this).closest('.label-edit').find('input').valid();

        if (isValid) {
            $(this).closest('.field-controls').removeClass('editing');
            var x = $(this).closest('.label-edit');
            var y = $(this).closest('.field-controls').find('label');
            y.show();
            x.hide();

            // Updating label name
            var newLabelName = $(this).closest('.label-edit').find('input').val();
            y.text(newLabelName);
            y.attr('for', newLabelName.replace(/\s/g, ''));
            $(this).closest('.form-group').find('[name^="PinEntryDeviceCustomField"]').attr('id', newLabelName.replace(/\s/g, ''));

            registerCustomFieldsForValidation();


        }
    });

    // Focus on first field
    $("form:first-of-type .form-group:first-of-type .form-control:first-of-type").focus();

    // Enabling calendar on icon click
    $('.icon-calendar').click(function (e) {
        $(this).prev('input').focus();
    });
    $('body').on('mousedown', '.js_btn-cancel', function () {
        window.location.href = $(this).attr('href');
    });

    // Setting equal height to bootstrap carousel items
    $('#myCarousel .item').carouselHeights();

    // To enable click on elements inside the dropdown menu
    $(document).on('click', '.dropdown-menu', function (e) {
        e.stopPropagation();
    });

    // Loadmore timeline
    $(document).on('click', '#js-timelineloadmore', function (e) {
        $('#js-lazytimelineinstance').show();
        $(this).hide();
    });

    $(".toggle-password").click(function() {

        $(this).toggleClass("icon-eye-off icon-eye");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });

    // Assign Height Scripts on Languages pages
    var divHeight = $('.s-t-v').height(); 
      $('.string-id-row').css('min-height', divHeight+'px');

    //var divHeightColLeft = $('.col-right').height() + 20; 
     // $('.col-left').css('min-height', divHeightColLeft+'px');
    // Assign Height Scripts on Languages pages

    // Edit Delete Show/Hide on Languages page
    $(".string-value-row").mouseenter(function ()
    {
        $(this).children(".value-update").show();
    });
    $(".string-value-row").mouseleave(function ()
    {
        $(this).children(".value-update").hide();
    });

//jQuery('.scrollbar-outer').scrollbar();

    $(".string-id-row").mouseenter(function ()
    {
        $(this).children(".id-update").show();
    });
    $(".string-id-row").mouseleave(function ()
    {
        $(this).children(".id-update").hide();
    });

    $(".panel-title").mouseenter(function ()
    {
        $(this).children(".section-update").show();
    });
    $(".panel-title").mouseleave(function ()
    {
        $(this).children(".section-update").hide();
    });
    // Edit Delete Show/Hide on Languages page

    function readURLDP(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
 
            reader.onload = function (e) {
                $("#dp-image").attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
	function readURLBanner(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

 

            reader.onload = function (e) {
                $("#banner-image").attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURLHero(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

 

            reader.onload = function (e) {
                $("#hero-image").attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
	
	 function readURLUserProfile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

 

            reader.onload = function (e) {
                $("#dps-image").attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    /*$(".uploadbtn").change(function(){
        readURL(this);
        $(".image-card").removeClass("hide-box");
        $("#dp-image").removeClass("hide-box");
        // $(".upload-cancel").removeClass("hide-box");
        $("#gallery .tab-content .images").addClass("active in");
    });;*/
     
    $("#eventupload").change(function(){
        readURLDP(this);
       $("#dpimagedisplay").removeClass("hide-box");
        $("#dp-image").removeClass("hide-box");
        $(".upload-cancel").removeClass("hide-box");
    });
    $("#dpimagedisplay .upload-cancel").on("click", function(){
        $("#bannerimagedisplay").addClass("hide-box");
        $("#dp-image").addClass("hide-box");
        $("#banner-cancel").addClass("hide-box");
		$("#dpimagedisplay").addClass("hide-box");
		
		
    });
	
	
    //Banner Image Upload
    $("#eventuploadbanner").change(function(){
        readURLBanner(this);
        $("#bannerimagedisplay").removeClass("hide-box");
        $("#banner-image").removeClass("hide-box");
        $(".upload-cancel").removeClass("hide-box");
    });
    $("#banner-cancel").on("click", function(){
        $("#bannerimagedisplay").addClass("hide-box");
        $("#banner-image").addClass("hide-box");
       $("#banner-cancel").addClass("hide-box");
    });
    //Hero Image Upload
    $("#eventuploadhero").change(function(){
        readURLHero(this);
        $("#heroimagedisplay").removeClass("hide-box");
        $("#hero-image").removeClass("hide-box");
        $(".upload-cancel").removeClass("hide-box");
    });
    $("#hero-cancel").on("click", function(){
        $("#heroimagedisplay").addClass("hide-box");
        $("#hero-image").addClass("hide-box");
        $("#hero-cancel").addClass("hide-box");
    });
	//UserProfile Image Upload
	  $("#eventuploads").change(function(){
        readURLUserProfile(this);
       $(this).parent().find(".image-upload-display").removeClass("hide-box");
        $("#dps-image").removeClass("hide-box");
        $(".upload-cancel").removeClass("hide-box");
    });
    // $(".image-upload-display .upload-cancel").on("click", function(){
        // $(".image-upload-display").addClass("hide-box");
        // $("#dps-image").addClass("hide-box");
        // $(".upload-cancel").addClass("hide-box");
    // });
   
 $(".rangeslider-block").on("click", function(){
        $(".simple-range-slider").toggle();
    });



    $(".custom-tabs").on("click", function(e){
        e.preventDefault();
    });

    // $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        // localStorage.setItem('activeTab', $(e.target).attr('href'));
    // });
    // var activeTab = localStorage.getItem('activeTab');
    // if(activeTab){
        // $('.custom-tabs a[href="' + activeTab + '"]').tab('show');
    // }
    $(".colorpickerinput").on('click', function(){
        $(".previewgrident").removeAttr("disabled");
    });

    $(".previewgrident").on('click', function(){
        $(".grident-placeholder").show();
        var startGrident = $("#startgrident").val();
        var endGrident = $("#endgrident").val();
        var setGrident = "linear-gradient(" + startGrident + "," + endGrident + ")";
        $("#gridentplaceholder").css("background",setGrident);
    });

    

	 $(function($){
    // $("#eventstartdate").mask("yyyy-mm-dd hh:mm:ss",{});
	// $("#eventenddate").mask("yyyy-mm-dd hh:mm:ss",{});
    // $("#activitiesstart").mask("hh:mm",{placeholder:"hh:mm"});
    // $("#activitiesend").mask("hh:mm",{placeholder:"hh:mm"});
    //$("#ssn").mask("999-99-9999",{placeholder:"000-00-0000"});
      });

	
});
$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
$('.dataTable').DataTable().columns.adjust().draw();
});
$(window).resize(function () {
    // extending height to full viewport
    // $('.splash-wrap').height('auto');
    // $('.splash-wrap').height($('.splash-page main').innerHeight() - 30);
});



//========================= Normalize Carousel Heights - pass in Bootstrap Carousel items.=========================//
$.fn.carouselHeights = function () {

    var items = $(this), //grab all slides
        heights = [], //create empty array to store height values
        tallest; //create variable to make note of the tallest slide

    var normalizeHeights = function () {

        items.each(function () { //add heights to array
            heights.push($(this).height());
        });
        tallest = Math.max.apply(null, heights); //cache largest value
        items.each(function () {
            $(this).css('min-height', tallest + 'px');
        });
    };

    normalizeHeights();

    $(window).on('resize orientationchange', function () {
        //reset vars
        tallest = 0;
        heights.length = 0;

        items.each(function () {
            $(this).css('min-height', '0'); //reset min-height
        });
        normalizeHeights(); //run it again 
    });
	
    // $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        // localStorage.setItem('activeTab', $(e.target).attr('href'));
    // });
    // var activeTab = localStorage.getItem('activeTab');
    // if(activeTab){
        // $('.custom-tabs a[href="' + activeTab + '"]').tab('show');
    // }
	
};