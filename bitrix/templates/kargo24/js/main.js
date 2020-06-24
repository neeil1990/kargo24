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

  const adsEditOptions = {

    init: function(id){

      this.option(id);
      this.location(id);
    },
    option: function (id) {

      $('.form-group.type[data-type-id="'+ id +'"]').show( "slow" );

      let type = $('.form-group.type[data-type-id="'+ id +'"] select').change().val();
      if(type){

        $('.form-group.options').hide();
        $('.form-group.options[data-type="'+ id +'_'+ type +'"]').show( "slow" );
      }
    },
    location: function (id) {

      let form = $('.order-form');
      let temp = form.attr('temp') + '/ajax.php';
      let select = $('select.js-select-location', form);

      $.get( temp, {SELECT_IBLOCK : id}, function( data ) {

        $('option', select).remove();
        $.each(data.LOCATIONS, function(key, value) {

          select.append($("<option></option>")
              .attr("value", value.ID)
              .text(value.NAME));
        });

        let selected = $('option[value="'+ select.attr('selected-id') +'"]', select);
        if(selected.length)
          selected.prop('selected', true);
        else
          $('option:first', select).prop('selected', true);

        adsEditOptions.city(data.IBLOCK_ID, select.find(':selected').val());

        $('.js-select-location').selectric('refresh');
      }, "json");
    },
    city: function (id, sectionID) {

      let resolution = $( window ).width();
      let column = (resolution > 1440) ? 3 : 1;

      console.log(id, sectionID, resolution);

      let form = $('.order-form');
      let temp = form.attr('temp') + '/ajax.php';

      $.get( temp, {
            SELECT_IBLOCK : id,
            SECTION_ID : sectionID,
            COLUMN : column,
            SECTION_SELECTED: $('#getSelectedCities').val()
          }, function( data ) {

        $('.show-ads-cities', form).html(data.HTML);
      }, "json");
    }
  };

  let jsSelectAds = $('.js-select-ads');
  if(jsSelectAds.length)
    adsEditOptions.init(jsSelectAds.val());

  $('.js-select-ads').selectric({
    maxHeight: 200,
    disableOnMobile: false,
    nativeOnMobile: false,
    onChange: function(element) {
      $('.form-group.type').hide();
      var blockID = $(element).change().val();
      adsEditOptions.init(blockID);
    },
  });

  $('.js-select-location').selectric({
    maxHeight: 200,
    disableOnMobile: false,
    nativeOnMobile: false,
    onChange: function(element) {
      let sectionId = $(element).val();
      let id = $('select.js-select-ads').val();

      adsEditOptions.city(id, sectionId);
    },
  });

  let orderFormEdit = $( '.order-form' );
  let progressBar = $('#progress');
  let progress = 20;
  progressBar.find('.progress-bar').css('width', `${progress}%`);
  progressBar.find('.progress-bar').text(`Загрузка ${progress}%`);
  orderFormEdit.ready(function() {
    let timerId = setInterval(() => {

      progress = Math.floor(Math.random() * (100 - progress + 1) + progress);

      progressBar.find('.progress-bar').css('width', `${progress}%`);
      progressBar.find('.progress-bar').text(`Загрузка ${progress}%`);
      if(progress > 99){
        progressBar.remove();
        orderFormEdit.show();
        clearInterval(timerId);
      }
    }, 400);
  });

  $('.js-select-banner').selectric({
    maxHeight: 200,
    disableOnMobile: false,
    nativeOnMobile: false,
    onChange: function(element) {
      var iBlockId = $(element).val();
      var temp = $('.add-banner-form').attr('temp') + '/ajax.php';
      $.get( temp, {SELECT_IBLOCK : iBlockId}, function( data ) {

        $( '.replace-form' ).replaceWith( $(data).find('.replace-form') );
        $('.js-select').selectric('refresh');
      }, "html");
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


  $('.show-ads-cities').on("change",".category-unified-list input[name^='city']",function(){
    if($("input[name^='city']:checked").length >= 15){
      $("input[name^='city']:not(:checked)").attr('disabled', "disabled");
    }else{
      $("input[name^='city']:disabled").removeAttr('disabled');
    }
  });


  $('#add-phone-popup').on('show.bs.modal', function (e) {
    var result = true;
    $phone = $(e.relatedTarget).closest('.phone-group').find('.text-input[type="tel"]').val();
    if($phone.length > 0){
      $path = $(e.relatedTarget).closest('.personal-area-settings-form').attr('temp');
      $.ajax({
        url: $path + "/ajax.php",
        type: 'POST',
        async: false,
        dataType: 'json',
        data: {step : "send",phone : $phone},
        success: function(data) {
          if(data.messages[0].status !== "accepted"){
            alert(data.messages[0].status);
            result = false;
          }
        }
      });
    }else{
      result = false;
    }
      return result;
  });

  $('form.form-add-phone').submit(function(){
    $self = $(this);
    $input = $(this).find('.text-input').val();
    if($input.length > 0){
      $path = $('form.personal-area-settings-form').attr('temp');
      $.ajax({
        url: $path + "/ajax.php",
        type: 'POST',
        dataType: 'json',
        data: {step : "check",code : $input},
        success: function(data) {
          if(data.status == "ok"){
            $('.phone-item').remove();
            $.get("", function( data ) {
              $( "#update-phone" ).append( $(data).find('.phone-item') );
            });
            $('#add-phone-popup').modal('hide');
            alertify.success('Телефон добавлен!');
          }else{
            $self.find('.text-input').css("border","2px solid red");
            alertify.error('Неправильный код!');
          }
        }
      });
    }
    return false;
  });

  $('form.bill-form').submit(function(){
    $self = $(this);
    $url = $self.attr('action');

    $.ajax({
      url: $url,
      type: 'POST',
      dataType: 'json',
      data: $self.serialize(),
      success: function(obj) {
        if(obj.data.BILL_ID){
          alertify.success("Счет создан!");
          setTimeout(function () {
            window.open("/personal/bill/?BILL_ID=" + obj.data.BILL_ID)
          }, 1000);
        }else{
          alertify.error('Ох! Что то пошло не так!');
        }
      }
    });
    return false;
  });

  $('form.form-complain').submit(function(){
    $self = $(this);
    $url = $self.attr('action');

    $.ajax({
      url: $url,
      type: 'POST',
      dataType: 'json',
      data: $self.serialize(),
      success: function(obj) {
        if(obj.STATUS){
          $('#form-complain-popup').modal('hide');
          alertify.success("Форма отправлена!");
        }else{
          alertify.error('Ошибка!');
        }
      }
    });
    return false;
  });

  $('#form-complain-popup').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var iblock = button.data('iblock');
    var element = button.data('element');

    var modal = $(this);
    modal.find('input[name="IBLOCK_ID"]').val(iblock);
    modal.find('input[name="ID"]').val(element);
  });

  $("#update-phone").on("click",".remove-btn.phone",function(){
    $phone = $(this).parent().find('.phone-number').text();
    $path = $('form.personal-area-settings-form').attr('temp');
    alertify.confirm(
        "Удаление номера телефона",
        "Вы уверены что хотите удалить " + $phone + " ?",
        function(){
          $.ajax({
            url: $path + "/ajax.php",
            type: 'POST',
            dataType: 'json',
            data: {step : "delete",phone_delete : $phone},
            success: function(obj) {
              if(obj.status){
                $('.phone-item').remove();
                $.get("", function( data ) {
                  $( "#update-phone" ).append( $(data).find('.phone-item') );
                });
                alertify.success("Номер удален!");
              }
            }
          });
        },
        function(){
          alertify.success('Удаление отменено!');
        }).set({
          transition:'zoom',
          labels:{
            ok:'Да',
            cancel:'Нет'
          }
        });
  });

  if($("select").is('.js-select.ads[name="phone"]') && $('.js-select.ads[name="phone"] option').size() < 1){
    alertify.confirm(
        "Важное сообщение!",
        "Для добавления объявления необходимо заполнить и подтвердить номер телефона! Перейти в настройки добавления номера?",
        function(){
          window.location.href = "/personal/settings/";
        },
        function(){
          window.location.href = "/personal/";
        }).set({
          transition:'zoom',
          labels:{
            ok:'Да',
            cancel:'Нет'
        }
    });
  }


  $('a.delete-ads').click(function(){
    $self = $(this);
    $id_ads = $self.attr('data-id');
    $temp_path = $self.attr('temp-path');
    $delete_path = $temp_path + "/ajax.php";

      if($id_ads && $delete_path){

        alertify.confirm(
            "Удаление объявления!",
            "Вы уверены что хотите удалить объявление № " + $id_ads,
            function(){
              $.ajax({
                url: $delete_path,
                type: 'POST',
                dataType: 'json',
                data: {id : $id_ads},
                success: function(obj) {
                  if(obj.status){
                    $self.closest('.ready-made-ads-item').hide("slow");
                    alertify.success("Объявление удалено!");
                  }else{
                    alertify.success("Ошибка удаления.");
                  }
                }
              });
            },
            function(){
              alertify.success('Удаление отменено!');
            }).set({
              transition:'zoom',
              labels:{
                ok:'Да',
                cancel:'Нет'
              }
            });
      }

    return false;
  });

  $('a.delete-banner').click(function(){
    $self = $(this);
    $id_banner = $self.attr('data-id');
    $temp_path = $self.attr('temp-path');
    $delete_path = $temp_path + "/ajax.php";

    if($id_banner && $delete_path){

      alertify.confirm(
          "Удаление баннера",
          "Вы уверены что хотите удалить баннер?",
          function(){
            $.ajax({
              url: $delete_path,
              type: 'POST',
              dataType: 'json',
              data: {id : $id_banner},
              success: function(obj) {
                if(obj.status){
                  $self.closest('.my-banners-item').hide("slow");
                  alertify.success("Баннер удален!");
                }else{
                  alertify.success("Ошибка удаления.");
                }
              }
            });
          },
          function(){
            alertify.success('Удаление отменено!');
          }).set({
        transition:'zoom',
        labels:{
          ok:'Да',
          cancel:'Нет'
        }
      });
    }

    return false;
  });

  $('span.delete-img-gallery').click(function(){
    $self = $(this);
    $ELEMENT_ID = $self.attr('data-element');
    $ID = $self.attr('data-id');
    $delete_path = "/ajax/delete_gallery.php";

    if($ID && $ELEMENT_ID){

      alertify.confirm(
          "Удаление изображения!",
          "Вы уверены что хотите удалить изображение?",
          function(){
            $.ajax({
              url: $delete_path,
              type: 'POST',
              dataType: 'json',
              data: {
                ELEMENT_ID : $ELEMENT_ID,
                ID : $ID,
              },
              success: function(obj) {
                if(obj.status){
                  $self.closest('.edit-gallery-items').hide("slow");
                  alertify.success("Изображение удалено!");
                }else{
                  alertify.success("Ошибка удаления.");
                }
              }
            });
          },
          function(){
            alertify.success('Удаление отменено!');
          }).set({
        transition:'zoom',
        labels:{
          ok:'Да',
          cancel:'Нет'
        }
      });
    }
    return false;
  });


  $('input[name="ads_save"]').click(function(){
    $(this).hide();
    $(this).parent().find('.loading').show();
    $(this).parent().css('cursor', 'wait');
  });

  $("form.order-form input").on("invalid", function(event) {
    $('input[name="ads_save"]').parent().find('.loading').hide();
    $('input[name="ads_save"]').show();
    $('input[name="ads_save"]').parent().css('cursor', 'pointer');
  });

  $("#pmOpenAmount").inputmask("9{1,5}");

  $('input[name="price"]').inputmask("9{1,5}");

  $("select[name='pay_ads']").change(function(){
    $self = $(this);
    $id_ads = $self.attr('data-id');
    $temp_path = $self.attr('temp-path');
    $path = $temp_path + "/pay.php";
    $selected = $self.find("option:selected");

    if($selected.val()){
      alertify.confirm(
          "Подтвердить оплату с баланса личного кабинета",
          "Оплатить: " + $selected.text() + "?",
          function(){
            $.ajax({
              url: $path,
              type: 'POST',
              dataType: 'json',
              data: {id : $selected.val(), elem_id : $id_ads},
              success: function(obj) {
                if(obj.ERROR){
                  alertify.error(obj.ERROR);
                }else{
                  $self.closest('.ready-made-ads-item').find('.ads-btn').remove();
                  $self.closest('.ready-made-ads-item').find('.cell:nth-child(2) span').remove();
                  $self.closest('.ready-made-ads-item').find('.cell:nth-child(2)').append('<span class="published"><span class="icon-check"><span class="path1"></span><span class="path2"></span></span>На модерации</span>');
                  $self.closest('.ready-made-ads-item').find('.delete-pay').remove();
                  $self.closest('.col-md-3').addClass('col-md-6').removeClass('col-md-3').html('<a class="add-announcement-btn">' + $selected.text() + '</a>');
                  alertify.success(obj.RESPONSE);
                }
              }
            });
          },
          function(){
            alertify.success("Оплата отменена");
          }).set({
            transition:'zoom',
            labels:{
              ok:'Да',
              cancel:'Нет'
            }
          });
    }

  });

  $("select[name='pay_banner']").change(function(){
    $self = $(this);
    $id_banner = $self.attr('data-id');
    $temp_path = $self.attr('temp-path');
    $path = $temp_path + "/pay.php";
    $selected = $self.find("option:selected");

    if($selected.val()){
      alertify.confirm(
          "Подтвердить оплату с баланса личного кабинета",
          "Оплатить: " + $selected.text() + "?",
          function(){
            $.ajax({
              url: $path,
              type: 'POST',
              dataType: 'json',
              data: {id : $selected.val(), elem_id : $id_banner},
              success: function(obj) {
                if(obj.ERROR){
                  alertify.error(obj.ERROR);
                }else{
                  $item = $self.closest('.my-banners-item');

                  $item.find('.edit-btn').remove();
                  $item.find('.pays').remove();
                  $item.find('.delete-btn').remove();
                  $item.find('.not-published').remove();
                  $item.find('.exten-publication-btn').html('Оплачен: ' + $selected.text());
                  $item.find('.column:nth-child(1)').append('<span class="published"><span class="icon-check"><span class="path1"></span><span class="path2"></span></span>На модерации</span>');

                  alertify.success(obj.RESPONSE);
                }
              }
            });
          },
          function(){
            alertify.success("Оплата отменена");
          }).set({
        transition:'zoom',
        labels:{
          ok:'Да',
          cancel:'Нет'
        }
      });
    }

  });


  $('a.up-ads').click(function(){
    $self = $(this);
    $up_price = $self.attr('up-price');
    $id_ads = $self.closest(".ready-made-ads-item").attr('data-id');
    $data_iblock = $self.closest(".ready-made-ads-item").attr('data-iblock');
    $temp_path = $self.closest(".ready-made-ads-item").attr('temp-path');
    $up_path = $temp_path + "/up.php";

    if($id_ads && $up_path){

      alertify.confirm(
          "Поднять объявление №"+ $id_ads,
          "С вашего счета будет списано " + $up_price + " рублей. ",
          function(){
            $.ajax({
              url: $up_path,
              type: 'POST',
              dataType: 'json',
              data: {id : $id_ads, ib : $data_iblock},
              success: function(obj) {
                if(obj.status){
                  alertify.success("Объявление обновлено!");
                }else{
                  alertify.error("Пополните баланс.");
                }
              }
            });
          },
          function(){
            alertify.success('Отменено!');
          }).set({
            transition:'zoom',
            labels:{
              ok:'Да',
              cancel:'Нет'
            }
          });
    }
    return false;
  });


  $('.unified-unit-service .title').hideAndPeek(
    {
      length: 25,
      indicator: "..."
    }
  );

});
