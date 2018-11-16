function is_mobile() {
  return (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))
}
$(function() {
  /******TABS*********/
  $(".tab-container .tab-item").not(":first").hide();
  $(".tab-container .tab").click(function() {
    if ($(this).hasClass('active')) {
      return false
    } else {
      $(".tab-container .tab").removeClass('active');
      $(this).addClass('active')
      $(".tab-container .tab-item").hide().eq($(this).index()).fadeIn();
    }
  }).eq(0).addClass('active');

  /*******head-nav-menu***********/
  $(".head-toggle-menu").on("click", function() {
    $('.head-nav').fadeIn()
    $('html').addClass('scr-mobile');
  });
  $('.js-close-menu').on("click", function() {
    $('.head-nav').fadeOut()
    $('html').removeClass('scr-mobile');
  });
  if ($(window).width() < 767) {
    $(".head-nav").on("click", function(e) {
      if ($(e.target).closest(".head-nav-menu").length == 0) {
        $(this).fadeOut(400);
        $('html').removeClass('scr-mobile');
      }
    });
  }

  /*********show-hide region*********/
  $('.js-show-hide-btn').on("click", function(e) {
    $(this).parents('.category-section-search-region').find('.category-section-search-content').slideToggle();
    $(this).toggleClass('caret-down');
  })

  /*******language-select******/
  $('.current-sort .line').click(function() {
    $('.current-sort').removeClass('open')
    $(this).parents('.current-sort').toggleClass('open');
  });
  $('.current-sort .current-list li').on("click", function() {
    var Curl = $(this).html();
    if ($(this).hasClass('text')) {
      return false;
    } else {
      if ($(this).parents('.current-sort').hasClass('mod')) {
        $(this).parent('.current-list').siblings('.line').empty()
        $(this).parent('.current-list').siblings('.line').append(Curl);
      } else {
        $(this).parent('.current-list').siblings('.line').text(Curl);
      }
      $(this).parents('.sort').find('.current-sort').removeClass('open');
    }
  });
  $(document).click(function(event) {
    if ($(event.target).closest(".sort").length) return;
    $('.current-sort').removeClass('open')
    event.stopPropagation();
  });

  /*********tablet-menu***********/
  if ($(window).width() < 992) {
    $('.head-catalog-menu .catalog-menu-text').on("click", function() {
      $(this).find('.fa').toggleClass('fa-angle-down').toggleClass('fa-angle-up');
      $('.drop-down-menu').toggleClass('drop-down-menu-visible');
    });
    $('.head-personal-account').on("click", function() {
      $(this).find('.log-register').toggleClass('log-register-visible')
    });
  }

  /**********mobile-menu***********/
  if ($(window).width() < 480) {
    $('.drop-down-menu-list li.title-list-menu').on("click", function() {
      $(this).toggleClass('up-caret');
      if ($(this).parents('.drop-down-menu-list').hasClass('mod')) {
        $(this).siblings('li').toggleClass('visible-block');
        $(this).parents('.drop-down-menu-list').toggleClass('drop-down-menu-list-open');
        $(this).parents('.drop-down-menu-column').next('.drop-down-menu-column').children('.drop-down-menu-list:first').find('li').toggleClass('visible-block');
      } else {
        $(this).siblings('li').toggleClass('visible-block');
      }
    });
  }

  /*******slider***********/
  $(".standard-unified-flights-slider").slick({
    initialSlide: 0,
    slidesToShow: 1,
    dots: true,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 5000,
    adaptiveHeight: true,
    slidesToScroll: 1
  });
  $('.js-big-slider-img').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: false,
    infinite: false,
    fade: true,
    asNavFor: '.js-miniature-pictures'
  });
  $('.js-miniature-pictures').slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    arrows: true,
    infinite: false,
    asNavFor: '.js-big-slider-img',
    focusOnSelect: true,
    responsive: [{
      breakpoint: 1440,
      settings: {
        slidesToShow: 5,
      }
    }, {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
      }
    }, {
      breakpoint: 480,
      settings: {
        slidesToShow: 3,
      }
    }, ]
  });

  /**********select************/
  $('.js-select').selectric({
    maxHeight: 200,
    disableOnMobile: false,
    nativeOnMobile: false,
  });
  $('.selectricItems li').on("click", function() {
    $(this).parents('.selectricWrapper').find('.label').addClass('active');
    $(this).parents('.selectricWrapper').find('.button').addClass('active');
  });




  $(".js-select.location li").on( "click", function() {
    $path = $(this).closest("form").attr("temp");
    $.get($path + "/ajax.php", { region: $(this).text(), selectCity: $(this).closest("form").find("#getCity").val()}).done(function(data) {
          $('.show-ads-cities').html(data);
    });
  });
  $(".js-select.location li.selected").trigger("click");

  $('.add-another-photo-btn').on('click', function() {
    $('.hidden-input-file').slideDown(100)
  });

  /**********scroll***********/
  var heightTopHead = $('.ui-head').outerHeight();
  jQuery(window).scroll(function() {
    if ($(window).scrollTop() > heightTopHead) {
      $('.head-panel').addClass('fixed-menu');
      $('.global-wrapper').addClass("global-pad");
      setTimeout(function() {
        $('.head-panel').addClass("ui-head-transform");
      }, 100);
    } else {
      $('.head-panel').removeClass('fixed-menu');
      $('.global-wrapper').removeClass("global-pad");
      setTimeout(function() {
        $('.head-panel').removeClass("ui-head-transform");
      }, 100);
    }
  });
  $('.scroll-to-top').on('click', function() {
    $('html, body').animate({
      scrollTop: 0
    }, 500);
    return false;
  });
  
  /*************FIELD VALIDATION*************/
  $('input[type=tel]').inputmask("+7 (999) 999 99 99", {
    "clearIncomplete": true
  });


  $('.category-section-search-region .text-input').jSearch({
    selector  : '.category-section-search-content ul.category-unified-list',
    child : 'li > a',
    minValLength: 0,
    Found : function(elem){
      $(elem).parent().show();
    },
    NotFound : function(elem){
      $(elem).parent().hide();
    }
  });


  $('.form-group.type[data-type-id="'+ $('.js-select-ads').change().val() +'"]').show();
  console.log($('.js-select-ads').change().val(),$('.js-select-type').change().val());
  $('.form-group.options[data-type="'+ $('.js-select-ads').change().val() +'_'+ $('.js-select-type').change().val() +'"]').show( "slow" );
  $('.js-select-ads').selectric({
    maxHeight: 200,
    disableOnMobile: false,
    nativeOnMobile: false,
    onChange: function(element) {
      $('.form-group.type').hide();
      var id_iblock = $(element).change().val();
      if(id_iblock > 0){
        $('.form-group.type[data-type-id="'+id_iblock+'"]').show( "slow" );

        var selectType = $('.form-group.type[data-type-id="'+id_iblock+'"] select').change().val();
        if(selectType){
          $('.form-group.options').hide();
          $('.form-group.options[data-type="'+ id_iblock +'_'+ selectType +'"]').show( "slow" );
        }
      }
    },
  });

  $('.js-select-type').selectric({
    maxHeight: 200,
    disableOnMobile: false,
    nativeOnMobile: false,
    onChange: function(element) {
      $('.form-group.options').hide();
      var type = $(element).change().val();
      var id = $(element).closest(".form-group.type").attr("data-type-id");
      if(type.length > 0){
        $('.form-group.options[data-type="'+ id +'_'+ type +'"]').show( "slow" );
      }
    },
  });


});
