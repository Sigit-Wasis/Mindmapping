<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mindmapping</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script type="text/javascript" src="{{ url('assets/extras/jquery.min.1.7.js') }}"></script>
    <script type="text/javascript" src="{{ url('assets/extras/modernizr.2.5.3.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ url('assets/fa/css/font-awesome.css') }}">
    <style>
			body{
				background-color: black;
				user-select: none;
			}
			.bpage{
				background-color: white;
				overflow: auto;
				padding-bottom: 70px;
			}
			.bpcontent{
				text-align: justify;
			}
			img{
				width: 100%;
                height: 800px !important;
			}

            .logout {
                padding-top: 10px;
                padding-left: 10px;
                padding-bottom: 10px;
            }

            @media only screen and (max-width: 600px) {

                .logout {
                    padding-top: 30px;
                    padding-left: 10px;
                    text-align: center;
                    padding-bottom: 30px;
                }
                img{
                    width: 100%;
                    height: 350px !important;
                }
            }

			button{
				background-color: blue;
				color: white;
				border-radius: 10px;
				border: none;
				padding: 10px;
				margin: 10px;
			}
		</style>
</head>
<body>

<div class="logout">
    <a style="color: white; font-weight: bold; text-decoration: none;" href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout Sekarang
    </a>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

<div style="text-align: center;">
    <div id="flipbook" style="margin: 0 auto; display: inline-block;">
    </div>
</div>

<script type="text/javascript">
    var bookname = "Gilang Adiya Elangga"
    var pnum = 2
    var currentfs = 14
    var maxpage = 31
    function loadpages(){
        var applulad = ""
        $("#flipbook").append("<div class='bpage'><div class='bpcontent'><img src='http://mindmappinggilang.my.id/assets/pages/"+pnum+".jpg'></div></div>")
        pnum++
        if(pnum <= maxpage)
            loadpages()
        else{http://localhost:8000/assets/pages/3.jpg
            yepnope({
                test : Modernizr.csstransforms,
                yep: ['{{ url('assets/lib/turn.js') }}'],
                nope: ['{{ url('assets/lib/turn.html4.min.js') }}'],
                both: ['{{ url('assets/css/basic.css') }}'],
                complete: loadApp
            });
        }
    }

    loadpages()

    function loadApp(){
        $("#flipbook").turn({
            width: innerWidth,
            height: innerHeight,
            gradients: true,
            elevation: 0,
            autoCenter: true
        });
        $("#loader").fadeOut()
    }

    function textsizePlus(){
        if(currentfs < 40){
            currentfs = currentfs + 1
            $("body").css({'font-size':currentfs + "px"})
        }
    }
    function textsizeMinus(){
        if(currentfs > 8){
            currentfs = (currentfs - 1)
            $("body").css({'font-size':currentfs+"px"})
        }
    }

    function toLastPage(){
        $("#flipbook").turn("page", $("#flipbook").turn("pages"))
        showAd()
    }
    function toFirstPage(){
        $("#flipbook").turn("page", 1)
        showAd()
    }
    function openPage(n){
        showAd()
        if(n <= maxpage && n > 0)
            $("#flipbook").turn("page", n)
    }
    function openPrevPage(){
        $("#flipbook").turn("previous")
        showAd()
    }
    function openNextPage(){
        $("#flipbook").turn("next")
        showAd()
    }

    var jtp
    function jumpToPage(){
        clearTimeout(jtp)
        jtp = setTimeout(function(){
            $("#flipbook").turn("page", parseInt($("#inputpage").val()))
            showAd()
        }, 500)
    }

    $("title").html("Mindmapping - " + bookname)

</script>

</body>
</html>
