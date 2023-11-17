jQuery(document).ready( function() {
   $("#searchsubmit").click(function(e){
      e.preventDefault();
      var search_val =$ ("#s").val(); 
      $.ajax({
         type:"POST",
         url: "/wp-admin/admin-ajax.php",
         data: {
            action:'wpa56343_search', 
            search_string:search_val
         },
         success:function(data){
            jQuery('#results').append(data);
         }
      });

      
   });   

})