//Callbacks
//Dynamic, requiring refresh
var coursePage=0;
var courses;
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
    function onCourses(data,status){
	courses=jQuery.parseJSON(data);
	var id ="."+this.invokedata;
	var selected=jQuery.parseJSON(courses[coursePage]);
	$(id).html(selected.body);
	$(".title").text(selected.head);
	$(".courseKey").val(selected.key)
    }
    
//onTrue corresponds to data-validate attributes
    function onTrue(data,status){
        if(data=="true"){
	    if(this.invokedata.role=="dialog"){
		$.mobile.changePage(this.invokedata.destination, {transition: "pop", role:"dialog"});
		return;
	    }
	    else{
            $.mobile.changePage(this.invokedata.destination);
		return;
	    }
        }
	if(data=="student"){
	    $.mobile.changePage("#courses");
	    $(".selector").each(function(){
		$(this).attr('href','#studentCourse');
		});
	    $(".manager").each(function(){
		$(this).attr('href','#studentManager');
		});
	    return;
	}
	if(data=="instructor"){
	    $.mobile.changePage("#studentSelection");
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
		    $(".container").swipeleft(function(){
			if(coursePage<courses.length-1){
			coursePage++;
			
			var selected=jQuery.parseJSON(courses[coursePage]);
			if($.mobile.activePage.attr('id')=="courses"){
			    $("#courses2").find(".title").text(selected.head);
			    $("#courses2").children(".container").html(selected.body);
			    $("#courses2").find(".courseKey").val(selected.key);
			    $.mobile.changePage("#courses2", {transition: "slide"});
			}
			else{
			    $("#courses").find(".title").text(selected.head);
			    $("#courses").children(".container").html(selected.body);
			    $("#courses").find(".courseKey").val(selected.key);
			    $.mobile.changePage("#courses", {transition: "slide"});
			}
			}
			});
		})
	    $(document).ready(
		function(){
		    $("#class").on("swipedown")
		}
	    )
	    $(document).ready(
		function(){
		    $(".container").swiperight(function(){
			if(coursePage>0){
			coursePage--;
			
			var selected=jQuery.parseJSON(courses[coursePage]);
			if($.mobile.activePage.attr('id')=="courses"){
			    $("#courses2").find(".title").text(selected.head);
			    $("#courses2").children(".container").html(selected.body);
			    $("#courses2").find(".courseKey").val(selected.key);
			    $.mobile.changePage("#courses2", {transition: "slide", reverse:true});
			}
			else{
			    $("#courses").find(".title").text(selected.head);
			    $("#courses").children(".container").html(selected.body);
			    $("#courses").find(".courseKey").val(selected.key);
			    $.mobile.changePage("#courses", {transition: "slide", reverse:true});
			}
			}
			});
		}
		)

        $(document).ready(
	function(){
	    $(".parent").on("click", "li", function(e){
                if($.trim($(e.target).parents('a').text())=='Edit'){
                    $("#commentBox").val($(this).children(".note").text());
                    $("#CUID").val($(this).children("#hiddenForm").val());
		    $("#students2").val($(this).children("#hiddenForm2").val());
		    $("#instructors2").val($(this).children("#hiddenForm3").val());
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
	
	$(document).ready(
	function(){
	    $(".setCourse").click(function(e){
                var found=$(this).find(".courseKey").val();
                $.ajax({type: "POST", url: "setCourse.php", data: {'key':found}, error: onError})
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
	    if(data.toPage.attr("id")=="courses" && courses==null){
		$.ajax({url: "courseSelect.php", success: onCourses, invokedata: "container", error:onError});
	    }
	    $("[data-dynamicQuery]").each(function(index){
		if(data.toPage.attr("id")==$(this).parents("[data-role='page']").attr("id")){
		    $.ajax({url: $(this).attr("data-dynamicQuery")+".php", success: onPageLoad, invokedata: $(this).attr("id"), error:onError});
		}
		else{
		    $("[data-dynamicContent="+$(this).attr("data-dynamicQuery")+"]").remove();
		}
		});
	    });
        });
