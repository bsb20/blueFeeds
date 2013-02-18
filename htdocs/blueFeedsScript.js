//Callbacks
  
    //Dynamics, requiring refresh
    function onSelection(data,success){
        $("#selectionList").append(data)
        $("#selectionList").listview("refresh");
        $(".imgTile").load(function(){
            $(".dynamicProfile").slideDown();
        });  
    }
    
    function onSecondSelect(data,status){    
    }
    
    function onProfile(data,status){
        $("#profileInfo").prepend(data)
        $("#profileInfo").listview("refresh");
        $(".imgTile").load(function(){
            $(".dynamicProfile").slideDown();
        });
    }
    
    
    function onCommentPage(data,status){
        $("#parent").append(data).trigger("create");
        $("#parent").listview("refresh");
    }
    
    
    //if true, then...
    function onComment(data,status){
        if(data=="true"){
            $.mobile.changePage("#studentProfile2");
        }
        else{
            alert(data);
        }
    }
    
    function onTrue(data,status){
        if(data=="true"){
            $.mobile.changePage(this.invokedata);
        }
        else{
            alert(data);
        }
    }
    
    function onCreate(data,status){
        if(data=="true"){
            $.mobile.changePage("#login");
        }
        else{
            alert(data);
        }
    }
    
    function onStudentCreate(data,status){
        if(data=="true"){
            $.mobile.changePage("#studentSelection");
        }
        else{
            alert(data);
        }
    }
    
    
    //error, don't touch this!
    function onError(data,status){
        alert("error!!!"+data);
    }
    
    
    $(document).bind('pageinit');

        $(document).ready(function(){
            $("[data-validate]").click(function(){
                    var formData=$(this).parents("form").serialize();
                    $.ajax({type:"POST", url: $(this).attr('data-validate')+".php", data: formData, success: onTrue, invokedata:$(this).attr('data-destination'), error:onError});
                    return false;
                });
        });

   /*     $(document).ready(function(){
            $("#submitNew").click(function(){
                    var formData=$("#newAcctForm").serialize();
                    $.ajax({type:"POST", url: "usrCreate.php", data: formData, success: onTrue, invokedata: "#login", error:onError});
                    return false;
                });
        });
        
        $(document).ready(function(){
            $("#studentCreateSubmit").click(function(){
                    var formData=$("#studentCreate").serialize();
                    $.ajax({type:"POST", url: "studentCreate.php", data: formData, success: onTrue, invokedata: "#studentSelection", error:onError});
                    return false;
                });
        });
        
        $(document).ready(function(){
            $("#commentSubmit").click(function(){
               var formData=$("#commentForm").serialize();
               $.ajax({type:"POST", url: "commentSubmit.php", data: formData, success: onTrue, invokedata: "#studentProfile2", error:onError});
            });
        });
        
        
        $(document).ready(function(){
            $("#commentEdit").click(function(){
               var formData=$("#commentEditForm").serialize();
               $.ajax({type:"POST", url: "commentEdit.php", data: formData, success: onTrue, invokedata:"#studentProfile2", error:onError});
            });
        });
        
        $(document).ready(function(){
            $("#commentDelete").click(function(){
               var formData=$("#commentEditForm").serialize();
               $.ajax({type:"POST", url: "commentDelete.php", data: formData, success: onTrue, invokedata:"#studentProfile2", error:onError});
            });
        });
        */
        
        $(document).ready(
	function(){
	    $("#parent").on("click", "li", function(e){
                if($.trim($(e.target).parents('a').text())=='Edit'){
                    $("#commentBox").val($(this).children(".note").text());
                    $("#CUID").val($(this).children(".hiddenForm").val());
                }
                
                if($.trim($(e.target).parents('a').text())=='View'){
                    $("#commentHeader").text($(this).children('h1').text());
                    $("#commentText").text($(this).children('.note').text());
                }
                
		});	    
	    });

            
        $(document).ready(
	function(){
	    $("#selectionList").on("click", "li", function(e){
                var found=$(this).find("#no").val();
                $.ajax({type: "POST", url: "setStudent.php", data: {'key':found}, success: onSecondSelect, error: onError})
		});	    
	    });
        
    
//Page change insert/remove functions    
        $(document).ready(function(){
        $(document).on('pagechange', function (e,data) {
            if(data.toPage.attr("id")=="studentProfile2"){
                $.ajax({url: "profile.php", success: onProfile, error:onError});}
            
            else{
                $(".dynamicProfile").remove();
            }
            });
        });
        
        $(document).ready(function(){
        $(document).on('pagechange', function (e,data) {
            if(data.toPage.attr("id")=="commentspage"){
                $.ajax({url: "commentRetrieve.php", success: onCommentPage, error:onError});}
            
            else{
                $(".dynamicComment").remove();
            }
            });
        });
        
        $(document).ready(function(){
        $(document).on('pagechange', function (e,data) {
            if(data.toPage.attr("id")=="studentSelection"){
               $.ajax({url: "selection.php", success: onSelection, error: onError});
            }
            else{
                $(".dynamicSelection").remove();
            }
            });
        });
        
        
        
        
        
        
        
        
        
        
    $(document).ready(function(){
            $(':jqmData(url^=commentspage)').live('pagebeforecreate', 
                function(event) {
                 $(this).filter(':jqmData(url*=ui-page)').find(':jqmData(role=header)')
                .prepend('<a href="#" data-rel="back" data-icon="back">Back</a>')
            });
            
        });