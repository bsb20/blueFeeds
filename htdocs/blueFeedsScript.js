//Callbacks
//Dynamic, requiring refresh
    function onPageLoad(data,status){
	var id="#"+this.invokedata;
	if($(id).attr("data-prepend")=="true"){
	    $(id).prepend(data).trigger("create");
	}
	else{
	    $(id).append(data).trigger("create");
	}
        $(id).listview("refresh");
        $(".imgTile").load(function(){
            $(this).parents("li").slideDown();
        });
    }  
    
//onTrue corresponds to data-validate attributes
    function onTrue(data,status){
        if(data=="true"){
	    if(this.invokedata.role=="dialog"){
		$.mobile.changePage(this.invokedata.destination, {transition: "pop", role:"dialog"});
	    }
	    else{
            $.mobile.changePage(this.invokedata.destination);}
        }
        else{
            alert(data);
        }
    }

//error function, don't touch this!
    function onError(data,status){
        alert("error!!!"+data);
    }
    
    
    $(document).bind('pageinit');

        $(document).ready(function(){
            $("[data-validate]").click(function(){
                    var formData=$(this).parents("form").serialize();
                    $.ajax({type:"POST", url: $(this).attr('data-validate')+".php", data: formData, success: onTrue, invokedata:{destination:$(this).attr('data-destination'), role: $(this).attr('data-rel')}, error:onError});
                    return false;
                });
        });
        
//Functions using on()
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
                $.ajax({type: "POST", url: "setStudent.php", data: {'key':found}, error: onError})
		});	    
	    });
	
	$(document).ready(
	function(){
	    $("#tagList").on("click", "li", function(e){
                var found=$(this).find("#no").val();
                $.ajax({type: "POST", url: "setTag.php", data: {'key':found}, error: onError})
		});	    
	    });

        $(document).ready(
	function(){
	    $(".apptList").on("click", "li", function(e){
                var found=$(this).find("#no").val();
                $.ajax({type: "POST", url: "setAppt.php", data: {'key':found}, error: onError})
		});	    
	    });        

        $(document).ready(
	function(){
	    $(".apptList").on("click", "li", function(e){
                var found=$(this).find("#student").val();
                $.ajax({type: "POST", url: "setStudent.php", data: {'key':found}, error: onError})
		});	    
	    });  

	$(document).ready(function(){
	    $("#fileProxy").click(function(){
		$("#photo").click();
		})    
	});


//Page change insert/remove functions

        $(document).ready(function(){
        $(document).on('pagechange', function (e,data) {
	    $("[data-dynamicQuery]").each(function(index){
		if(data.toPage.attr("id")==$(this).parents("[data-role='page']").attr("id")){
			alert("Call - Graph");
		    $.ajax({url: $(this).attr("data-dynamicQuery")+".php", success: onPageLoad, invokedata: $(this).attr("id"), error:onError});
		}
		else{
		    $("[data-dynamicContent="+$(this).attr("data-dynamicQuery")+"]").remove();
		}
		});
	    });
        });
