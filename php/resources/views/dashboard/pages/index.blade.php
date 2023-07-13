@extends('dashboard.layouts.main')

@section('content')
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
            <div class="row">

                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title">Account Balance</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cart"></i>
                                </div>
                                <?php
                                $savings = \DB::table('savings_accounts')
                                    ->where('user_id', Auth::user()->id)
                                    ->first();
                                ?>
                                <div class="ps-3">
                                    <h6>UGX</h6>
                                    <span class="text-success small pt-1 fw-bold">
                                        {{ $savings->account_balance ?? 0 }}
                                    </span>

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->

                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card revenue-card">



                        <div class="card-body">
                            <?php
                            $goals = \DB::table('goals')
                                ->where('user_id', Auth::user()->id)
                                ->count();
                            ?>

                            <h5 class="card-title">Saving Goals</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-currency-dollar"></i>
                                </div>
                                <div class="ps-3">
                                    <h6> {{ $goals }}</h6>
                                    <span class="text-danger small pt-1 fw-bold">in total</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Revenue Card -->

                <!-- Customers Card -->
                <div class="col-xxl-4 col-xl-12">

                    <div class="card info-card customers-card">

                        <?php
                        $transactions = \DB::table('transactions')
                            ->where('user_id', Auth::user()->id)
                            ->count();
                        ?>


                        <div class="card-body">
                            <h5 class="card-title">Transactions</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $transactions }}</h6>
                                    <span class="text-danger small pt-1 fw-bold">in total</span>

                                </div>
                            </div>

                        </div>
                    </div>

                </div><!-- End Customers Card -->



                <!-- Top Selling -->

            </div>
        </div><!-- End Left side columns -->


    </div>
@endsection
