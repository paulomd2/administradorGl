<link rel="stylesheet" type="text/css" href="../css/style.css" />
<!--<link rel="stylesheet" type="text/css" href="../css/style.css" />-->
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="../js/default.js"></script>
<!--<script type="text/javascript" src="../js/default.js"></script>-->

<script src="http://www.designlunatic.com/demos/custom%20scrollbars/jquery.mousewheel.js"></script>
<script src="http://www.designlunatic.com/demos/custom%20scrollbars/jquery-ui-draggable.js"></script>

<script>

    $(document).ready(function() {

        function scrollBar() {

            var viewportHeight = $(window).height();
            var docuHeight = $(document).height();

            $('#barra-lateral').height(viewportHeight);

//console.log($('body').height());

            var trackHeight = $('#scrollbar-track').height();
            console.log("trackHeight: " + trackHeight);


            var scrollbarHeight = (viewportHeight / docuHeight) * trackHeight;
//console.log(scrollbarHeight);

            $('#scrollbar').height(scrollbarHeight);

            $('#scrollbar').draggable({
                axis: 'y',
                containment: 'parent',
                drag: function() {
                    var scrollbarTop = parseInt($(this).css('top'));

                    var scrollTopNew = (scrollbarTop / (trackHeight)) * docuHeight;

                    //console.log("ratio:"+(scrollbarTop/trackHeight));
                    //console.log("docuHeight: "+docuHeight);

                    $(window).scrollTop(scrollTopNew);

                }
            });

            $("#barra-lateral").bind("mousewheel", function(ev, delta) {

                var scrollTopNew = $(window).scrollTop() - Math.round(delta * 30);

                $(window).scrollTop(scrollTopNew);


                console.log("scrollTop: " + $(window).scrollTop());

                var scrollbarTop = ($(window).scrollTop() / docuHeight) * trackHeight;
                console.log("scrollbar top: " + scrollbarTop);

                /*
                 if(scrollbarTop < 0 ){
                 scrollbarTop = 0;
                 }
                 
                 if(scrollbarTop > trackHeight-scrollbarHeight ){
                 scrollbarTop = trackHeight-scrollbarHeight;
                 }
                 */

                $('#scrollbar').css({
                    top: scrollbarTop
                });

                //console.log(scrollbarHeight);
            });
        }

        scrollBar();

        $(window).scroll(function() {
            var scrollTop = $(window).scrollTop();

            $('#scrollTop').text(scrollTop);
        });

        $(window).resize(function() {
            scrollBar();
        });
    });

</script>