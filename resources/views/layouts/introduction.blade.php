@include('layouts.lessons.head');


<div class="row row--xs row--o hero hero--lesson well--p well--xxs_p">
    <div class="js-guest-banner" style="display:none">
        <div>
            <div class="guestBanner well guestBanner--fixed well--b well--xs">

                <svg class="icon icon--xs guestBanner-close guestBanner-link js-close-guest-banner">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink"
                        xlink:href="/dist/student/images/icons.svg#close"></use>
                </svg>

                <div class="guestBanner-wrapper ">
                    <div class="guestBanner-content">
                        <div>
                            <div class="guestBanner-title">Create a free account to save your progress!
                            </div>

                        </div>

                        <div class="guestBanner-cta">
                            <ul class="list list--inline">
                                <li class="list-item">
                                    <div class="link guestBanner-link tss js-login">Log In</div>
                                </li>
                                <li class="list-item">
                                    <div class="btn btn--s btn--pop guestBanner-button js-signup">Create
                                        Free Account</div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="g g--flag">
        <div class="g-b g-b--4of12">
            <div class="list list--inline list--flag list--xs">
                <div class="list-item">
                    <a href="{{route('dashboard')}}"
                        class="btn btn--stroke-i btn--io btn--xxs btn--iconTiny tc-i">
                        <svg class="icon icon-back tc-i btn-icon">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                xlink:href="{{asset('user/dist/student/images/icons.svg#back')}}"></use>
                        </svg>
                    </a>
                </div>

                <a href="" class="logo logo--fixed logo--typing logo--small list-item"></a>

            </div>
        </div>
        <div class="g-b g-b--4of12 tac">
            <h1 class="well well--f lessonNav-lesson">
                  {{$lesson->title}}
            </h1>
        </div>
        <div class="g-b g-b--4of12">
            <div class="list list--inline list--flag list--xs list--r">



                <a href="#" class="js-restart-screen list-item cup" data-tooltip="Redo Screen">
                    <svg class="icon icon-settings tc-i db">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                            xlink:href="/dist/student/images/icons.svg#redo"></use>
                    </svg>
                </a>


                <div class="list-item cup icon-settings">
                    <a href="#" class="js-dictation-settings js-dictation-on "
                        data-tooltip="Disable Dictation">
                        <svg class="icon icon-settings tc-i db">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                xlink:href="/dist/student/images/icons.svg#dictation-on"></use>
                        </svg>
                    </a>
                    <a href="#" class="js-dictation-settings js-dictation-off hide"
                        data-tooltip="Enable Dictation">
                        <svg class="icon icon-settings tc-i db">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                xlink:href="/dist/student/images/icons.svg#dictation-off"></use>
                        </svg>
                    </a>
                </div>


                <div class="list-item cup">
                    <a href="#" class="js-sound-settings js-sounds-on" data-tooltip="Sound Settings"
                        style="display: block;">
                        <svg class="icon icon-settings tc-i db">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                xlink:href="/dist/student/images/icons.svg#audio"></use>
                        </svg>
                    </a>
                    <a href="#" class="js-sound-settings js-sounds-off hide"
                        data-tooltip="Sound Settings" style="display: none;">
                        <svg class="icon icon-settings tc-i db">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                xlink:href="/dist/student/images/icons.svg#mute"></use>
                        </svg>
                    </a>
                </div>


                <a href="#" class="js-keyboard-settings list-item cup"
                    data-tooltip="Keyboard Settings">
                    <svg class="icon icon-keyboard tc-i db">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                            xlink:href="/dist/student/images/icons.svg#keyboard"></use>
                    </svg>
                </a>

            </div>
        </div>
    </div>
</div>


@include('layouts.lessons.content');