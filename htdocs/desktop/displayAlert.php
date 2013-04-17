<?php
	echo "<script>
$(document).ready(function(){
        $.Dialog({
            'title'       : 'Please select a course before visiting the student page.',
            'content'     : 'Course selection can be found in the top right corner of this webpage',
            'draggable'   : true,
            'overlay'     : true,
            'closeButton' : true,
            'buttonsAlign': 'right',
            'position'    : {
                'zone'    : 'center'
            },
        });
    });
</script>";
?>

