 /* eslint-env node, mocha */

/*global console , $ ,document*/

/* eslint no-console: 0*/

/*global window */

/* Data - scroll */

$(function () {
  
    'use strict';
    
            
            
       /* $('.user-name').blur(function(){
            
                if( $(this).val().length === 0 ) {
                
                
                $(this).parent().find('.user-alert').show(100);
                
            }else{
                
                $(this).parent().find('.user-alert').hide(50);
                
               $(this).parent().find('.astrisk').hide(50);
                
            }
        });
    
            $('.email').blur(function(){
            
                if( $(this).val().length === 0 ) {
                
                
                $(this).parent().find('.email-alert').show(100);
                
            }else{
                
                $(this).parent().find('.email-alert').hide(50);
                
                $(this).parent().find('.astrisk').hide(50);

                
            }
        });
*/
        // Make function check values inputs when focus-out 
    
        function approve(selector,alert){
            
        $(selector).blur(function(){
            
                if( $(this).val().length === 0 ) {
                
                $(this).parent().find(alert).show(100);
                
                $('.contact-form').submit(function(e){ // disable the submit because errors founded
                                          
                e.preventDefault();                
                
                });
                                    
            }else{
                
                $(alert).hide(50);
                
                $(this).parent().find('.astrisk').hide(50);   
                
            }
                
        });  
            

        }
    
    approve('.user-name','.user-alert'); 
    
    approve('.email','.email-alert'); 

    
});