jQuery(function ($) {
    $('.min-length').keyup(function () {
                 var max = $(this).attr('data-min-length');
                 var len = $(this).val().length;
                 if (len <= max) {
                    var char = max - len;
                     $('.charNumMin').text('you need to type ' + char + ' more characters');
                    $("button[type=submit]").attr("disabled", "disabled");
                 } else {
                  
                    $('.charNumMin').text('');
                   $("button[type=submit]").removeAttr("disabled");
                 }
               });

               $('.max-length').keyup(function () {
                 var max = $(this).attr('data-max-length');
                 var len = $(this).val().length;
                 if (len <= max) {
                    var char = max - len;
                     $('.charNumMax').text('you have ' + char + ' characters left');
                    $("button[type=submit]").attr("disabled", "disabled");
                 } else {
                    
                    $('.charNumMax').text('');
                   $("button[type=submit]").removeAttr("disabled");
                 }
               });

    $('.json-data-source').change(function() {
                     //$('.json-data-source option:selected').attr('data-name');
                     console.log('joblist');
                       var $selectVal = $('.json-data-source').val();
                       var $select = $('.json-data-source option:selected');
                       var $jsonurl = $('.json-data-source option:selected').attr('data-jsonsource');
                       var $targetInput = $('.json-data-source option:selected').attr('data-targetinput');
                       var $filterList = $('.json-data-source option:selected').attr('data-displaykey');
                       //alert($jsonurl);
                       //$('#'+$targetInput).children().remove();
                       $('#RPJobsListB').children().remove();
                       $('#RPJobsList').children().remove();
                       
                       $(".json-data-source-b").val($selectVal);
                       $.getJSON($jsonurl, function(data) {
                           jobs = data;
                           //alert($filterList);
                           $.each(jobs, function(id, jobType) {
                             //console.log($filterList);
                             if(jobType["TradeName"] == $filterList){
                               $('#RPJobsListB').append('<option value="' + jobType["TradeSubNameID"]+'">' + jobType["TradeSubName"]+'</option>');
                               $('#RPJobsList').append('<option value="' + jobType["TradeSubNameID"]+'">' + jobType["TradeSubName"]+'</option>');
                               

                             }
                           })
                       });
                       
                       
                     });

    
    function getWebolyticsParameterByName(name) {
      name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
      var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
      return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
    function createCookie(name,value,days,domain) {
          if (days) {
              var date = new Date();
              date.setTime(date.getTime() + (days * 24 * 60 * 60 *1000));
              var expires = "; expires=" + date.toGMTString();
          } else {
              var expires = "";
          }
          document.cookie = name + "=" + value + expires + "; domain="+domain+"; path=/";
      }

      function readCookie(name) {
          var nameEQ = name + "=";
          var ca = document.cookie.split(';');
          for(var i=0;i < ca.length;i++) {
              var c = ca[i];
              while (c.charAt(0)==' ') {
                  c = c.substring(1,c.length);
              }
              if (c.indexOf(nameEQ) == 0) {
                  return c.substring(nameEQ.length,c.length);
              }
          }
          return null;
      }

      function eraseCookie(name) {
          createCookie(name,"",-1,domain);
      }
    var aqid = getWebolyticsParameterByName('AQID');
  
 
    
 
     
    if(aqid != ''){
      /*//console.log(aqid);
      if($.cookie('AQID') == null || $.cookie('AQID') == "") {
        $.cookie('AQID', aqid);
      }*/
      //console.log(domain);
      var domain = (function(){
         var i=0,domain=document.domain,p=domain.split('.'),s='_gd'+(new Date()).getTime();
         while(i<(p.length-1) && document.cookie.indexOf(s+'='+s)==-1){
            domain = p.slice(-1-(++i)).join('.');
            document.cookie = s+"="+s+";domain="+domain+";";
         }
         document.cookie = s+"=;expires=Thu, 01 Jan 1970 00:00:01 GMT;domain="+domain+";";
         return domain;
      })();  
      /*var cookieName = 'AQID';
      var cookieValue = aqid;
      var myDate = new Date();
      myDate.setMonth(myDate.getMonth() + 12);
      document.cookie = cookieName +"=" + cookieValue + ";expires=" + myDate 
                  + ";domain="+domain+";path=/";*/
      var days=30;
      var name= 'AQID';
      var value= aqid;
      eraseCookie(name);
      createCookie(name,value,days,domain);
    }

});         
         
