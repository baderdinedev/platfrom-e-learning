   <html>
   <head>
      <style>body {transition: opacity ease-in 0.2s; } 
         body[unresolved] {opacity: 0; display: block; overflow: hidden; position: relative; } 
		 .back-link {
    display: inline-block;
    padding: 10px 20px;
    background-color: #ccc;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    font-size: 16px;
}

.back-link:hover {
    background-color: #aaa;
}

      </style>
      <style>body {transition: opacity ease-in 0.2s; } 
         body[unresolved] {opacity: 0; display: block; overflow: hidden; position: relative; } 
      </style>
      <style class="vjs-styles-defaults">
         .video-js {
         width: 300px;
         height: 150px;
         }
         .vjs-fluid:not(.vjs-audio-only-mode) {
         padding-top: 56.25%
         }
      </style>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Quebec Center</title>
      <meta name="twitter:alt" content="edclub banner">
      <link href="//static.typingclub.com/m/corp2/css/toolkit.min.css" rel="stylesheet" type="text/css">
      <link href="//static.typingclub.com/m/build/student_tp/student_tp.css?v=1117" rel="stylesheet" type="text/css">
   </head>
   <body class="noscroll-body">
      <div id="" class="with-ads adlevel-4 LPVIEW">
         <div id="root">
            <div class="lpviewbox">
               <div class="lessons container" id="article" role="article" tabindex="100" aria-label="Your progress is 0%. and your score is 3000.">
                  <div style="height: 100%;">
                     <img class="lpbackground" src="https://static.typingclub.com/m/exp/lpview/img/bg.png" style="width: 1500px; transform: translate(-50%, 0%);">
                     <div class="lparena">
                     @if ($classrooms->count())   
					 <div class="lsnrow active already_animated" name="row-0">
					 <a href="{{ url()->previous() }}" class="back-link">Back</a>

                           <h2 role="heading">ClaassRooms</h2>
                           <h3>
                             @if(session('success'))
                                    {{ session('success') }}
                              @endif
                           </h3>
                           <div class="box-row">
						
						   @foreach ($classrooms as $class)
								<a href="{{ route('classes.join', $class->id) }}">
									<div role="button" aria-label="" class="box-container is_unlocked has_progress">
										<div class="box" style="opacity: 1; transform: translate3d(0px, 0px, 0px);">
											<div class="lsn_name" title="{{ $class->formation->title }}">{{ $class->formation->title }}</div>
											<div class="lsn_num">{{ $loop->iteration }}</div>
											<div class="boxicon">
												<div class="lesson_icon e-cmn cmn-intro"></div>
											</div>
										</div>
									</div>
								</a>
							@endforeach
                        </div>
                        <div class="lsnrow active already_animated" name="row-1">
                           <div class="box-row"></div>
                        </div>
						@endif
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Code injected by live-server -->
   </body>
</html>





