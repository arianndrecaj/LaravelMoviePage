@extends('layouts.app')

@section('content')
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="right" viewBox="0 0 16 16">
        <path
            d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
    </symbol>
</svg>


<div class="container py-3">
    <header>
        <div class="d-flex flex-column flex-md-row align-items-center pb-0 mb-0 border-bottom">
        </div>

        <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
            <h1 class="display-4 fw-normal">Premium Plans</h1>
            <p class="fs-5 text-muted">Check out our most effective plans. You can choose according to your budget. </p>
        </div>
    </header>

    <main>
        <div class="row row-cols-1 row-cols-md-2 mb-3 text-center">
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Free</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">0<small class="text-muted fw-light">/mo</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>1 user included</li>
                            <li>Ads Included</li>
                            <li>No Email support</li>
                            <li>No Help Center</li>
                        </ul>
                        <button type="button" class="w-100 btn btn-lg">Already Registred✓</button>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Pro</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">€40<small class="text-muted fw-light">/mo</small>
                        </h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Ad-Free</li>
                            <li>Extra member slot</li>
                            <li>Priority email support</li>
                            <li>Help center access</li>
                        </ul>
                        <button type="button" class="w-100 btn btn-lg btn-danger" onclick="redirectToAnotherView()">Get
                            started</button>
                        <script>
                            function redirectToAnotherView() {
                                window.location.href = "{{ route('premiuminfo') }}";
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="display-6 text-center mb-4">Compare plans</h2>

        <div class="table-responsive">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th style="width: 34%;"></th>
                        <th style="width: 22%;">Free</th>
                        <th style="width: 22%;">Pro</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="text-start">Public</th>
                        <td><svg class="bi" width="24" height="24">
                                <use xlink:href="#right" />
                            </svg></td>
                        <td><svg class="bi" width="24" height="24">
                                <use xlink:href="#right" />
                            </svg></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-start">Private</th>
                        <td><svg class="bi" width="24" height="24">
                                <use xlink:href="#right" />
                            </svg></td>
                        <td><svg class="bi" width="24" height="24">
                                <use xlink:href="#right" />
                            </svg></td>
                    </tr>
                </tbody>

                <tbody>
                    <tr>
                        <th scope="row" class="text-start">Permissions</th>
                        <td><svg class="bi" width="24" height="24">
                            </svg></td>
                        <td><svg class="bi" width="24" height="24">
                                <use xlink:href="#right" />
                            </svg></td>

                    </tr>
                    <tr>
                        <th scope="row" class="text-start">Sharing</th>
                        <td></td>
                        <td><svg class="bi" width="24" height="24">
                                <use xlink:href="#right" />
                            </svg></td>

                    </tr>
                    <tr>
                        <th scope="row" class="text-start">Unlimited members</th>
                        <td></td>
                        <td><svg class="bi" width="24" height="24">
                                <use xlink:href="#right" />
                            </svg></td>

                    </tr>
                    <tr>
                        <th scope="row" class="text-start">Extra security</th>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</div>
@endsection