
<html lang="id">
	<head><base href="">
		<title>Cek Kelulusan</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="{{asset('img/k3.png')}}" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="{{ asset('cek/fix-theme/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('cek/fix-theme/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('cek/fix-theme/assets/css/style.css') }}" rel="stylesheet" type="text/css" />

        <style>
            [v-cloak]>* {
                display: none;
            }

            [v-cloak]::before {
                content: "loading...";
            }
        </style>
	</head>

	<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" data-bs-offset="200" class="bg-white position-relative">
		<div class="d-flex flex-column flex-root">
			<div class="mb-0" id="home">
				<div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg" style="background-image: url(assets/media/svg/illustrations/landing.svg)">
					<div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
						<div class="container">
							<div class="d-flex align-items-center justify-content-between">
								<div class="d-flex align-items-center flex-equal">
									<button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none" id="kt_landing_menu_toggle">
										<span class="svg-icon svg-icon-2hx">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="currentColor" />
												<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="currentColor" />
											</svg>
										</span>
									</button>

                                    <a href="/">
                                     <h5 class="text-white"><img alt="Logo" src="{{asset('img/k3.png')}}" class="h-40px logo" /> &nbsp; &nbsp;Universitas Khayangan </h5>
                                    </a>
								</div>
								<div class="d-lg-block" id="kt_header_nav_wrapper">
									<div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="200px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
										<div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-500 menu-state-title-primary nav nav-flush fs-5 fw-bold" id="kt_landing_menu">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                    <div id="app" v-cloak>
					<div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
                        <!--begin::Alert-->
                            <div class="alert alert-dismissible bg-light-warning border border-primary d-flex flex-column flex-sm-row p-5 mb-10">

                                <div class="d-flex flex-column pe-0 pe-sm-10">
                                    <!--begin::Title-->
                                    <h4 class="card-title text-dark" id="demo"></h4>
                                    <!--end::Content-->
                                </div>

                            </div>
                            <!--end::Alert-->

                    <br>
                     @if($setting->status == 1)
                        <div class="col-xl-12" v-if="currentDate() <= 0">
                            <div class="card box-shadow-0 border-info">
                                <div class="card-header card-head-inverse bg-dark">


                                </div>
                                <div class="card-content collpase show">
                                    <br>

                                    <div class="card-body card-dashboard text-center">

                                    <h3 class="text-dark mb-15">SILAHKAN CEK KELULUSAN ANDA</h3>
                                    <small class="text-dark mb-15">MASUKAN NO UJIAN DAN KLIK TOMBOL CEK</small>

                                        <br>
                                        <form @submit.prevent="submitSearch">

                                            <div class="form-group text-center">
                                                <input type="text" v-model="search" class="form-control" id="maxlength-position-inside" placeholder="NO .UJIAN" maxlength="17" />
                                            </div>
                                            <br>
                                            <button type="submit" class="btn btn-success">CEK</button>
                                        </form>
                                        <br>
                                        <br>
                                        @if($req_search != null)
                                        <div v-for="st in student" v-if="search == st.no_exam ">
                                            <div class="alert alert-success" role="alert" v-if="st.status == 1">
                                                <strong>Selamat! @{{ st.name }}</strong>
                                                <p>@{{ st.message }}</p>
                                                <br>
                                                <div class="text-start">
                                                    <h5 class="text-dark"><b>NAMA</b>&nbsp; &nbsp; &nbsp; &nbsp; :</h5>
                                                    <br>
                                                    <h5 class="text-dark"><b>KELAS</b>&nbsp; &nbsp; &nbsp; &nbsp; : </h5>
                                                    <br>
                                                    <h5 class="text-dark"><b>STATUS</b>&nbsp; &nbsp; &nbsp; : <span class="badge badge-success"> LULUS</span></h5>
                                                </div>
                                                <div class="text-center">
                                                    <a :href="'/cetak/'+ st.id"><button class="btn btn-sm btn-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-check-fill" viewBox="0 0 16 16">
                                                        <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm1.354 4.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                                                    </svg>
                                                    CETAK SKL</button></a>
                                                </div>
                                            </div>
                                            <div class="alert alert-danger" role="alert" v-if="st.status == 2">

                                                <strong>Mohon Maaf </strong>
                                                <p></p>
                                                <br>
                                                <div class="text-start">
                                                    <h5 class="text-dark"><b>NAMA</b>&nbsp; &nbsp; &nbsp; &nbsp; :</h5>
                                                    <br>
                                                    <h5 class="text-dark"><b>KELAS</b>&nbsp; &nbsp; &nbsp; &nbsp; :</h5>
                                                    <br>
                                                    <h5 class="text-dark"><b>STATUS</b>&nbsp; &nbsp; &nbsp; : <span class="badge badge-danger"> DITUNDA</span></h5>
                                                </div>
                                            </div>
                                        </div>

                                        @else

                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                            <div id="kick-start" class="card text-center bg-warning">
                                <div class="card-header">
                                    <h4 class="card-title text-white">PENGUMUMAN KELULUSAN BELUM DI BUKA</h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>

                                </div>
                            </div>
                        @endif
                </div>
             </div>




				</div>

                <div class="mb-0">
                    <div class="landing-dark-bg pt-20">

                        <!--begin::Separator-->
                        <div class="landing-dark-separator"></div>
                        <div class="container">
                            <div class="d-flex flex-column flex-md-row flex-stack py-7 py-lg-10">
                                <div class="d-flex align-items-center order-2 order-md-1">
                                    <a href="#">
                                        <img alt="Logo" src="{{asset('img/k3.png')}}" class="h-15px h-md-20px" />
                                    </a>
                                    <span class="mx-5 fs-6 fw-bold text-gray-600 pt-1" href="#">© 2023 Universitas Khayangan.</span>
                                </div>
                                <ul class="menu menu-gray-600 menu-hover-primary fw-bold fs-6 fs-md-5 order-1 mb-5 mb-md-0">
                                    <li class="menu-item">
                                        <a href="#" target="_blank" class="menu-link px-2">website</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>



                <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
                    <span class="svg-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                            <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                        </svg>
                    </span>
                </div>
            </div>
		</div>

		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{ asset('cek/fix-theme/assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('cek/fix-theme/assets/js/scripts.bundle.js') }}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Vendors Javascript(used by this page)-->
		<script src="{{ asset('cek/fix-theme/assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
		<script src="{{ asset('cek/fix-theme/assets/plugins/custom/typedjs/typedjs.bundle.js') }}"></script>
		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="{{ asset('cek/fix-theme/assets/js/custom/landing.js') }}"></script>
		<script src="{{ asset('cek/fix-theme/assets/js/custom/pages/pricing/general.js') }}"></script>

	</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>


    <script>
        new Vue({
            el: '#app',
            data: {
                student: JSON.parse(String.raw `{!! json_encode($student) !!}`),
                setting: JSON.parse(String.raw `{!! json_encode($setting) !!}`),
                search: '{{ $req_search }}',
                dt: '{!! $setting->date !!} {!! $setting->time !!}',
                dt2: '{{ $dt }}',

            },
            methods: {
                submitSearch: function() {
                    // console.log(this.sort_by)
                    window.location.href = `/?search=${this.search}`
                },

                currentDate() {
                    let datedb = new Date(this.dt).getTime();
                    let current = new Date().getTime();

                    let distance = datedb - current;
                    return distance;
                },

                currentTime() {
                    let timedb = this.time;
                    let timeok = this.time2;

                    let distanceTime = timedb - timeok;
                    return distanceTime;
                }
            }
        })
    </script>


    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("{!! $setting->date !!} {!! $setting->time !!}").getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            document.getElementById("demo").innerHTML = "<span class='badge badge-success'>HITUNG MUNDUR PENGUMUMAN</span> :  " + days + " Hari - " + hours + " Jam - " +
                minutes + " Menit - " + seconds + " Detik ";

            // If the count down is over, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "PENGUMUMAN SUDAH DIBUKA";
            }
        }, 1000);
    </script>
