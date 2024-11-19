<div class="pan-lhs ad-menu-main">
    <div class="ad-menu">
        <ul>
            <li class="ic-db">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 's-act' : '' }}">Dashboard</a>
            </li>
            <li class="ic-user">
                <a href="javascript:void(0);" class="{{ request()->routeIs('admin.user.*') ? 'mact' : '' }}">Users</a>
                <div>
                    <ol>
                        <li>
                            <a href="{{ route('admin.user.manage') }}" class="{{ request()->routeIs('admin.user.manage')&& is_null(request()->plan) ? 's-act' : '' }}">Manage</a>
                        </li>
                        @foreach($plans as $plan)
                        <li>
                            <a href="{{ route('admin.user.manage', ['plan'=>strtolower($plan->name)]) }}" class="{{ request()->routeIs('admin.user.manage') && request()->plan==strtolower($plan->name) ? 's-act' : '' }}">{{ $plan->name }} Users</a>
                        </li>
                        @endforeach
                        <li>
                            <a href="{{ route('admin.user.incomplete') }}" class="{{ request()->routeIs('admin.user.incomplete') ? 's-act' : '' }}">Incomplete Users</a>
                        </li>

                        <li>
                            <a href="{{ route('admin.user.add') }}" class="{{ request()->routeIs('admin.user.add') ? 's-act' : '' }}">Add new User</a>
                        </li>
                    </ol>
                </div>
            </li>
            
            <li>
                <h4>Payments</h4>
            </li>
            <li class="ic-pay">
                <a href="admin-all-payments.html">All Payments</a>
            </li>
            <li class="ic-pri">
                <a href="admin-price.html">Pricing Plans</a>
            </li>
            <li class="ic-pay">
                <a href="admin-payment-credentials.html">Payment gateway</a>
            </li>

            <li>
                <h4>Settings</h4>
            </li>
            <li class="ic-set">
                <a href="{{ route('admin.generalsetting.edit') }}" class="{{ request()->routeIs('admin.generalsetting.edit') ? 's-act' : '' }}">Site Setting</a>
            </li>
            <li>
                <h4>Appearance</h4>
            </li>
            <li class="ic-logo">
                <a href="admin-logo.html">Website Logo</a>
            </li>
            <li class="ic-colr">
                <a href="color-settings.html">Color Setting</a>
            </li>
            <li class="ic-medi">
                <a href="media-library.html">Media Library</a>
            </li>
            <li>
                <h4>CMS</h4>
            </li>
            <li class="ic-hom">
                <a href="#">Home Page</a>
                <div>
                    <ol>
                        <li>
                            <a href="admin-home-search.html">Search</a>
                        </li>
                        <li>
                            <a href="admin-home-services.html">Services</a>
                        </li>
                        <li>
                            <a href="admin-home-reviews.html">Customer reviews</a>
                        </li>
                        <li>
                            <a href="admin-home-recent-couples.html">Recent couples</a>
                        </li>
                        <li>
                            <a href="admin-home-meet-team.html">Meet out team</a>
                        </li>
                        <li>
                            <a href="admin-photo-gallery.html">Photo gallery</a>
                        </li>
                        <li>
                            <a href="admin-home-blogs.html">Blog & Articles</a>
                        </li>
                    </ol>
                </div>
            </li>
            <li class="ic-txt">
                <a href="admin-profile-filters.html">All profile filters</a>
            </li>
            <li class="ic-txt">
                <a href="admin-all-static-page.html">All Pages</a>
            </li>
            <li class="ic-txt">
                <a href="admin-all-text-update.html">All Text Update</a>
            </li>
            <li class="ic-txt">
                <a href="admin-footer.html">Footer</a>
            </li>
            <li class="ic-dum">
                <a href="admin-dummy-images.html">Dummy Images</a>
            </li>
            <li class="ic-mail">
                <a href="admin-all-mail.html" class="">Mail Templates</a>
            </li>
            <li>
                <h4>Others</h4>
            </li>
            <li class="ic-febk">
                <a href="admin-enquiry.html">All Enquiry</a>
            </li>
            <li class="ic-imp">
                <a href="admin-export.html">Export</a>
            </li>
            <li>
                <h4>Template </h4>
            </li>
            <li class="ic-act">
                <a href="activate.html" class="">Activation</a>
            </li>
            <li class="ic-upd">
                <a href="updates.html" class="">Template updates</a>
            </li>
            <li>
                <h4>Sign out </h4>
            </li>
            <li class="ic-lgo">
                <a href="{{ route('admin.logout') }}">Log out</a>
            </li>
        </ul>
    </div>
</div>