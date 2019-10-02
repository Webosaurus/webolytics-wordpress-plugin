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

});         
         
