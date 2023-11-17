<?php 
/**
 * 	Template Name: Config Thank you
 *
 *	This page template has a sidebar built into it, 
 * 	and can be used as a home page, in which case the title will not show up.
 *
*/
get_header(); // This fxn gets the header.php file and renders it ?>


<div class="container new-bike-col config-bikes">
            <div class="row">
                <div class="content">
                  <div class="text-center">
                    <h1>Thanks for configuring a bike</h1>
                    <p>You've been emailed a summary of your order. A member of the team will be in touch soon. </p>
					  
					  <p  style="margin-bottom: 50px;">Feel free to contact us on <a href="te;01204544930">+44 (0)1204 544930</a> quoting your order reference to follow up your enquiry.</p>
                    <a class="btn-outline-red" href="<?php echo site_url(). '/configure-a-bike/'; ?>">Configure Another </a>
                    <div>
                </div>
            </div>
            
        </div>
<!---
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
</script>

<script type="text/javascript">
	
	$(document).ready(function(){
  // Add smooth scrolling to all links
  $(".scroll-down").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top - 70
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });

  //totalamount
 

  function getTotal(isInit) {

    var total = 18000;     
    var allitems = '<ul>';
    var selector = isInit ? ".tot_amount" : ".tot_amount:checked";
    $(selector).each(function() {
      tempname = '';
      total += parseInt($(this).val()); 
      tempname = $(this).siblings( "label" ).find( "h4" ).text();  
      allitems += '<li>'+tempname+'</li>';
    });
    allitems += '</ul>';
    console.log(allitems);
    $("#summery-items").html(allitems);
    //$("#tot_amount").val(sum.toFixed(3));

     // var Money = total.parseint toFixed(3); 
     var finalMoney =total.toLocaleString()
     //var Money =finalMoney.toFixed(3);
     var Money = finalMoney.toFixed(2);
    if (total == 0) {
       $('#total1').val('');
     
    } else {      
       $('#total1').val(Money);
       

    }

  }
  
   $(".tot_amount").click(function(event) {
    getTotal();        
  });
  getTotal(false);


  $('.panel.special_equipment .tot_amount').on('change',function(){
  var equipmet = []; 
   $(".panel.special_equipment .tot_amount:checked").each(function() {
          equipmet.push($(this).parent().find('h4').text());          
    })
    var selected;
    selected = equipmet.join(',') ;
    $('.product_list').val(selected);  
  });

   $('.panel.handlebar_options .tot_amount').on('change',function(){
   var handle = [];   
   $(".panel.handlebar_options .tot_amount:checked").each(function() {
          handle.push($(this).parent().find('h4').text());          
    })
    var handle_selected;
    handle_selected = handle.join(',') ;
    $('.handlebar_product_list').val(handle_selected); 
  });

   $('.panel.performance .tot_amount').on('change',function(){ 
   $('.panel.performance .tot_amount').not(this).prop('checked', false);    
   var performance = [];   
   $(".panel.performance .tot_amount:checked").each(function() {
          performance.push($(this).parent().find('h4').text());          
    })
    var performance_selected;
    performance_selected = performance;
    $('.performance_product_list').val(performance_selected); 
  });

   $('.panel.weather .tot_amount').on('change',function(){
   var weather = [];   
   $(".panel.weather .tot_amount:checked").each(function() {
          weather.push($(this).parent().find('h4').text());          
    })
    var weather_selected;
    weather_selected = weather.join(',') ;
    $('.weather_product_list').val(weather_selected); 
  });

   $('.panel.leather .tot_amount').on('change',function(){
   var leather = [];   
   $(".panel.leather .tot_amount:checked").each(function() {
          leather.push($(this).parent().find('h4').text());          
    })
    var leather_selected;
    leather_selected = leather.join(',') ;
    $('.leather_product_list').val(leather_selected); 
  });

   $('.panel.billet_aluminium .tot_amount').on('change',function(){
   var billet_aluminium = [];   
   $(".panel.billet_aluminium .tot_amount:checked").each(function() {
          billet_aluminium.push($(this).parent().find('h4').text());          
    })
    var billet_aluminium_selected;
    billet_aluminium_selected = billet_aluminium.join(',') ;
    $('.billet_aluminium_product_list').val(billet_aluminium_selected); 
  });

   $('.panel.security .tot_amount').on('change',function(){
   var security = [];   
   $(".panel.security .tot_amount:checked").each(function() {
          security.push($(this).parent().find('h4').text());          
    })
    var security_selected;
    security_selected = security.join(',') ;
    $('.security_product_list').val(security_selected); 
  });

   $('.panel.oil_filler_caps .tot_amount').on('change',function(){
     $('.panel.oil_filler_caps .tot_amount').not(this).prop('checked', false);     
   var oil_filler_caps = [];     
   $(".panel.oil_filler_caps .tot_amount:checked").each(function() {
          oil_filler_caps.push($(this).parent().find('h4').text());          
    })  
    var oil_filler_caps_selected;    
    oil_filler_caps_selected = oil_filler_caps;    
   $('.oil_filler_caps_product_list').val(oil_filler_caps_selected);    
  });

   $("form").submit(function(e){
      e.preventDefault(e);
      var firstname = $("input[name='first-name']").val();
      var lastname = $("input[name='last-name']").val();
      var emailadd = $("input[name='email-address']").val();
      var telephoneno = $("input[name='telephone']").val();
      if((firstname == '') || (lastname =='') || (emailadd =='') || (telephoneno == '')) {
        $("#contact-form-error").html('Please filll all required field.').show();
      } else {
        $(this).submit();
      }
   });
});

</script>--->

<?php get_footer() ?>