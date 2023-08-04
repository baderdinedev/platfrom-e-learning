
<main class="wrapper-inner " id="app">
    <div>
        <div>
            <div class="advert advert--square advert--squareBottomRight">
                <div class="js-squareBottomRight-ad"></div>
            </div>

            <div class="cell cell--l row row--o well well--t well--xs has-structure--fixedLeftMargin">
                <div class="structure">

                    <div class="structure-advert advert">

                    </div>

                    <div class="js-sidebar-nav"></div>
                    <div class="structure-content" data-intro-type="media" data-screen-count="0">
                        <div class="card card--o card--xs bg">
                            <div class="embed">
                                <video id="myVideo" controls="controls" poster="">
                                    <source src="/1-welcome.webm" type="video/webm">
                                    <source src="{{ asset('storage/videos/' . $lesson->mediaUrl) }}"
                                        type="video/mp4">
                                    <track label="English" kind="subtitles" srclang="en"
                                        src="/dist/student/extras/video_subtitles/en/6-take_breaks.vtt">
                                </video>
                            </div>

                            <div class="well well--t well--xs split">
                                <div class="split-cell"></div>
                                <div class="split-cell">
                                    <a href="" data-tooltip="Tip: Press ENTER to continue"
                                        class="js-continue-button has-tooltip btn btn--b js-btn-video">
                                        Skip Video
                                     </a>
                                </div>
                            </div>
                            @include('layouts.lessons.speach_description');

                            
                        </div>
                        <div class="js-progress">
                            @include('layouts.lessons.video_to_text')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</main>