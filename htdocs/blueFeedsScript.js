/*
Authors: Benjamin Berg, Rachel Harris, Conrad Haynes, Jack Zhang
This JavaScript file contains all the javascipt encoding and callback functionality for out application.
It includes functions that fetch page information upon reloading, functions that store and update user and studet ids,
and many more.
*/

//Dynamic, requiring refresh
var coursePage=0;
var courses;
//perform data-dynamicQuery requests and append requested data
    function onPageLoad(data,status){
    	if(data.substring(0,1) === "~"){
    		$.mobile.changePage("login");
    		return;
    	}
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
    
    function studentAdded(data, status){
    	if(data.substring(0,1) === "~"){
    		$.mobile.changePage("login");
    		return;
    	}
	if(data == "true"){
	    alert("student was enrolled!");
	}
    }
    
    function instructorAdded(data, status){
    	if(data.substring(0,1) === "~"){
    		$.mobile.changePage("login");
    		return;
    	}
	if(data == "true"){
	    alert("instructor added to course!");
	}
    }
//retrieve course information (must be done slightly differently than general case).  Retrieves a JSON object containing
//course information, and populates a formatted list item with the info
    function onCourses(data,status){
    	if(data.substring(0,1) === "~"){
    		$.mobile.changePage("login");
    		return;
    	}
	courses=jQuery.parseJSON(data);
	var id ="."+this.invokedata;
	var selected=jQuery.parseJSON(courses[coursePage]);
	$(id).html(selected.body);
	$(".title").text(selected.head);
	$(".courseKey").val(selected.key)
    }
    
//onTrue corresponds to data-validate attributes, waits for "true" response in general case, waits for "instructor" or
//"student" response in login cases
    function onTrue(data,status){
    	if(data=="~student" || data =="student"){
	    $.mobile.changePage("#courses");
	    $(".selector").each(function(){
		$(this).attr('href','#studentCourse');
		});
	    return;
	}
	if(data=="~instructor" || data=="instructor"){
	    $.mobile.changePage("#rssFeed");
	    return;
	}
    	if(data.substring(0,1) === "~"){
    		$.mobile.changePage("login");
    		return;
    	}
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
        else{
            alert(data);
        }
    }

//error function
    function onError(data,status){
    	if(data.substring(0,1) === "~"){
    		$.mobile.changePage("login");
    		return;
    	}
        alert("error!!!"+data);
    }
    
    
    $(document).bind('pageinit');
//Looks for form submissions, and submits data via ajax to a named php file
        $(document).ready(function(){
            $("[data-validate]").click(function(){
                    var formData=$(this).parents("form").serialize();
                    $.ajax({type:"POST", url: $(this).attr('data-validate')+".php", data: formData, success: onTrue, invokedata:{destination:$(this).attr('data-destination'), role: $(this).attr('data-rel')}, error:onError});
                    $(this).parents("form").find(':input')
		    .not(':button, :submit, :reset, :hidden')
		    .val('')
		    .removeAttr('checked')
		    .removeAttr('selected');
		    return false;
                });
        });
        
//Functions using on()
//These handle screen events for elements that were injected dyanmically, and thus cannot have events handled in the normal
//way
//Looks for edit request, populates text box with existing comment text
        $(document).ready(
	function(){
	    $(".parent").on("click", "li", function(e){
                if($.trim($(e.target).parents('a').text())=='Edit'){
                    $("#commentBox").val($(this).children(".note").text());
                    $("#keybox").val($(this).children(".hiddenForm").val());
		    $("#students2").val($(this).children("#hiddenForm2").val());
		    $("#instructors2").val($(this).children("#hiddenForm3").val());
                }
                
                if($.trim($(e.target).parents('a').text())=='View'){
                    $("#commentHeader").text($(this).children('h1').text());
                    $("#commentText").text($(this).children('.note').text());
                }
                
		});	    
	    });

//Sets SUID for a partiuclar student who has been selected by an instructor            
        $(document).ready(
	function(){
	    $("#selectionList").on("click", "li", function(e){
                var found=$(this).find("#no").val();
                $.ajax({type: "POST", url: "setStudent.php", data: {'key':found}, error: onError})
		});	    
	    });

//Handles start page, changes after a few seconds to login page	
	$(document).ready(
	function(){
		setTimeout(change,2000);	
	});
	
	function change(){
		$.mobile.changePage("#login","fade");
	}
//Sets tag ID for filtering by tags	
	$(document).ready(
	function(){
	    $("#tagList").on("click", "li", function(e){
                var found=$(this).find("#no").val();
                $.ajax({type: "POST", url: "setTag.php", data: {'key':found}, error: onError})
		});	    
	    });
//Sets AUID to allow viewing of page for a particular appointment
        $(document).ready(
	function(){
	    $(".apptList").on("click", "li", function(e){
                var found=$(this).find("#no").val();
                $.ajax({type: "POST", url: "setAppt.php", data: {'key':found}, error: onError})
		});	    
	    });     
	    
	$(document).ready(
	function(){
	    $(".allApptList").on("click", "li", function(e){
                var found=$(this).find("#no").val();
                $.ajax({type: "POST", url: "setAppt.php", data: {'key':found}, error: onError})
		});	    
	    });     
//Sets SUID to allow retieval of info for a particualr appointment page
        $(document).ready(
	function(){
	    $(".allApptList").on("click", "li", function(e){
                var found=$(this).find("#student").val();
                $.ajax({type: "POST", url: "setStudent.php", data: {'key':found}, error: onError})
		});	    
	    });  
//Sets CUID to allow viewing of students for a particular course based on selection	
	$(document).ready(
	function(){
	    $("#courseList").on("click","li", function(e){
                var found=$(this).find(".courseKey").val();
                $.ajax({type: "POST", url: "setCourse.php", data: {'key':found}, error: onError})
		});	    
	    });
	
	$(document).ready(function(){
	    $("#fileProxy").click(function(){
		$("#photo").click();
		})    
	});
	$(document).ready(function(){
	    $("#foundStudents").on("click", "li", function(e){
		var found= $(this).find(".suid").val();
		$.ajax({type: "POST", url: "addStudent.php", data: {'suid':found}, error: onError, success: studentAdded})
		});
	    });
	$(document).ready(function(){
	    $("#foundInstructors").on("click", "li", function(e){
		var found= $(this).find(".uuid").val();
		$.ajax({type: "POST", url: "addInstructor.php", data: {'uuid':found}, error: onError, success: instructorAdded})
		});
	    });
	$(document).ready(function(){
	    $(".allApptList").on("swipeleft","li", function(e){
		$(this).find(".dismiss").slideDown();
		});
	    $(".allApptList").on("swiperight","li", function(e){
	    	$(this).find(".dismiss").slideUp();
		});
	    $(".allApptList").on("click", ".remove", function(e){
		var found=$(this).parents("li").find("#no").val();
                $.ajax({type: "POST", async:false, url: "setAppt.php", data: {'key':found}, error: onError});
		$.ajax({type: "POST", url: "removeAppt.php", error: onError});
		$(this).parents("li").remove();
		});
	    });
//Page change insert/remove functions
//Code for data-dynamicQuery system, looks for dynamic elements to remove, makes query for new information, passes desintation
//page name to callback function
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

//generic search bar function	
    $(document).ready(function(){
	$(".go").click(function(){
		$(this).parents("[data-role='page']").find(".searchResult").empty();
		var formData= $(this).parents("[data-role='page']").find(".searchTerms").serialize();
		var id= $(this).parents("[data-role='page']").find(".searchResult").attr("id");
		$.ajax({url: $(this).attr("data-search")+".php", type: "POST", success: onPageLoad, data:formData, invokedata: id, error:onError});
	    });
	});
