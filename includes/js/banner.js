function mycarousel_initCallback(carousel)
{
    // Disable autoscrolling if the user clicks the prev or next button.
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
    });

    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(0);
    });

    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
};

jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel({
        auto: 2,
        wrap: 'last',
        initCallback: mycarousel_initCallback
    });
});

$(document).ready(function() {
                        $("#content div").hide(); // Initially hide all content
                        $("#tabs li:first").attr("id","current"); // Activate first tab
                        $("#content div:first").fadeIn(); // Show first tab content
                        
                        $('#tabs a').click(function(e) {
                            e.preventDefault();        
                            $("#content div").hide(); //Hide all content
                            $("#tabs li").attr("id",""); //Reset id's
                            $(this).parent().attr("id","current"); // Activate this
                            $('#' + $(this).attr('title')).fadeIn(); // Show content for current tab
                        });
                    })();
                    </script>
        	</div>
			<script>
          $(document).ready(function() {
        $("#basic").click(function() { $(this).animate({textShadow: "#f0f 10px 10px 10px;"}); });
    });
    
    $("#glow").hover(function() { 
        $(this).animate({textShadow: "#f00 0 0 15px"});
    }, function() { 
        $(this).animate({textShadow: "#f00 0 0 0"});
    });

