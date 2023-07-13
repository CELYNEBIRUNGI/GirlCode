<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+3&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="{{ asset('website/css/main.css') }}" rel="stylesheet" />
    <title>Tufuna</title>
</head>

<body>
    <div class="v1_2">
        <div class="v1_3 nav">
            <div class="v1_4"></div><span class="v1_5">Start saving today! </span>
            <div class="v1_6"></div>
            <div class="v1_7">
                <div class="v1_8"></div><span class="v1_9">Get Started</span>
            </div>
            <div class="v1_10">
                <div class="v1_11">

                    
                        <a href="{{ url('/account-transactions') }}"  class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"><span class="v1_13">Transactions</span></a>
                    @if (Route::has('login'))
                        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                            @auth
                                <a href="{{ url('/home') }}"
                                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"></a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                    <span class="v1_14">Login</span>
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                        <span class="v1_12">Sign Up</span>
                                    </a>
                                @endif
                            @endauth
                        </div>
                    @endif

                    <span class="v1_15">Contact Us</span>
                    <span class="v1_16">About Us</span>
                    <div class="v1_17">
                        <span style="color: white !important; font-size: 1rem; font-weight:600;"><a href="{{ url('/account-goals') }}">Start to Save</a></span>
                    </div>
                    <div class="v1_19">
                        <div class="v1_20"></div>
                        <div class="v1_21"></div>
                    </div>
                </div>
            </div><span class="v1_22">My Savings Path</span>
            <div class="v32_86"></div>
        </div>
        <div class="v1_23">
            <div class="v1_24"></div><span class="v1_25">Savings Tools</span>
            <div class="v1_26">
                <div class="v1_27"></div><span class="v1_28">Explore </span>
            </div>
            <span class="v1_29">
                Use our savings calculators, budgeting tools, and goal trackers to help you stay
                on track and save money more effectively.
            </span>
        </div>
        <div class="v1_30">
            <div class="v1_31"></div>
            <div class="v1_32"></div>
            <span class="v1_33">
                Connect with other savers, ask questions, share your
                experiences, and provide support to each other in our community forum.
            </span>
            <span class="v1_34">Community Forum</span>
        </div>
        <div class="v1_35">
            <div class="v1_36"></div>
            <!-- <span class="v1_38">
                Build your financial knowledge and skills with our articles,
                videos, and courses on topics such as budgeting, saving, investing, and more.
                </span> -->
            <!-- <span class="v1_40">
               Learn about our partnerships with other organizations and institutions that are working to
                promote savings culture among young people in Africa.
               </span> -->
            <span class="v1_41">
                Join thousands of young people in Africa and take control of your finances.
            </span>
            <!-- <span class="v1_42">
                    Financial Education
                </span> -->
            <!-- <span class="v1_43">
                    Partnerships
                </span> -->

        </div>
        <span class="v1_42">
            Financial Education
        </span>
        <span class="v1_38">
            Build your financial knowledge and skills with our articles,
            videos, and courses on topics such as budgeting, saving, investing, and more.
        </span>
        <span class="v1_43">
            Partnerships
        </span>
        <span class="v1_40">
            Learn about our partnerships with other organizations and institutions that are working to
            promote savings culture among young people in Africa.
        </span>
        <div class="v32_90"></div>
        <div class="v32_94"></div>
        <div class="v1_44">
            <div class="v1_45"></div><span class="v1_46">Savings Goals</span><span class="v1_48">Get expert advice
                and
                tips on how to save money, reduce expenses, and achieve your financial goals</span><span
                class="v1_49">Savings Tips</span><span class="v1_51">Set savings goals, track your progress, and
                celebrate your achievements with our goal-setting platform.</span><span class="v1_52">Savings
                Incentives</span>
            <div class="v41_87"></div><span class="v1_54">Get rewarded for saving with our incentives program, which
                offers prizes, discounts, and other benefits to users who meet their savings goal</span><span
                class="v1_55">Our Services</span>
            <div class="v34_98"></div>
            <div class="v41_86"></div>
        </div>
        <div class="v1_56">
            <div class="v1_57"><span class="v1_58">©2023 My Savings Path</span></div>
        </div>
        <!-- <div class="v1_59">
            <div class="v1_60">
                <div class="v1_61"></div><span class="v1_62">LOGO</span><span class="v1_63">Headline</span><span
                    class="v1_64">Subhead</span>
            </div>
        </div> -->
    </div>
</body>

</html>
