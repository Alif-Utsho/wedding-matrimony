<div class="col-md-12 col-lg-6 col-xl-4 db-sec-com">
    <h2 class="db-tit">Plan details</h2>
    <div class="db-pro-stat">
        <h6 class="tit-top-curv">Current plan</h6>
        <div class="db-plan-card">
            <img src="/frontend/images/icon/plan.png" alt="">
        </div>
        <div class="db-plan-detil">
            <ul>
                @if ($package != null)
                    <li>Plan name: <strong>{{ $package->package->name }}</strong></li>
                @endif
                @if ($package !== null)
                    <li>Validity:
                        <strong>
                            @if ($package->duration >= 30)
                                {{ round($package->duration / 30, 1) }}
                                {{ Str::plural('Month', round($package->duration / 30, 1)) }}
                            @else
                                {{ $package->duration }} {{ Str::plural('Day', $package->duration) }}
                            @endif
                        </strong>
                    </li>
                    <li>Valid till:
                        
                    </li>
                @endif
                <li><a href="/plans" class="cta-3">Upgrade now</a></li>
            </ul>
        </div>
    </div>
</div>
