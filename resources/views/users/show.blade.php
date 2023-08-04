<link rel="stylesheet" href="{{asset('user/dist/student/css/app.min.478.css')}}">
<main class="wrapper-inner" id="app"><div><div><div class="js-main row">
	
		<div class="advert advert--square advert--squareBottomRight">
			<div class="js-squareBottomRight-ad"></div>
		</div>
	
	<div class="cell cell--l well well--l has-structure--fixedLeftMargin">
		
			<div class="advert advert--horiz">
				
			</div>
		
		<div class="structure">
			
				<div class="structure-advert advert">
					<div class="structure-fixed">
						<div class="js-skyscraper-ad"></div>
						<div class="js-ad-buttons"><div></div></div>
					</div>
				</div>
			
			<div class="structure-content">
				<div class="card bg">
					<div class="g pillar pillar--b well well--b">
						
						<div class="g-b g-b--4of12">
							<ul class="list list--f">
								<li class="list-item tss tc-ts">Username:</li>
								<li class="truncate list-item tsl">{{ $user->name }}</li>
							</ul>
						</div>
                        <div class="g-b g-b--4of12">
							<ul class="list list--f">
								<li class="list-item tss tc-ts">Email:</li>
								<li class="truncate list-item tsl">{{ $user->email }}</li>
							</ul>
						</div>
						
						<div class="g-b g-b--4of12">
							<ul class="list list--f">
								<li class="list-item tss tc-ts">Account Created:</li>
								<li class="list-item tsl">{{$user->created_at}}</li>
							</ul>
						</div>
                        <div class="g-b g-b--4of12">
							<ul class="list list--f">
								<li class="list-item tss tc-ts">Date of Birth:</li>
								<li class="list-item tsl">
                                @if ($user->birthday_date)
                                   {{ \DateTime::createFromFormat('Y-m-d', $user->birthday_date)->format('Y-m-d') }}
                                @endif
                                </li>
							</ul>
						</div>
                        <div class="g-b g-b--4of12">
							<ul class="list list--f">
								<li class="list-item tss tc-ts">Level:</li>
								<li class="list-item tsl">{{ $user->level->name }}</li>
							</ul>
						</div>
						
					</div>
					
				</div>
				
					<div class="card bg">
						<div class="js-joincode"><div><h4 class="well well--b">Sudent Information</h4>
                    <div class="form-fieldset">
                        <button class="btn btn--a js-submit" onclick="openPopup()">Update Information</button>
                         <button class="btn btn--a js-submit" onclick="openPopupw()">Change Password</button>
                    </div></div></div>
					</div>

                    <div class="js-joincode"><div><h4 class="well well--b">Certificat</h4>
                    <div class="form-fieldset">
                        <button class="btn btn--a js-submit" onclick="" disabled>Print</button>
                    </div>
                    </div></div>
			</div>
            
		</div>
	</div>
</div></div></div></main>

<script>
    function openPopup() {
        window.open('{{ route('users.edit') }}', 'Update Info', 'width=600,height=400');
    }
    function openPopupw() {

        window.open('{{ route('users.change-password') }}', 'Update Info', 'width=600,height=400');
    }
</script>

