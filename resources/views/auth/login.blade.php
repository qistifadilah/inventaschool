<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>
    @include('style.css')

<body>
    <section style="margin-top: 150px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    {{-- card --}}
                    <div class="card">
                        <div class="card-header text-center">
                            <h3>Login</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('auth.authentication') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="email" class="form-control" placeholder="Email"
                                                id="email-horizontal-icon" name="email">
                                            <div class="form-control-icon">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="password" class="form-control" placeholder="Password"
                                                id="password-horizontal-icon" name="password">
                                            <div class="form-control-icon">
                                                <i class="fa fa-lock"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                </div>
                                <div class="row mt-1">
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </form>
                            <p class="mb-0 mt-2">
                                <a href="{{ route('auth.register') }}" class="text-center">Register a new membership</a>
                            </p>
                        </div>
                    </div>
                    {{-- end card --}}
                </div>
            </div>
        </div>
    </section>
</body>
@include('style.js')

</html>
