@include('layout.common.header')


<div class="main-wrapper  account-wrapper">
    <div class="account-page">
        <div class="account-center">
            <div class="account-box">
                @yield('contents')
            </div>
        </div>
    </div>
</div>

@include('layout.common.footer')