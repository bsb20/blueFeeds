<?php
	echo "<script>
$(document).ready(function(){
        $.Dialog({
            'title'       : 'Please select a course before continuing.',
            'content'     : 'Course selection can be completed in the top right hand corner of this screen. If you are receiving this alert, it is because you have attempted to perform an action without having selected a course such as: adding instructors or navigating to the student selection page.',
            'draggable'   : true,
            'overlay'     : true,
            'closeButton' : true,
            'buttonsAlign': 'right',
            'position'    : {
                'zone'    : 'center'
            },
            'buttons'     : {
            }
        });
    });
</script>";
?>

