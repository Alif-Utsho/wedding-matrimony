<div class="pan-lhs ad-menu-main">
    <div class="ad-menu">
        <ul>
            <li class="ic-db">
                <a href="{{ route('admin.dashboard') }}"
                    class="{{ request()->routeIs('admin.dashboard') ? 's-act' : '' }}">Dashboard</a>
            </li>
            <li class="ic-user">
                <a href="javascript:void(0);" class="{{ request()->routeIs('admin.user.*') ? 'mact' : '' }}">Users</a>
                <div>
                    <ol>
                        <li>
                            <a href="{{ route('admin.user.manage') }}"
                                class="{{ request()->routeIs('admin.user.manage') && is_null(request()->plan) ? 's-act' : '' }}">Manage</a>
                        </li>
                        @foreach ($plans as $plan)
                            <li>
                                <a href="{{ route('admin.user.manage', ['plan' => strtolower($plan->name)]) }}"
                                    class="{{ request()->routeIs('admin.user.manage') && request()->plan == strtolower($plan->name) ? 's-act' : '' }}">{{ $plan->name }}
                                    Users</a>
                            </li>
                        @endforeach
                        <li>
                            <a href="{{ route('admin.user.incomplete') }}"
                                class="{{ request()->routeIs('admin.user.incomplete') ? 's-act' : '' }}">Incomplete
                                Users</a>
                        </li>

                        <li>
                            <a href="{{ route('admin.user.add') }}"
                                class="{{ request()->routeIs('admin.user.add') ? 's-act' : '' }}">Add new User</a>
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
                <h4>Enquiries</h4>
            </li>
            <li class="ic-feat">
                <a href="{{ route('admin.enquiry.manage') }}"
                    class="{{ request()->routeIs('admin.enquiry.manage') ? 's-act' : '' }}">Enquiries</a>
            </li>

            <li>
                <h4>CMS</h4>
            </li>


            <li class="ic-medi">
                <a href="javascript:void(0);" class="{{ request()->routeIs('admin.blog.*') ? 'mact' : '' }}">Blog &
                    Articles</a>
                <div>
                    <ol>
                        <li>
                            <a href="{{ route('admin.blog.add') }}"
                                class="{{ request()->routeIs('admin.blog.add') ? 's-act' : '' }}">Add New</a>
                        </li>

                        <li>
                            <a href="{{ route('admin.blog.manage') }}"
                                class="{{ request()->routeIs('admin.blog.manage') ? 's-act' : '' }}">Manage</a>
                        </li>

                        <li>
                            <a href="{{ route('admin.blog.category.manage') }}"
                                class="{{ request()->routeIs('admin.blog.category.manage') ? 's-act' : '' }}">Categories</a>
                        </li>

                        <li>
                            <a href="{{ route('admin.blog.tag.manage') }}"
                                class="{{ request()->routeIs('admin.blog.tag.manage') ? 's-act' : '' }}">Tags</a>
                        </li>
                    </ol>
                </div>
            </li>

            <li class="ic-act">
                <a href="{{ route('admin.service.manage') }}"
                    class="{{ request()->routeIs('admin.service.manage') ? 's-act' : '' }}">Services</a>
            </li>
            <li class="ic-slid">
                <a href="{{ route('admin.banner.manage') }}"
                    class="{{ request()->routeIs('admin.banner.manage') ? 's-act' : '' }}">Banners</a>
            </li>
            <li class="ic-upd">
                <a href="{{ route('admin.ourteam.manage') }}"
                    class="{{ request()->routeIs('admin.ourteam.manage') ? 's-act' : '' }}">Our Teams</a>
            </li>
            <li class="ic-febk">
                <a href="{{ route('admin.testimonial.manage') }}"
                    class="{{ request()->routeIs('admin.testimonial.manage') ? 's-act' : '' }}">Testimonials</a>
            </li>

            <li>
                <h4>Settings</h4>
            </li>
            <li class="ic-set">
                <a href="{{ route('admin.generalsetting.edit') }}"
                    class="{{ request()->routeIs('admin.generalsetting.edit') ? 's-act' : '' }}">Site Setting</a>
            </li>
            <li class="ic-set">
                <a href="{{ route('admin.contactinfo.edit') }}"
                    class="{{ request()->routeIs('admin.contactinfo.edit') ? 's-act' : '' }}">Contact Infos</a>
            </li>

            <li>
                <h4>Others</h4>
            </li>
            <li class="ic-feat">
                <a href="{{ route('admin.city.manage') }}"
                    class="{{ request()->routeIs('admin.city.manage') ? 's-act' : '' }}">Cities</a>
            </li>
            <li class="ic-feat">
                <a href="{{ route('admin.hobby.manage') }}"
                    class="{{ request()->routeIs('admin.hobby.manage') ? 's-act' : '' }}">Hobbies</a>
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
