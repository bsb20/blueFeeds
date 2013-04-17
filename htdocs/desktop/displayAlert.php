<?php
	echo "<script>
$(document).ready(function(){
        $.Dialog({
            'title'       : 'Please select a course before navigating to the students page.',
            'content'     : 'Course selection can be completed in top right hand corner of this screen.',
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

