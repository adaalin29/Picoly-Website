 $(document).ready(function() {
	AOS.init();
	//index
	$('.options-element-title-container').click(function(){
		$('.options-element-title-container').parent().removeClass('options-element-active');
		$('.options-element-title-container').find('.options-element-title').removeClass('options-element-title-active');
		$('.options-element-title-container').find('.options-element-title-arrow').find('.options-svg').find('#arrow-right').attr('fill','#000000');
		$('.options-element-title-container').find('.options-element-title-arrow').removeClass('rotate-arrow');
		$('.options-element-title-container').parent().find('.options-element-description-container').removeClass('active-description');

		if($(this).parent().hasClass('options-element-active')){
			$(this).parent().removeClass('options-element-active');
			$(this).find('.options-element-title').removeClass('options-element-title-active');
			$(this).find('.options-element-title-arrow').find('.options-svg').find('#arrow-right').attr('fill','#000000');
			$(this).find('.options-element-title-arrow').removeClass('rotate-arrow');
			$(this).parent().find('.options-element-description-container').removeClass('active-description');
		}else{
			$(this).parent().addClass('options-element-active');
			$(this).find('.options-element-title').addClass('options-element-title-active');
			$(this).find('.options-element-title-arrow').find('.options-svg').find('#arrow-right').attr('fill','#E52040');
			$(this).find('.options-element-title-arrow').addClass('rotate-arrow');
			$(this).parent().find('.options-element-description-container').addClass('active-description');
		}

		if($(this).hasClass('apel')){
			$(this).parent().parent().parent().parent().removeClass('background1');
			$(this).parent().parent().parent().parent().addClass('background2');
		}
		if($(this).hasClass('oferte')){
			$(this).parent().parent().parent().parent().removeClass('background2');
			$(this).parent().parent().parent().parent().addClass('background1');
		}
		if($(this).hasClass('feedback')){
			$(this).parent().parent().parent().parent().removeClass('background1');
			$(this).parent().parent().parent().parent().addClass('background2');
		}
	});
   
   
   	$('.faq-options-element-title').click(function(){
		$('.faq-options-element-title').parent().removeClass('options-element-active');
		$('.faq-options-element-title').find('.options-element-title').removeClass('options-element-title-active');
		$('.faq-options-element-title').find('.options-element-title-arrow').find('.options-svg').find('#arrow-right').attr('fill','#000000');
		$('.faq-options-element-title').find('.options-element-title-arrow').removeClass('rotate-arrow');
		$('.faq-options-element-title').parent().find('.options-element-description-container').removeClass('active-description');

		if($(this).parent().hasClass('options-element-active')){
			$(this).parent().removeClass('options-element-active');
			$(this).find('.options-element-title').removeClass('options-element-title-active');
			$(this).find('.options-element-title-arrow').find('.options-svg').find('#arrow-right').attr('fill','#000000');
			$(this).find('.options-element-title-arrow').removeClass('rotate-arrow');
			$(this).parent().find('.options-element-description-container').removeClass('active-description');
		}else{
			$(this).parent().addClass('options-element-active');
			$(this).find('.options-element-title').addClass('options-element-title-active');
			$(this).find('.options-element-title-arrow').find('.options-svg').find('#arrow-right').attr('fill','#E52040');
			$(this).find('.options-element-title-arrow').addClass('rotate-arrow');
			$(this).parent().find('.options-element-description-container').addClass('active-description');
		}

		if($(this).hasClass('apel')){
			$(this).parent().parent().parent().parent().removeClass('background1');
			$(this).parent().parent().parent().parent().addClass('background2');
		}
		if($(this).hasClass('oferte')){
			$(this).parent().parent().parent().parent().removeClass('background2');
			$(this).parent().parent().parent().parent().addClass('background1');
		}
		if($(this).hasClass('feedback')){
			$(this).parent().parent().parent().parent().removeClass('background1');
			$(this).parent().parent().parent().parent().addClass('background2');
		}
	});

	$('.sidenav').click(function (){
		if($('.sidenav-mobile').hasClass('sidenav-mobile-active')){
			$('.sidenav-mobile').removeClass('sidenav-mobile-active');
		}else{
			$('.sidenav-mobile').addClass('sidenav-mobile-active');
		}
	})
	$('.close-sidenav').click(function (){
		if($('.sidenav-mobile').hasClass('sidenav-mobile-active')){
			$('.sidenav-mobile').removeClass('sidenav-mobile-active');
		}
	});
   
   $('.language-arrow').click(function(){
     if($(this).hasClass('arrow-active')){
			  $(this).removeClass('arrow-active');
        $('.language-container-active').removeClass('language-container-active-active');
        
		}else{
       $(this).addClass('arrow-active');
      $('.language-container-active').addClass('language-container-active-active');
    }
   })
	
})