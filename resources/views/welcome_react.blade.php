@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h1 class="pull-left">Сұрақтар</h1>
    <a class="btn btn-primary pull-right" href="{{ route('posts.create') }}" id="clientTour2">Шығармаңды жаз</a>
    </div>
    <div class="row">
        <div class="questions" id="devTour1">
            @foreach ($posts as $post)
            <div class="row">
                <div class="col-md-2">
                    <div>{!!  $post->translations_count !!}</div>
                    <div>түзету</div>
                </div>
                <div class="col-md-6" style="border:1px solid blue;margin-top:3px;" id="devTour2">
                    <div class="row">
                        <a href="{{ route('posts.show',$post->id) }}">{{ str_limit($post->content,100) }}</a>
                    </div>
                    <div class="row pull-right">
                        @component('components.user_info',['post'=>$post])
                        @endcomponent
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <div class="modal-greeting">
          <img src="/resources/assets/img/greeting.png" alt="greeting" height="195">
          <h4>Кош келдiнiз! Комек iздесенiз client басыныз, егер комектескiнiз келсе Developer басыныз</h4>
      </div>
    </div>
    <div class="modal-body">
        <button class="modal-btn" href="javascript:void(0);" onclick="javascript:startClientTour();"> Client</button>
        <button class="modal-btn" href="javascript:void(5);" onclick="javascript:startDevelopTour();"> Developer</button>
    </div>
  </div>

</div>





<!-- introJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.9.3/intro.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.9.3/introjs.css"></script> -->
<script>
    // Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
// var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
// btn.onclick = function() {
//     modal.style.display = "block";
// }

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
     
function startClientTour(){
    var intro = introJs();
    modal.style.display = "none";

    intro.setOptions({
        steps: [
            {
                element: "#clientTour1",
                //   intro: "This is a dropdown",
                intro:'Тіркелiнiз <hr><p><b>The tutorial video as shown below:<b></p><iframe class="abcd" src="https://www.youtube.com/embed/EU7PRmCpx-0" frameborder="0" ></iframe>',

            },
            {
                element: "#clientTour2",
                intro: 'Шығарманызды жазу ушин бул жерге кiрiнiз',
                // position: 'left'
            }
        ]                 
    });

    intro.setOption('doneLabel', 'Next page').start().oncomplete(function() {
        window.location.href = 'posts/create?multipage=true';
    });
                    
};


function startDevelopTour(){
    var intro = introJs();
    modal.style.display = "none";

    intro.setOptions({
        steps: [
            {
                element: "#devTour1",
                //   intro: "This is a dropdown",
                intro:'Тузелеу жумысы кажет сурактар',

            },
            {
                element: "#devTour2",
                intro: "Тузелеу бастау ушин басыныз",
            }
        ]
    });

    
    intro.setOption('doneLabel', 'Next page').start().oncomplete(function() {
        window.location.href = 'posts/1}?multipage=true';
    });
           
};
    </script>

@endsection