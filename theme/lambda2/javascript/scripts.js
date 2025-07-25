(function($) {
	$(document).ready(function() {

    var lambda2_admin_sections = ['#theme_lambda2_general', '#theme_lambda2_header', '#theme_lambda2_socials', '#theme_lambda2_frontpage'];
    if ($('body').hasClass('pagelayout-admin')) {
        $.each(lambda2_admin_sections, function(key, value) {
            h3 = $(value).find('h3.main');
            h3.each(function(key) {
                $this = $(this);
                $(this).addClass('lambda-toggle');
                $(this).nextUntil('h3.main').wrapAll('<div class="admin-panel-content">');
            })
            $(value).find('h3.main').click(function(){
                $(this).toggleClass("open");
                $(this).next().slideToggle();
                $("#page-admin-setting-themesettinglambda2 h3.main.open").not($(this)).toggleClass("open");
                $("#page-admin-setting-themesettinglambda2 div.admin-panel-content").not($(this).next()).slideUp();
            });
        });
    }

    var bgImgContainers = document.querySelectorAll('.lambdacep.cardsfx .bgimg');
    bgImgContainers.forEach(function(container) {
        var imgElement = container.querySelector('img.img-fluid');
        if (imgElement) {
            var imgUrl = imgElement.src;
            container.style.backgroundImage = 'url("' + imgUrl + '")';
        }
    });

    if ($('body').hasClass('hide-unpw')) {
        var toggleButton = $("h2.lambda-toggle");
        $(".login-form").css("display", "none");

        toggleButton.click(function() {
            $(this).toggleClass("open");
            $(".login-form").slideToggle();
        });
    }

    if ($('body').hasClass('pagelayout-course')) {
        if ($('ul').hasClass('topics')) {
            if ($('#section-1').hasClass('section-summary')) {
                $('ul.topics').addClass('one-section');
            }
        }
    }

    if ($('body').hasClass('header-style-0') || $('body').hasClass('header-style-1')) {
        $(document).on('click', '.drawer-toggler button[data-toggler="drawers"]', function(event) {
            $('.lambda-nav .navbar .menu').addClass('overflow-hidden');
            setTimeout(function() {
                window.dispatchEvent(new Event('resize'));
                $('.lambda-nav .navbar .menu').removeClass('overflow-hidden');
            }, 150);
        });
    }

    if (document.body.id === "page-course-view-topics") {
        var courseBanner = document.querySelector('.coursebanner');
        if (courseBanner) {
            var coursename = document.getElementById('meta-coursename') ? document.getElementById('meta-coursename').textContent : '';
            var coursecategory = document.getElementById('meta-coursecategory') ? document.getElementById('meta-coursecategory').textContent : '';
            var courseimage = document.getElementById('meta-courseimage') ? document.getElementById('meta-courseimage').textContent : '';
            document.querySelectorAll('h3.coursename').forEach(function(element) {
                element.textContent = coursename;
            });
            document.querySelectorAll('p.coursecategory').forEach(function(element) {
                element.textContent = coursecategory;
            });
            document.querySelectorAll('img.courseimg').forEach(function(element) {
                element.src = courseimage;
            });
            document.querySelectorAll('.banner-bg').forEach(function(element) {
                element.style.backgroundImage = 'url("' + courseimage + '")';
            });
            }
    }

    $(window).scroll(function() {
        if ($(this).scrollTop() > 250) {
            $("#sticky-to-top").addClass("to-top");
        } else {
            $("#sticky-to-top").removeClass("to-top");
        }
    });

    check_activity_header();

	});
}) (jQuery);

function check_activity_header() {
    if (!document.body.classList.contains("path-mod")) {
        return;
    }
    const activityHeader = document.querySelector(".activity-header");
    if (!activityHeader) return;
    const activityInfo = activityHeader.querySelector(".activity-information");
    if (!activityInfo) return;
    const hasBadgeOrButton = activityInfo.querySelector(".badge, .btn.btn-sm");
    if (hasBadgeOrButton) {
        activityInfo.classList.add("has-content");
    }
    const description = activityHeader.querySelector(".activity-description");
    const nestedHasContent = activityHeader.querySelector(".activity-information.has-content");
    if (description || nestedHasContent) {
        activityHeader.classList.add("has-content");
    }
}
function cbinittype() {    
    var selectElement = document.querySelector('select[name="config_block_type"]');
    if (selectElement) {
        var selectedValue = selectElement.value;
        selectElement.form.setAttribute('data-form-type', selectedValue);
    
        var colorInput = document.getElementById('favcolor');
        var textInput = document.querySelector('input[id^="id_config_block_bgcolor"]');
        colorInput.value = textInput.value;
    }
}
function cbchangetype(event) {
    var selectElement = event.target;
    var selectedValue = selectElement.value;
    selectElement.form.setAttribute('data-form-type', selectedValue);
}
function cbchangecolor() {
    var colorInput = document.getElementById('favcolor');
    var textInput = document.querySelector('input[id^="id_config_block_bgcolor"]');
    textInput.value = colorInput.value;
}
